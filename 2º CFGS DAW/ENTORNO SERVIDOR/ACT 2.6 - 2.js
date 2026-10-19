const n = 5; // filas de la mitad superior (cámbialo a tu gusto)

// Mitad superior (incluye la fila central)
for (let i = 1; i <= n; i++) {
  let fila = "";
  for (let j = 0; j < n - i; j++) {       // espacios
    fila += " ";
  }
  for (let k = 0; k < 2 * i - 1; k++) {   // asteriscos
    fila += "*";
  }
  console.log(fila);
}

// Mitad inferior (sin repetir la fila central)
for (let i = n - 1; i >= 1; i--) {
  let fila = "";
  for (let j = 0; j < n - i; j++) {
    fila += " ";
  }
  for (let k = 0; k < 2 * i - 1; k++) {
    fila += "*";
  }
  console.log(fila);
}