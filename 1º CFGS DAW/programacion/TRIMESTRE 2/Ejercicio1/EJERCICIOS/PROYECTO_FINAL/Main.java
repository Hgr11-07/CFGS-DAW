package PROYECTO_FINAL;

import java.util.*;

public class Main {

    static Scanner teclado = new Scanner(System.in);

    public static void main(String[] args) {

    	Liga liga = new Liga();
    	inicializarDatos(liga);
        int opcion;
        

        do {
            System.out.println("\n-- MENÚ PRINCIPAL --");
            System.out.println("1. Gestionar personas");
            System.out.println("2. Gestionar equipos");
            System.out.println("3. Gestionar fichajes y plantillas");
            System.out.println("4. Gestionar calendario");
            System.out.println("5. Gestionar cola de partidos");
            System.out.println("6. Registrar partidos jugados");
            System.out.println("7. Gestionar incidencias y sanciones");
            System.out.println("8. Mostrar clasificación");
            System.out.println("9. Mostrar estadísticas");
            System.out.println("10. Mostrar historial de acciones");
            System.out.println("11. Deshacer última acción");
            System.out.println("12. Gestionar apuestas");
            System.out.println("13. Salir");
            System.out.print("Opción: ");
            opcion = teclado.nextInt();
            teclado.nextLine();

            switch(opcion) {
                case 1: menuPersonas(liga); break;
                case 2: menuEquipos(liga); break;
                case 3: menuFichajes(liga); break;
                case 4: menuCalendario(liga); break;
                case 5: menuCola(liga); break;
                case 6: menuPartidos(liga); break;
                case 7: menuIncidencias(liga); break;
                case 8: liga.mostrarClasificacion(); break;
                case 9: menuEstadisticas(liga); break;
                case 10: liga.mostrarHistorial(); break;
                case 11: liga.deshacerUltimaAccion(); break;
                case 12: menuApuestas(liga); break;
                case 13: System.out.println("-- PROGRAMA FINALIZADO --"); break;
                default: System.out.println("Opción no válida.");
            }

        } while(opcion != 13);
    }
    
