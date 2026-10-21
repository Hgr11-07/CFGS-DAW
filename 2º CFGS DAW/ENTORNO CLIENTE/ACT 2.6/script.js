function soloDigitos(texto) {
  for (let i = 0; i < texto.length; i++) {
    if (texto[i] < "0" || texto[i] > "9") {
      return false;
    }
  }
  return true;
}

function pedirCodigo() {
  const resultado = document.getElementById("resultado");
  let codigo;

  do {
    codigo = prompt("Introduce un código numérico de 4 dígitos:");

    if (codigo === null) {
      resultado.textContent = "Operación cancelada.";
      return;
    }

  } while (!soloDigitos(codigo) || codigo.length !== 4);

  resultado.textContent = "Código válido: " + codigo;
}

document.getElementById("btnCodigo").addEventListener("click", pedirCodigo);