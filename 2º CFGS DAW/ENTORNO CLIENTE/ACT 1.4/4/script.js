const fecha = new Date(2026, 5, 19, 5, 30);
console.log(formatearFechaEspañola(fecha));

function formatearFechaEspañola(fecha) {
  const diaFormateado = fecha.getDate().toString().padStart(2, "0");
  const mesFormateado = (fecha.getMonth() + 1).toString().padStart(2, "0");
  const añoFormateado = fecha.getFullYear();
  const horasFormateadas = fecha.getHours().toString().padStart(2, "0");
  const minutosFormateados = fecha.getMinutes().toString().padStart(2, "0");
  return `${diaFormateado}/${mesFormateado}/${añoFormateado} ${horasFormateadas}:${minutosFormateados}`;
}