    public static void inicializarDatos(Liga liga) {

        try {
            // ENTRENADORES
            Entrenador e1 = new Entrenador(1, "Carlos García", "CarlosG", 45, 5000, 10, "Ofensiva", 120);
            Entrenador e2 = new Entrenador(2, "María López", "MariaL", 38, 4500, 7, "Defensiva", 85);
            Entrenador e3 = new Entrenador(3, "Pedro Martínez", "PedroM", 50, 6000, 15, "Mixta", 200);
            Entrenador e4 = new Entrenador(4, "Ana Fernández", "AnaF", 42, 4800, 12, "Ofensiva", 150);
            Entrenador e5 = new Entrenador(5, "Luis Sánchez", "LuisS", 35, 4200, 5, "Defensiva", 60);
            Entrenador e6 = new Entrenador(6, "Sara Ruiz", "SaraR", 40, 5500, 9, "Mixta", 110);

            liga.registrarPersona(e1);
            liga.registrarPersona(e2);
            liga.registrarPersona(e3);
            liga.registrarPersona(e4);
            liga.registrarPersona(e5);
            liga.registrarPersona(e6);

            // JUGADORES
            Jugador j1  = new Jugador(101, "Álvaro Torres",  "AlvaroT",  20, 2000, Rol.TOP,     8, 7, 200, 15, false);
            Jugador j2  = new Jugador(102, "Bea Moreno",     "BeaM",     22, 2200, Rol.JUNGLE,  7, 8, 180, 20, false);
            Jugador j3  = new Jugador(103, "Cris Vega",      "CrisV",    19, 1800, Rol.MID,     9, 6, 150, 30, false);
            Jugador j4  = new Jugador(104, "David Núñez",    "DavidN",   21, 2100, Rol.ADC,     6, 9, 220, 10, false);
            Jugador j5  = new Jugador(105, "Elena Prieto",   "ElenaP",   23, 2300, Rol.SUPPORT, 7, 8, 300, 25, false);

            Jugador j6  = new Jugador(106, "Fran Delgado",   "FranD",    20, 2000, Rol.TOP,     7, 7, 100, 8,  false);
            Jugador j7  = new Jugador(107, "Gema Iglesias",  "GemaI",    22, 2100, Rol.JUNGLE,  8, 6, 130, 12, false);
            Jugador j8  = new Jugador(108, "Hugo Romero",    "HugoR",    21, 1900, Rol.MID,     6, 8, 160, 18, false);
            Jugador j9  = new Jugador(109, "Irene Castro",   "IreneC",   19, 2000, Rol.ADC,     9, 7, 90,  22, false);
            Jugador j10 = new Jugador(110, "Javi Ortega",    "JaviO",    24, 2400, Rol.SUPPORT, 7, 9, 250, 30, false);

            Jugador j11 = new Jugador(111, "Karen Blanco",   "KarenB",   20, 2000, Rol.TOP,     8, 8, 200, 20, false);
            Jugador j12 = new Jugador(112, "Leo Ramos",      "LeoR",     22, 2200, Rol.JUNGLE,  7, 7, 170, 15, false);
            Jugador j13 = new Jugador(113, "Marta Gil",      "MartaG",   21, 2100, Rol.MID,     9, 8, 140, 25, false);
            Jugador j14 = new Jugador(114, "Nacho Reyes",    "NachoR",   23, 2300, Rol.ADC,     6, 7, 190, 12, false);
            Jugador j15 = new Jugador(115, "Olga Serrano",   "OlgaS",    19, 1900, Rol.SUPPORT, 8, 9, 110, 18, false);

            Jugador j16 = new Jugador(116, "Pablo Molina",   "PabloM",   22, 2000, Rol.TOP,     7, 6, 160, 10, false);
            Jugador j17 = new Jugador(117, "Quique Rubio",   "QuiqueR",  20, 2100, Rol.JUNGLE,  8, 7, 130, 14, false);
            Jugador j18 = new Jugador(118, "Rosa Medina",    "RosaM",    21, 2200, Rol.MID,     7, 8, 180, 20, false);
            Jugador j19 = new Jugador(119, "Sergio Peña",    "SergioP",  23, 2300, Rol.ADC,     9, 7, 200, 28, false);
            Jugador j20 = new Jugador(120, "Tania Flores",   "TaniaF",   19, 1800, Rol.SUPPORT, 6, 8, 90,  8,  false);

            Jugador j21 = new Jugador(121, "Uxío Campos",    "UxioC",    22, 2000, Rol.TOP,     8, 7, 150, 16, false);
            Jugador j22 = new Jugador(122, "Vera Pascual",   "VeraP",    20, 2100, Rol.JUNGLE,  7, 8, 120, 11, false);
            Jugador j23 = new Jugador(123, "Willy Bravo",    "WillyB",   21, 2200, Rol.MID,     9, 9, 200, 35, false);
            Jugador j24 = new Jugador(124, "Xavi Pardo",     "XaviP",    23, 2300, Rol.ADC,     6, 7, 170, 9,  false);
            Jugador j25 = new Jugador(125, "Yolanda Cano",   "YolandaC", 19, 1900, Rol.SUPPORT, 8, 8, 100, 14, false);

            Jugador j26 = new Jugador(126, "Zaida Herrero",  "ZaidaH",   22, 2000, Rol.TOP,     7, 7, 140, 12, false);
            Jugador j27 = new Jugador(127, "Adrián Lara",    "AdrianL",  20, 2100, Rol.JUNGLE,  8, 6, 110, 9,  false);
            Jugador j28 = new Jugador(128, "Blanca Soler",   "BlancaS",  21, 2200, Rol.MID,     7, 9, 160, 22, false);
            Jugador j29 = new Jugador(129, "Cristóbal Vera", "CristoV",  23, 2300, Rol.ADC,     9, 8, 190, 27, false);
            Jugador j30 = new Jugador(130, "Diana Mora",     "DianaM",   19, 1800, Rol.SUPPORT, 6, 7, 80,  7,  false);

            // Suplentes
            Jugador s1 = new Jugador(201, "Suplente1 TOP",     "Sup1",  20, 1500, Rol.TOP,     5, 5, 50, 3, false);
            Jugador s2 = new Jugador(202, "Suplente2 JUNGLE",  "Sup2",  21, 1500, Rol.JUNGLE,  5, 5, 40, 2, false);
            Jugador s3 = new Jugador(203, "Suplente3 MID",     "Sup3",  22, 1500, Rol.MID,     5, 5, 60, 4, false);
            Jugador s4 = new Jugador(204, "Suplente4 ADC",     "Sup4",  20, 1500, Rol.ADC,     5, 5, 30, 1, false);
            Jugador s5 = new Jugador(205, "Suplente5 SUPPORT", "Sup5",  21, 1500, Rol.SUPPORT, 5, 5, 45, 2, false);
            Jugador s6 = new Jugador(206, "Suplente6 TOP",     "Sup6",  22, 1500, Rol.TOP,     5, 5, 55, 3, false);

            // Registrar todos los jugadores
            liga.registrarPersona(j1);  liga.registrarPersona(j2);  liga.registrarPersona(j3);
            liga.registrarPersona(j4);  liga.registrarPersona(j5);  liga.registrarPersona(j6);
            liga.registrarPersona(j7);  liga.registrarPersona(j8);  liga.registrarPersona(j9);
            liga.registrarPersona(j10); liga.registrarPersona(j11); liga.registrarPersona(j12);
            liga.registrarPersona(j13); liga.registrarPersona(j14); liga.registrarPersona(j15);
            liga.registrarPersona(j16); liga.registrarPersona(j17); liga.registrarPersona(j18);
            liga.registrarPersona(j19); liga.registrarPersona(j20); liga.registrarPersona(j21);
            liga.registrarPersona(j22); liga.registrarPersona(j23); liga.registrarPersona(j24);
            liga.registrarPersona(j25); liga.registrarPersona(j26); liga.registrarPersona(j27);
            liga.registrarPersona(j28); liga.registrarPersona(j29); liga.registrarPersona(j30);
            liga.registrarPersona(s1);  liga.registrarPersona(s2);  liga.registrarPersona(s3);
            liga.registrarPersona(s4);  liga.registrarPersona(s5);  liga.registrarPersona(s6);

            // EQUIPOS
            Equipo eq1 = new Equipo("Team Alpha",   "Madrid",    e1, 500000);
            Equipo eq2 = new Equipo("Team Beta",    "Barcelona", e2, 450000);
            Equipo eq3 = new Equipo("Team Gamma",   "Valencia",  e3, 600000);
            Equipo eq4 = new Equipo("Team Delta",   "Sevilla",   e4, 480000);
            Equipo eq5 = new Equipo("Team Epsilon", "Bilbao",    e5, 420000);
            Equipo eq6 = new Equipo("Team Zeta",    "Málaga",    e6, 550000);

            liga.registrarEquipo(eq1);
            liga.registrarEquipo(eq2);
            liga.registrarEquipo(eq3);
            liga.registrarEquipo(eq4);
            liga.registrarEquipo(eq5);
            liga.registrarEquipo(eq6);

            // PLANTILLAS
            eq1.añadirTitular(j1);  eq1.añadirTitular(j2);  eq1.añadirTitular(j3);
            eq1.añadirTitular(j4);  eq1.añadirTitular(j5);  eq1.añadirSuplente(s1);

            eq2.añadirTitular(j6);  eq2.añadirTitular(j7);  eq2.añadirTitular(j8);
            eq2.añadirTitular(j9);  eq2.añadirTitular(j10); eq2.añadirSuplente(s2);

            eq3.añadirTitular(j11); eq3.añadirTitular(j12); eq3.añadirTitular(j13);
            eq3.añadirTitular(j14); eq3.añadirTitular(j15); eq3.añadirSuplente(s3);

            eq4.añadirTitular(j16); eq4.añadirTitular(j17); eq4.añadirTitular(j18);
            eq4.añadirTitular(j19); eq4.añadirTitular(j20); eq4.añadirSuplente(s4);

            eq5.añadirTitular(j21); eq5.añadirTitular(j22); eq5.añadirTitular(j23);
            eq5.añadirTitular(j24); eq5.añadirTitular(j25); eq5.añadirSuplente(s5);

            eq6.añadirTitular(j26); eq6.añadirTitular(j27); eq6.añadirTitular(j28);
            eq6.añadirTitular(j29); eq6.añadirTitular(j30); eq6.añadirSuplente(s6);

            // CALENDARIO
            liga.generarCalendario(5);

            // PARTIDOS EN COLA
            Partido p1 = new Partido(1, 1, eq1, eq2);
            Partido p2 = new Partido(2, 1, eq3, eq4);
            Partido p3 = new Partido(3, 1, eq5, eq6);
            Partido p4 = new Partido(4, 2, eq1, eq3);
            Partido p5 = new Partido(5, 2, eq2, eq5);

            liga.encolarPartido(p1);
            liga.encolarPartido(p2);
            liga.encolarPartido(p3);
            liga.encolarPartido(p4);
            liga.encolarPartido(p5);

            System.out.println("Datos inicializados correctamente.");

        } catch (Exception e) {
            System.out.println("Error al inicializar: " + e.getMessage());
        }
    }

