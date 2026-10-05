console.log(obtenerUltimoDíaDelMes(2, 2020));
console.log(obtenerUltimoDíaDelMes(1, 2021));
console.log(obtenerUltimoDíaDelMes(4, 2021));

function obtenerUltimoDíaDelMes(mes, año) {
  const fecha = new Date(año, mes, 0);
  return fecha.getDate();
}
