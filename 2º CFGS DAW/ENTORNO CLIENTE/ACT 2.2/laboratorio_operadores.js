function procesarEvaluacion() {
  const txtA = document.getElementById("campoValor1").value.trim();
  const txtB = document.getElementById("campoValor2").value.trim();
  const visor = document.getElementById("pantallaSalida");

  // Conversión segura de cadenas literales a primitivos reales usando JSON.parse
  let valA, valB;
  try {
    valA = JSON.parse(txtA);
  } catch (e) {
    valA = txtA; // Si no es JSON válido, lo trata como string puro
  }

  try {
    valB = JSON.parse(txtB);
  } catch (e) {
    valB = txtB;
  }

  // Evaluaciones de tipos y operaciones
  const tipoA = typeof valA;
  const tipoB = typeof valB;
  const igualdadAbstracta = (valA == valB);
  const igualdadEstricta = (valA === valB);
  const operacionOr = valA || valB;
  const operacionNullish = valA ?? valB;
  const operacionY = valA && valB;
  const dobleNegacion = !!valA;
  const esMayor = valA > Number.MAX_SAFE_INTEGER && tipoA === "number";
  
  visor.innerHTML = `
    <strong>Operando A:</strong> <span class="resaltado">${String(valA)}</span> (typeof: ${tipoA})<br>
    <strong>Operando B:</strong> <span class="resaltado">${String(valB)}</span> (typeof: ${tipoB})<br>
    --------------------------------------------------<br>
    <strong>Igualdad abstracta (A == B):</strong> ${igualdadAbstracta}<br>
    <strong>Igualdad estricta   (A === B):</strong> ${igualdadEstricta}<br>
    <strong>Cortocircuito OR    (A || B):</strong> ${String(operacionOr)}<br>
    <strong>Coalescencia nula   (A ?? B):</strong> ${String(operacionNullish)}<br>
    <strong>Cortocircuito Y   (A && B):</strong> ${String(operacionY)}<br>
    <strong>Doble Negación   (!!A):</strong> ${dobleNegacion}

  `;

  if(esMayor){
    visor.innerHTML += `<br><strong style="color:red">Aviso: Precisión comprometida. Utiliza BigInt (sufijo n) para operar en este rango</strong>`;
  }
}

document.getElementById("btnEvaluar").addEventListener("click", procesarEvaluacion);
