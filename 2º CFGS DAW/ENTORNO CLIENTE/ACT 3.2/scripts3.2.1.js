const boton = document.getElementById("btnAuditar");

boton.addEventListener("click", () => {
  document.getElementById("idioma").textContent = navigator.language;
  document.getElementById("conexion").textContent = navigator.onLine ? "Sí" : "No";
  document.getElementById("ventana").textContent = `${window.innerWidth}x${window.innerHeight} px`;
  document.getElementById("monitor").textContent = `${screen.width}x${screen.height} px`;
});