const fechaA = new Date(2026, 0, 1);
    const fechaB = new Date(2026, 0, 19);
    console.log(calcularDíasDiferencia(fechaA, fechaB));

    function calcularDíasDiferencia(fechaInicio, fechaFin){
        const diferencia = new Date(fechaFin - fechaInicio);
        const tiempoDiferencia = diferencia.getTime();
        const diasDiferencia = tiempoDiferencia/(1000 * 3600 * 24); 
        return Math.round(diasDiferencia);
    }