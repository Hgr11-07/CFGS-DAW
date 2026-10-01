const escribirDocumentoEntero = (mensaje) => {
  document.open();
  document.write(`<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Saludos</title>
</head>
<body>
  <h1>Elige un idioma</h1>

  <button onclick="escribirDocumentoEntero('Привет!')">Ruso</button>
  <button onclick="escribirDocumentoEntero('¡Hola!')">Español</button>
  <button onclick="escribirDocumentoEntero('Hello!')">Inglés</button>

  <p>${mensaje}</p>
</body>
</html>`);
  document.close();
};