    public static String pedirString(String msg) {
        System.out.print(msg);
        return teclado.nextLine();
    }

    public static int pedirInt(String msg) {
        while(true) {
            try {
                System.out.print(msg);
                int n = teclado.nextInt();
                teclado.nextLine();
                return n;
            } catch(java.util.InputMismatchException e) {
                teclado.nextLine();
                System.out.println("Entrada no válida. Introduce un número entero.");
            }
        }
    }
    
    public static int pedirIntRango(String msg, int min, int max) {
        int n;
        do {
            n = pedirInt(msg);
            if(n < min || n > max)
                System.out.println("Valor fuera de rango (" + min + "-" + max + "). Intenta de nuevo.");
        } while(n < min || n > max);
        return n;
    }

    public static double pedirDouble(String msg) {
        while(true) {
            try {
                System.out.print(msg);
                double n = teclado.nextDouble();
                teclado.nextLine();
                return n;
            } catch(java.util.InputMismatchException e) {
                teclado.nextLine();
                System.out.println("Entrada no válida. Introduce un número decimal.");
            }
        }
    }
    
    public static double pedirDoubleRango(String msg, double min, double max) {
        double n;
        do {
            n = pedirDouble(msg);
            if(n < min || n > max)
                System.out.println("Valor fuera de rango (" + min + "-" + max + "). Intenta de nuevo.");
        } while(n < min || n > max);
        return n;
    }

    public static boolean pedirBoolean(String msg) {
        System.out.print(msg + " (S/N): ");
        char respuesta = teclado.next().toUpperCase().charAt(0);
        while(respuesta!='S' && respuesta!='N') {
        	System.out.print("ERROR. Prueba de nuevo. " +msg + " (S/N): ");
        	respuesta = teclado.next().toUpperCase().charAt(0);
        }
        if(respuesta=='S')
        	return true;
        
        return false;
    }

