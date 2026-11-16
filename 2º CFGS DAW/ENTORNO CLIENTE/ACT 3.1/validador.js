const formulario = document.getElementById("miFormulario");

formulario.addEventListener("submit", function(event) {

    event.preventDefault();

    let precio = document.getElementById("precioSinIVA").value.trim().replace(',', '.');
    let iva = document.getElementById("porcentajeIVA").value;

    if (Number.isNaN(Number(precio)) || !Number.isFinite(Number(precio)) || Number(precio) <= 0) {
        alert("Por favor, introduce un precio válido (número positivo).");
        return;
    }

    let cuota = Number(precio) * (Number(iva) / 100);
    let pvp = Number(precio) + cuota;

    document.getElementById("resultado").innerHTML = `
        <p>Cuota de IVA: ${cuota.toFixed(2)} €</p>
        <p>Precio total (PVP): ${pvp.toFixed(2)} €</p>
    `;
});

