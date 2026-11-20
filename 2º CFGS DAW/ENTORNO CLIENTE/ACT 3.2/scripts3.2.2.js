document.getElementById("href").textContent = location.href;
document.getElementById("protocolo").textContent = location.protocol;
document.getElementById("hostname").textContent = location.hostname;
document.getElementById("puerto").textContent = location.port;
document.getElementById("ruta").textContent = location.pathname;
document.getElementById("busqueda").textContent = location.search;

document.getElementById("btnRecargar").addEventListener("click", () => {
  location.reload();
});