    public static void menuPersonas(Liga liga) {
        int opcion;
        do {
            System.out.println("\n-- GESTIONAR PERSONAS --");
            System.out.println("1. Registrar jugador");
            System.out.println("2. Registrar entrenador");
            System.out.println("3. Listar personas");
            System.out.println("4. Buscar persona por ID");
            System.out.println("5. Modificar persona");
            System.out.println("6. Eliminar persona");
            System.out.println("7. Volver");
            System.out.print("Opción: ");
            opcion = teclado.nextInt();
            teclado.nextLine();

            switch(opcion) {
                case 1: registrarJugador(liga); break;
                case 2: registrarEntrenador(liga); break;
                case 3: liga.listarPersonas(); break;
                case 4: buscarPersona(liga); break;
                case 5: modificarPersona(liga); break;
                case 6: eliminarPersona(liga); break;
                case 7: break;
                default: System.out.println("Opción no válida.");
            }
        } while(opcion != 7);
    }

    public static void menuEquipos(Liga liga) {
        int opcion;
        do {
            System.out.println("\n-- GESTIONAR EQUIPOS --");
            System.out.println("1. Registrar equipo");
            System.out.println("2. Listar equipos");
            System.out.println("3. Buscar equipo");
            System.out.println("4. Eliminar equipo");
            System.out.println("5. Mostrar coste total de equipo");
            System.out.println("6. Volver");
            System.out.print("Opción: ");
            opcion = teclado.nextInt();
            teclado.nextLine();

            switch(opcion) {
                case 1: registrarEquipo(liga); break;
                case 2: liga.listarEquipos(); break;
                case 3: buscarEquipo(liga); break;
                case 4: eliminarEquipo(liga); break;
                case 5: mostrarCosteEquipo(liga); break;
                case 6: break;
                default: System.out.println("Opción no válida.");
            }
        } while(opcion != 6);
    }

    public static void menuFichajes(Liga liga) {
        int opcion;
        do {
            System.out.println("\n-- GESTIONAR FICHAJES Y PLANTILLAS --");
            System.out.println("1. Añadir titular");
            System.out.println("2. Añadir suplente");
            System.out.println("3. Promover suplente a titular");
            System.out.println("4. Eliminar suplente");
            System.out.println("5. Mostrar plantilla");
            System.out.println("6. Volver");
            System.out.print("Opción: ");
            opcion = teclado.nextInt();
            teclado.nextLine();

            switch(opcion) {
                case 1: añadirTitular(liga); break;
                case 2: añadirSuplente(liga); break;
                case 3: promoverSuplente(liga); break;
                case 4: eliminarSuplente(liga); break;
                case 5: mostrarPlantilla(liga); break;
                case 6: break;
                default: System.out.println("Opción no válida.");
            }
        } while(opcion != 6);
    }

    public static void menuCalendario(Liga liga) {
        int opcion;
        do {
            System.out.println("\n-- GESTIONAR CALENDARIO --");
            System.out.println("1. Generar calendario");
            System.out.println("2. Mostrar calendario completo");
            System.out.println("3. Consultar jornada");
            System.out.println("4. Volver");
            System.out.print("Opción: ");
            opcion = teclado.nextInt();
            teclado.nextLine();

            switch(opcion) {
                case 1: generarCalendario(liga); break;
                case 2: liga.mostrarCalendario(); break;
                case 3: mostrarJornada(liga); break;
                case 4: break;
                default: System.out.println("Opción no válida.");
            }
        } while(opcion != 4);
    }

    public static void menuCola(Liga liga) {
        int opcion;
        do {
            System.out.println("\n-- GESTIONAR COLA DE PARTIDOS --");
            System.out.println("1. Encolar partido");
            System.out.println("2. Mostrar siguiente partido");
            System.out.println("3. Mostrar cola completa");
            System.out.println("4. Vaciar cola");
            System.out.println("5. Volver");
            System.out.print("Opción: ");
            opcion = teclado.nextInt();
            teclado.nextLine();

            switch(opcion) {
                case 1: encolarPartido(liga); break;
                case 2: liga.mostrarSiguientePartido(); break;
                case 3: liga.mostrarColaPartidos(); break;
                case 4: liga.vaciarCola(); break;
                case 5: break;
                default: System.out.println("Opción no válida.");
            }
        } while(opcion != 5);
    }

    public static void menuPartidos(Liga liga) {
        int opcion;
        do {
            System.out.println("\n-- REGISTRAR PARTIDOS --");
            System.out.println("1. Disputar siguiente partido");
            System.out.println("2. Volver");
            System.out.print("Opción: ");
            opcion = teclado.nextInt();
            teclado.nextLine();

            switch(opcion) {
                case 1: disputarPartido(liga); break;
                case 2: break;
                default: System.out.println("Opción no válida.");
            }
        } while(opcion != 2);
    }

