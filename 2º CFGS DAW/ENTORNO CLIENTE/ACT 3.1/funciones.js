function cryptoRandomFloat() {
  const buffer = new Uint32Array(1);
  window.crypto.getRandomValues(buffer);
  return buffer / 4294967296;
}

function generarAleatorio(min, max, decimales, seguro) {
  if (min > max)
    throw new Error("El valor mínimo no puede ser mayor al máximo");
  if (seguro === "segura")
    return Number((cryptoRandomFloat() * (max - min) + min).toFixed(decimales));
  return Number((Math.random() * (max - min) + min).toFixed(decimales));
}

console.log("Entero [0, 100]:", generarAleatorio(0, 100));
console.log(
  "Coordenada GPS [0.125, 0.875] de 3 cifras:",
  generarAleatorio(0.125, 0.875, 3),
);
console.log("Coordenada GPS [0.125, 0.875] de 3 cifras (Segura):", generarAleatorio(0.125, 0.875, 3, "segura"));
