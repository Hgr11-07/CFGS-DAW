generarMatricula.addEventListener("click", function () {
  let numeros = Math.floor(Math.random() * 10000);

  numeros = numeros.toString().padStart(4, "0");

  const letras = "BCDFGHJKLMNPRSTVWXYZ";

  let matricula = numeros + "-" +
    letras.charAt(Math.floor(Math.random() * letras.length)) +
    letras.charAt(Math.floor(Math.random() * letras.length)) +
    letras.charAt(Math.floor(Math.random() * letras.length));

  document.getElementById("matricula").innerHTML =
    `<p>La matrícula es: ${matricula}</p>`;
});