    public static void menuIncidencias(Liga liga) {
        int opcion;
        do {
            System.out.println("\n-- GESTIONAR INCIDENCIAS --");
            System.out.println("1. Registrar incidencia");
            System.out.println("2. Listar incidencias");
            System.out.println("3. Buscar por equipo");
            System.out.println("4. Buscar por jugador");
            System.out.println("5. Volver");
            System.out.print("Opción: ");
            opcion = teclado.nextInt();
            teclado.nextLine();

            switch(opcion) {
                case 1: registrarIncidencia(liga); break;
                case 2: liga.listarIncidencias(); break;
                case 3: buscarIncidenciaEquipo(liga); break;
                case 4: buscarIncidenciaJugador(liga); break;
                case 5: break;
                default: System.out.println("Opción no válida.");
            }
        } while(opcion != 5);
    }

    public static void menuEstadisticas(Liga liga) {
        int opcion;
        do {
            System.out.println("\n-- ESTADÍSTICAS --");
            System.out.println("1. Estadísticas de jugador");
            System.out.println("2. Estadísticas de equipo");
            System.out.println("3. Volver");
            System.out.print("Opción: ");
            opcion = teclado.nextInt();
            teclado.nextLine();

            switch(opcion) {
                case 1: estadisticasJugador(liga); break;
                case 2: estadisticasEquipo(liga); break;
                case 3: break;
                default: System.out.println("Opción no válida.");
            }
        } while(opcion != 3);
    }

    public static void menuApuestas(Liga liga) {
        int opcion;
        do {
            System.out.println("\n-- GESTIONAR APUESTAS --");
            System.out.println("1. Realizar apuesta");
            System.out.println("2. Mostrar apuestas");
            System.out.println("3. Ver saldo");
            System.out.println("4. Volver");
            System.out.print("Opción: ");
            opcion = teclado.nextInt();
            teclado.nextLine();

            switch(opcion) {
                case 1: realizarApuesta(liga); break;
                case 2: liga.mostrarApuestas(); break;
                case 3: System.out.println("Saldo: " + liga.getSaldoAdministrador() + "€"); break;
                case 4: break;
                default: System.out.println("Opción no válida.");
            }
        } while(opcion != 4);
    }
    
    public static void registrarJugador(Liga liga) {
    	
    	int id=pedirIntRango("Introduce el ID: ", 0, 1000000);
    	String nombre=pedirString("Introduce el nombre: ");;
    	String nickname=pedirString("Introduce el nickname: ");
    	int edad=pedirIntRango("Introduce la edad: ", 16, 50);
    	double salarioBase = pedirDoubleRango("Introduce el salario base: ", 0, 100000);
    	int nivelMecanico=pedirIntRango("Introduce el Nivel Mecanico: ", 0, 10);
    	int nivelEstrategico=pedirIntRango("Introduce el Nivel Estrategico: ", 0, 10);
    	int partidasJugadas=pedirIntRango("Introduce las Partidas Jugadas : ", 0, 10000);
    	int mvpsTotales=pedirIntRango("Introduce el Nº de MVPs: ", 0, 100);
    	boolean sancionado=pedirBoolean("¿Está sancionado?");
    	System.out.println("Roles disponibles:");
    	System.out.println("1. TOP");
    	System.out.println("2. JUNGLE");
    	System.out.println("3. MID");
    	System.out.println("4. ADC");
    	System.out.println("5. SUPPORT");
    	int opcionRol = pedirIntRango("Elige rol: ", 1, 5);
    	Rol rol = Rol.values()[opcionRol - 1];
    	
    	Jugador j = new Jugador(id, nombre, nickname, edad, salarioBase,  rol, nivelMecanico, nivelEstrategico, partidasJugadas, mvpsTotales, sancionado);
    	try {
    	    liga.registrarPersona(j);
    	    System.out.println("Jugador registrado correctamente.");
    	} catch (PersonaDuplicadaException e) {
    	    System.out.println("Error: " + e.getMessage());
    	}
    	
    }
    public static void registrarEntrenador(Liga liga) {
    	
    	int id=pedirIntRango("Introduce el ID: ", 0, 1000000);
    	String nombre=pedirString("Introduce el nombre: ");
    	String nickname=pedirString("Introduce el nickname: ");
    	int edad=pedirIntRango("Introduce la edad: ", 20, 80);
    	double salarioBase = pedirDoubleRango("Introduce el salario base: ", 0, 100000);
    	int experiencia=pedirIntRango("Introduce la experiencia: ", 0, 30);
    	String especialidad=pedirString("Introduce la especialidad: ");
    	int victorias=pedirIntRango("Introduce las victorias totales: ", 0, 1000);
    	
    	Entrenador e = new Entrenador(id, nombre, nickname, edad, salarioBase, experiencia, especialidad, victorias);
    	try {
			liga.registrarPersona(e);
			System.out.println("Entrenador registrado correctamente.");
		} catch (PersonaDuplicadaException e1) {
			System.out.println("Error: " + e1.getMessage());
		}
    	
    }
    
