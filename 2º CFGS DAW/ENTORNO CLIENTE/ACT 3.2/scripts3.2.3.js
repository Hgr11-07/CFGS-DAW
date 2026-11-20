const indicador = document.getElementById("indicador");
const registro = document.getElementById("registro");

function mostrarOnline() {
  indicador.textContent = "Conexión Estable";
  indicador.style.backgroundColor = "green";
}

function mostrarOffline() {
  indicador.textContent = "Sin Conexión";
  indicador.style.backgroundColor = "red";
}

window.ononline = () => {
  mostrarOnline();
};

window.onoffline = () => {
  mostrarOffline();

  // Fecha y hora exacta del corte con Temporal.Now
  const fecha = Temporal.Now.plainDateISO().toString();
  const hora = Temporal.Now.plainTimeISO().toString();

  registro.innerHTML += `<tr><td>${fecha}</td><td>${hora}</td></tr>`;
};

// Estado inicial
if (navigator.onLine) {
  mostrarOnline();
} else {
  mostrarOffline();
}

document.getElementById("btnEmergencia").addEventListener("click", () => {
  window.location.replace("soporte.html");
});