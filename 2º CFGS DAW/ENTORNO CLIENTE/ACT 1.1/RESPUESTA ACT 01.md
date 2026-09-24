Cuestión 1: Auditoría de Tiempos con console.time

Tiempo con 50.000 elementos: 54.85 ms

Tiempo con 150.000 elementos: 146.37 ms

Tiempo con 500.000 elementos: 393.42 ms

Tiempo con 850.000 elementos: 595.99 ms

Crece proporcionalmente, cuantos más elementos haya menos milisegundos por elemento tarda. Como vemos en los resultados, si 50000 elementos tarda algo más de 50 ms
los 150000 debería tardar algo mas de 150000, pero es al contrario, es algo menos.

Cuestión 2: Ahorro de Procesamiento en el Servidor

Si 1 usuario tarda 146,67 ms.

10.000 usuarios --> 1.463.700 ms --> 1.463,7 s --> 24,4 min.

Las ventajas son que las bases de datos del servidor se sobrecargan menos evitando así los cuellos de botella, la escalabilidad es casi gratuita, pues el coste de reordenar
no crece con cada usuario...

Cuestión 3: 

No, no es nada viable, deberían hacerse filtros para que se recorran en vez de 8 millones de registros cada vez un mismo array, por ejemplo, se recorran unicamente
los de x categorías y que tengan un precio menor a x.