    public static void modificarPersona(Liga liga) {

        int id = pedirInt("Introduce el ID de la persona a modificar: ");
        PersonaLiga p = liga.buscarPersona(id);

        if(p == null) {
            System.out.println("No se ha encontrado ninguna persona con ese ID.");
            return;
        }

        p.mostrarResumen();
        System.out.println("\n¿Qué dato deseas modificar?");
        System.out.println("1. Nombre");
        System.out.println("2. Nickname");
        System.out.println("3. Edad");
        System.out.println("4. Salario base");
        if(p instanceof Jugador) {
            System.out.println("5. Nivel mecánico");
            System.out.println("6. Nivel estratégico");
            System.out.println("7. Estado de sanción");
        } else if(p instanceof Entrenador) {
            System.out.println("5. Experiencia");
            System.out.println("6. Especialidad");
            System.out.println("7. Victorias totales");
        }

        int opcion = pedirIntRango("Opción: ", 1, 7);

        switch(opcion) {
            case 1:
                p.setNombre(pedirString("Nuevo nombre: "));
                break;
            case 2:
                p.setNickname(pedirString("Nuevo nickname: "));
                break;
            case 3:
                p.setEdad(pedirIntRango("Nueva edad: ", 16, 80));
                break;
            case 4:
                p.setSalarioBase(pedirDoubleRango("Nuevo salario base: ", 0, 100000));
                break;
            case 5:
                if(p instanceof Jugador)
                    ((Jugador) p).setNivelMecanico(pedirIntRango("Nuevo nivel mecánico (0-10): ", 0, 10));
                else if(p instanceof Entrenador)
                    ((Entrenador) p).setExperiencia(pedirIntRango("Nueva experiencia (años): ", 0, 30));
                break;
            case 6:
                if(p instanceof Jugador)
                    ((Jugador) p).setNivelEstrategico(pedirIntRango("Nuevo nivel estratégico (0-10): ", 0, 10));
                else if(p instanceof Entrenador)
                    ((Entrenador) p).setEspecialidad(pedirString("Nueva especialidad: "));
                break;
            case 7:
                if(p instanceof Jugador)
                    ((Jugador) p).setSancionado(pedirBoolean("¿Sancionado?"));
                else if(p instanceof Entrenador)
                    ((Entrenador) p).setVictoriasTotales(pedirIntRango("Nuevas victorias totales: ", 0, 1000));
                break;
            default:
                System.out.println("Opción no válida.");
                return;
        }

        liga.registrarAccion("Persona modificada: " + p.getNombre());
        System.out.println("Persona modificada correctamente.");
    }

        public static void buscarPersona(Liga liga) {
    	
    	int id=pedirInt("Introduce el ID: ");
    	PersonaLiga p=liga.buscarPersona(id);
    	
    	if(p==null) {
    		System.out.println("No se ha encontrado");
        	return;
    	}
    	p.mostrarResumen();
    	
    }
    
    public static void eliminarPersona(Liga liga) {
    	
    	int id=pedirInt("Introduce el ID: ");
    	try {
			liga.eliminarPersona(id);
			System.out.println("Borrado satisfactoriamente");
		} catch (PersonaNoEncontradaException e) {
			System.out.println("Error: " + e.getMessage());
		}
    	
    }
    public static void registrarEquipo(Liga liga) {

        String nombre = pedirString("Introduce el nombre del equipo: ");
        String ciudad = pedirString("Introduce la ciudad: ");
        int idEntrenador = pedirInt("Introduce el ID del entrenador: ");

        PersonaLiga p = liga.buscarPersona(idEntrenador);
        if(p == null || !(p instanceof Entrenador)) {
            System.out.println("No se ha encontrado ningún entrenador con ese ID.");
            return;
        }

        Entrenador entrenador = (Entrenador) p;
        double presupuesto = pedirDoubleRango("Introduce el presupuesto: ", 0, 10000000);

        Equipo e = new Equipo(nombre, ciudad, entrenador, presupuesto);
        try {
            liga.registrarEquipo(e);
            System.out.println("Equipo registrado correctamente.");
        } catch (EquipoDuplicadoException ex) {
            System.out.println("Error: " + ex.getMessage());
        }
    }
    public static void buscarEquipo(Liga liga) {
    	
    	String nombre = pedirString("Introduce el nombre del equipo: ");
    	Equipo eq=liga.buscarEquipo(nombre);
    	if(eq==null)
    		System.out.println("No se ha encontrado.");
    	else
    		System.out.println(eq);
    	
    }
    public static void eliminarEquipo(Liga liga) {
    	
    	String nombre = pedirString("Introduce el nombre del equipo: ");
    	try {
			liga.eliminarEquipo(nombre);
			System.out.println("Eliminado satisfactoriamente.");
		} catch (EquipoNoEncontradoException e) {
			System.out.println("Error: " + e.getMessage());
		}
    	
    }
    public static void mostrarCosteEquipo(Liga liga) {
    	
    	String nombre = pedirString("Introduce el nombre del equipo: ");
    	Equipo eq=liga.buscarEquipo(nombre);
    	if(eq==null)
    		System.out.println("No se ha encontrado.");
    	else
    		System.out.println(eq.calcularCosteTotal());
    	
    }
    
