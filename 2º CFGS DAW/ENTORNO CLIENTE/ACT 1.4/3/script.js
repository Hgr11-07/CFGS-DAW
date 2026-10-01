console.log(obtenerUltimoDíaDelMes(2, 2020));
console.log(obtenerUltimoDíaDelMes(1, 2021));
console.log(obtenerUltimoDíaDelMes(4, 2021));

function obtenerUltimoDíaDelMes(mes, año){
    switch(mes){
        case 1: case 3: case 5: case 7: case 8: case 10: case 12:
            return 31;
        case 4: case 6: case 9: case 11:
            return 30;
        case 2:
            return 28;
        default:
            return "Mes inválido";
    }
}