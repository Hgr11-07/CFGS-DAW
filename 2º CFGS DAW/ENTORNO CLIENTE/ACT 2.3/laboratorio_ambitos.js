"use strict"; // Modificación 2: debe ser la PRIMERA sentencia del script

const visor = document.getElementById("pantallaTerminal");

// Declaraciones en el ámbito global del script (corrección del código base)
var variableGlobalVar = "Dato con var";
let variableGlobalLet = "Dato con let";

// Modificación 1: constante global
const TASA = 0.21;

function registrar(texto, clase = "") {
  const linea = document.createElement("div");
  if (clase) linea.className = clase;
  linea.textContent = texto;
  visor.appendChild(linea);
}

// Modificación 1: sombreado (shadowing)
function calcularTarifaTemporal() {
  const TASA = 0.10; // sombrea a la TASA global dentro de esta función
  registrar("→ TASA dentro de la función (sombreada): " + TASA);
}

document.getElementById("btnEjecutar").addEventListener("click", () => {
  visor.innerHTML = "";
  registrar("=== INICIANDO AUDITORIA DE AMBITOS ===");

  // 1. Ámbito de bloque aislado
  {
    var testigoVar = "Creada con var en bloque";
    let testigoLet = "Creada con let en bloque";
  }

  if (typeof testigoVar !== "undefined") {
    registrar("✓ 'testigoVar' se fugó del bloque: " + testigoVar, "resaltado-ok");
  } else {
    registrar("✗ 'testigoVar' no es accesible.", "resaltado-error");
  }

  try {
    let lectura = testigoLet;
    registrar("✓ 'testigoLet' es accesible: " + lectura, "resaltado-ok");
  } catch (e) {
    registrar("✗ 'testigoLet' fue destruida al salir del bloque (ReferenceError).", "resaltado-error");
  }

  // 2. Contaminación del objeto window
  if (window.variableGlobalVar === "Dato con var") {
    registrar("⚠ 'variableGlobalVar' contaminó el objeto global window.", "resaltado-error");
  }

  if (typeof window.variableGlobalLet === "undefined") {
    registrar("✓ 'variableGlobalLet' NO contamina window (Entorno limpio).", "resaltado-ok");
  }

  // 3. Modificación 1: shadowing
  registrar("--- Prueba de sombreado ---");
  registrar("→ TASA global antes: " + TASA);
  calcularTarifaTemporal();
  registrar("→ TASA global después: " + TASA, "resaltado-ok");

  // 4. Modificación 2: "use strict"
  registrar("--- Prueba de modo estricto ---");
  try {
    saldoSinDeclarar = 500; // sin let/const/var
    registrar("✗ Se creó una global implícita (sin modo estricto).", "resaltado-error");
  } catch (e) {
    registrar("✗ " + e.name + ": " + e.message, "resaltado-error");
  }

  registrar("=== FIN DE LA AUDITORIA ===");
});