    public static void mostrarPlantilla(Liga liga) {
        String nombre = pedirString("Introduce el nombre del equipo: ");
        Equipo eq = liga.buscarEquipo(nombre);
        if(eq == null) {
            System.out.println("No se ha encontrado.");
            return;
        }
        eq.mostrarPlantilla();
    }

    public static void eliminarSuplente(Liga liga) {
        String nombre = pedirString("Introduce el nombre del equipo: ");
        Equipo eq = liga.buscarEquipo(nombre);
        if(eq == null) {
            System.out.println("No se ha encontrado.");
            return;
        }
        int idJugador = pedirInt("Introduce el ID del jugador: ");
        PersonaLiga p = liga.buscarPersona(idJugador);
        if(p == null || !(p instanceof Jugador)) {
            System.out.println("No se ha encontrado ningún jugador con ese ID.");
            return;
        }
        try {
            eq.eliminarSuplente((Jugador) p);
            System.out.println("Eliminado correctamente.");
        } catch (SuplenteInvalidoException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }

    public static void añadirSuplente(Liga liga) {
        String nombre = pedirString("Introduce el nombre del equipo: ");
        Equipo eq = liga.buscarEquipo(nombre);
        if(eq == null) {
            System.out.println("No se ha encontrado.");
            return;
        }
        int idJugador = pedirInt("Introduce el ID del jugador: ");
        PersonaLiga p = liga.buscarPersona(idJugador);
        if(p == null || !(p instanceof Jugador)) {
            System.out.println("No se ha encontrado ningún jugador con ese ID.");
            return;
        }
        try {
            eq.añadirSuplente((Jugador) p);
            System.out.println("Suplente añadido correctamente.");
        } catch (SuplenteInvalidoException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }

    public static void añadirTitular(Liga liga) {
        String nombre = pedirString("Introduce el nombre del equipo: ");
        Equipo eq = liga.buscarEquipo(nombre);
        if(eq == null) {
            System.out.println("No se ha encontrado.");
            return;
        }
        int idJugador = pedirInt("Introduce el ID del jugador: ");
        PersonaLiga p = liga.buscarPersona(idJugador);
        if(p == null || !(p instanceof Jugador)) {
            System.out.println("No se ha encontrado ningún jugador con ese ID.");
            return;
        }
        try {
            eq.añadirTitular((Jugador) p);
            System.out.println("Titular añadido correctamente.");
        } catch (TitularInvalidoException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }

    public static void promoverSuplente(Liga liga) {
        String nombre = pedirString("Introduce el nombre del equipo: ");
        Equipo eq = liga.buscarEquipo(nombre);
        if(eq == null) {
            System.out.println("No se ha encontrado.");
            return;
        }
        int idJugador = pedirInt("Introduce el ID del jugador: ");
        PersonaLiga p = liga.buscarPersona(idJugador);
        if(p == null || !(p instanceof Jugador)) {
            System.out.println("No se ha encontrado ningún jugador con ese ID.");
            return;
        }
        int posicion = pedirIntRango("Introduce la posición (1-5): ", 1, 5);
        try {
            eq.promoverSuplente((Jugador) p, posicion);
            System.out.println("Suplente promovido correctamente.");
        } catch (TitularInvalidoException | SuplenteInvalidoException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }
    
    public static void generarCalendario(Liga liga) {
    	
    	int jornadas = pedirInt("Introduce el numero de jornadas: ");
    	liga.generarCalendario(jornadas);
    	System.out.println("Calendario generado");
    	
    }
    
    public static void mostrarJornada(Liga liga) {
    	
    	int jornada = pedirInt("Introduce la jornada: ");
    	liga.mostrarJornada(jornada);
    	
    }
    
    public static void encolarPartido(Liga liga) {

    	int id = pedirIntRango("Introduce el ID del partido: ", 0, 1000000);
    	int jornada = pedirIntRango("Introduce la jornada: ", 1, 100);
        String nombreLocal = pedirString("Introduce el nombre del equipo local: ");
        Equipo a = liga.buscarEquipo(nombreLocal);
        String nombreVis = pedirString("Introduce el nombre del equipo visitante: ");
        Equipo b = liga.buscarEquipo(nombreVis);

        if(a == null || b == null) {
            System.out.println("No se ha encontrado alguno de los equipos.");
            return;
        }

        Partido p = new Partido(id, jornada, a, b);
        try {
            liga.encolarPartido(p);
            System.out.println("Partido encolado correctamente.");
        } catch (PartidoDisputadoException | PartidoInvalidoException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }
    
    public static void disputarPartido(Liga liga) {

        liga.mostrarSiguientePartido();
        int local = pedirIntRango("Introduce los puntos del equipo local: ", 0, 9999);
        int vis = pedirIntRango("Introduce los puntos del equipo visitante: ", 0, 9999);
        int idMvp = pedirInt("Introduce el ID del MVP: ");
        PersonaLiga p = liga.buscarPersona(idMvp);

        if(p == null || !(p instanceof Jugador)) {
            System.out.println("No se ha encontrado ningún jugador con ese ID.");
            return;
        }

        try {
            liga.disputarSiguientePartido(local, vis, (Jugador) p);
            System.out.println("Partido disputado correctamente.");
        } catch (PartidoDisputadoException | PartidoInvalidoException | MvpInvalidoException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }
    
    public static void registrarIncidencia(Liga liga) {

        int id = pedirInt("Introduce el ID de la incidencia: ");
        String descripcion = pedirString("Introduce la descripción: ");
        System.out.println("Tipos de incidencia:");
        System.out.println("1. SANCION");
        System.out.println("2. EXPULSION");
        System.out.println("3. ERROR_TECNICO");
        System.out.println("4. PARTIDO_APLAZADO");
        int opcionTipo = pedirIntRango("Elige tipo: ", 1, 4);
        TipoIncidencia tipo = TipoIncidencia.values()[opcionTipo - 1];

        String nombreEquipo = pedirString("Introduce el nombre del equipo: ");
        Equipo eq = liga.buscarEquipo(nombreEquipo);
        if(eq == null) {
            System.out.println("No se ha encontrado el equipo.");
            return;
        }

        int idJugador = pedirInt("Introduce el ID del jugador (0 si no aplica): ");
        Jugador j = null;
        if(idJugador != 0) {
            PersonaLiga p = liga.buscarPersona(idJugador);
            if(p == null || !(p instanceof Jugador)) {
                System.out.println("No se ha encontrado ningún jugador con ese ID.");
                return;
            }
            j = (Jugador) p;
        }

        Incidencia i = new Incidencia(id, descripcion, tipo, eq, j);
        try {
            i.aplicarSancion();
        } catch (JugadorInvalidoException ex) {
            System.out.println("Aviso: " + ex.getMessage());
        }
        liga.registrarIncidencia(i);
        System.out.println("Incidencia registrada correctamente.");
    }

    public static void buscarIncidenciaEquipo(Liga liga) {
        String nombre = pedirString("Introduce el nombre del equipo: ");
        liga.buscarIncidenciasPorEquipo(nombre);
    }

    public static void buscarIncidenciaJugador(Liga liga) {
        String nickname = pedirString("Introduce el nickname del jugador: ");
        liga.buscarIncidenciasPorJugador(nickname);
    }
    
    public static void estadisticasJugador(Liga liga) {
    	
    	int idJugador = pedirInt("Introduce el ID del jugador: ");
    	PersonaLiga p = liga.buscarPersona(idJugador);
    	Jugador j = null;
    	
    	if(p == null || !(p instanceof Jugador)) {
    		System.out.println("No se ha encontrado ningún jugador con ese ID.");
            return;
    	}
    	j = (Jugador) p;
    	j.mostrarResumen();
    	
    }
    
    public static void estadisticasEquipo(Liga liga) {

        String nombre = pedirString("Introduce el nombre del equipo: ");
        Equipo eq = liga.buscarEquipo(nombre);

        if(eq == null) {
            System.out.println("No se ha encontrado el equipo.");
            return;
        }

        System.out.println("-- ESTADÍSTICAS: " + eq.getNombre() + " --");
        System.out.println("Victorias: " + eq.getVictorias());
        System.out.println("Derrotas: " + eq.getDerrotas());
        System.out.println("Puntos a favor: " + eq.getPuntosFavor());
        System.out.println("Puntos en contra: " + eq.getPuntosContra());
        System.out.println("Diferencia: " + (eq.getPuntosFavor() - eq.getPuntosContra()));
        System.out.println("Coste total plantilla: " + eq.calcularCosteTotal() + "€");
    }
    
    public static void realizarApuesta(Liga liga) {

        liga.mostrarColaPartidos();

        String nombreEquipo = pedirString("Introduce el nombre del equipo: ");
        Equipo eq = liga.buscarEquipo(nombreEquipo);
        if(eq == null) {
            System.out.println("No se ha encontrado el equipo.");
            return;
        }

        int idPartido = pedirInt("Introduce el ID del partido: ");
        Iterator<Partido> i = liga.getColaPartidos().iterator();
        Partido partido = null;

        while(i.hasNext()) {
            Partido actual = i.next();
            if(actual.getId() == idPartido) {
                partido = actual;
                break;
            }
        }

        if(partido == null) {
            System.out.println("No se ha encontrado el partido.");
            return;
        }

        double cantidad = pedirDoubleRango("Introduce la cantidad a apostar: ", 1, liga.getSaldoAdministrador());

        try {
            liga.realizarApuesta(eq, cantidad, partido);
            System.out.println("Apuesta realizada correctamente. Saldo restante: " + liga.getSaldoAdministrador() + "€");
        } catch (PartidoDisputadoException | PartidoInvalidoException | SaldoInsuficienteException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }
}