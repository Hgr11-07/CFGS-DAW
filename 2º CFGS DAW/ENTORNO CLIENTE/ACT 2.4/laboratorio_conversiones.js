//Hito 1

const btnAnalizar = document.getElementById("btnAnalizar");
const txtEntrada = document.getElementById("txtEntrada");
const pantallaSalida = document.getElementById("pantallaSalida");

btnAnalizar.addEventListener("click", analizarCoercion);

function analizarCoercion() {
  const textoEntrada = txtEntrada.value.trim();
  let valorReal;
  try {
    valorReal = JSON.parse(textoEntrada);
  } catch (error) {
    // Casos especiales que no son JSON válido pero representan primitivos en JS:
    if (textoEntrada === "undefined") {
      valorReal = undefined;
    } else if (textoEntrada === "NaN") {
      valorReal = NaN;
    } else {
      valorReal = textoEntrada;
    }
  }

  //Hito 2
  const tipoOriginal = typeof valorReal;
  const numeroOriginal = Number(valorReal);
  const textoOriginal = String(valorReal);
  const booleanoOriginal = Boolean(valorReal);

  //Hito 3
  let alerta = "";

  if(textoOriginal === "0" && booleanoOriginal === true){
    alerta = "¡Alerta! La cadena '0' es un valor TRUTHY en JS.";
    console.log (alerta);
  }

  if(textoEntrada === "[]"){
    alerta = "¡Alerta! Una matriz vacía se convierte a 0 en JS.";
    console.log(alerta);
  }

  //Hito 4

  const suma = valorReal + 10;
  const resta = valorReal - 10;
  const tipoSuma = typeof suma;
  const tipoResta = typeof resta;

  //Hito 5

  if(Number.isNaN(numeroOriginal)){
    alerta = "¡Atención! La conversión a número ha producido NaN (valor numérico no válido)";
  }

  //Hito 6

  pantallaSalida.innerHTML = `
    <p>Tipo Original: ${tipoOriginal}</p>
    <p>Conversión a Número: ${numeroOriginal}</p>
    <p>Conversión a Texto: ${textoOriginal}</p>
    <p>Conversión a Booleano: ${booleanoOriginal}</p>
    <br>
    <br>
    <p>Suma + 10: ${suma}</p>
    <p>Tipo: ${tipoSuma}</p>
    <p>Resta - 10: ${resta}</p>
    <p>Tipo: ${tipoResta}</p>

    <p>${alerta}</p>
    `;
}
