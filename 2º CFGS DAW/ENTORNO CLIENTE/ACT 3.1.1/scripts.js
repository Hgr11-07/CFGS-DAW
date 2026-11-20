// Gestor de plazos de matrícula y convocatorias con Temporal

// 1. Fecha base: PlainDate no lleva hora ni zona horaria, así que no hay desfases
const fechaPublicacionNotas = Temporal.PlainDate.from("2027-06-15");
console.log("Publicación provisional de notas:", fechaPublicacionNotas.toString());

// 2. Plazos legales
// Las alegaciones empiezan el mismo día de la publicación
const inicioAlegaciones = fechaPublicacionNotas;

// .add() devuelve una fecha nueva y no toca la original
const finAlegaciones = inicioAlegaciones.add({ days: 3 });
const resolucionDefinitiva = finAlegaciones.add({ days: 14 }); // 2 semanas

console.log("Fin de alegaciones:", finAlegaciones.toString());
console.log("Resolución definitiva:", resolucionDefinitiva.toString());

// Comprobamos que la fecha original no ha mutado
console.log(
  "¿Fecha original sin mutar?",
  fechaPublicacionNotas.toString() === "2027-06-15"
);

// 3. Cuenta atrás hasta el inicio de las alegaciones
const hoy = Temporal.Now.plainDateISO();

// Sin largestUnit el resultado saldría solo en días
const tiempoRestante = hoy.until(inicioAlegaciones, { largestUnit: "months" });
console.log(
  `Hoy es ${hoy.toString()}: faltan ${tiempoRestante.months} meses y ${tiempoRestante.days} días`
);

// 4. Apertura de la plataforma a las 09:00 en Madrid
const aperturaMadrid = Temporal.ZonedDateTime.from({
  timeZone: "Europe/Madrid",
  year: fechaPublicacionNotas.year,
  month: fechaPublicacionNotas.month,
  day: fechaPublicacionNotas.day,
  hour: 9,
  minute: 0,
  second: 0,
});

// .withTimeZone() mantiene el mismo instante y cambia solo la hora local
const aperturaTokio = aperturaMadrid.withTimeZone("Asia/Tokyo");

console.log("Apertura en Madrid:", aperturaMadrid.toString());
console.log("Apertura en Tokio:", aperturaTokio.toString());
// En junio Madrid está en UTC+2 y Tokio en UTC+9, por eso en Tokio son las 16:00