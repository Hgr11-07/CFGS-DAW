// @ts-check

/**
 * Valida si la letra de un DNI español corresponde a su número.
 * @description Calcula el resto de dividir el número entre 23 y comprueba
 * que la letra de esa posición en la tabla oficial coincida con la indicada.
 * No distingue entre mayúsculas y minúsculas.
 *
 * @param {number} numeroDNI - Parte numérica del DNI (entero entre 0 y 99999999).
 * @param {string} letra - Letra de control a verificar (una sola letra).
 *
 * @returns {boolean} `true` si la letra es la correcta para ese número; `false` en caso contrario.
 *
 * @throws {TypeError} Si `numeroDNI` no es un número entero o `letra` no es un string.
 * @throws {RangeError} Si `numeroDNI` es negativo o supera los 8 dígitos.
 *
 * @example
 * validarDNI(12345678, "Z"); // true
 * validarDNI(12345678, "a"); // false
 */
function validarDNI(numeroDNI, letra) {
  if (!Number.isInteger(numeroDNI) || typeof letra !== "string") {
    throw new TypeError("El número debe ser entero y la letra un string.");
  }
  if (numeroDNI < 0 || numeroDNI > 99999999) {
    throw new RangeError("El número del DNI debe estar entre 0 y 99999999.");
  }

  const letras = "TRWAGMYFPDXBNJZSQVHLCKE";
  return letras[numeroDNI % 23] === letra.toUpperCase();
}