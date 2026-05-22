package PROYECTO_FINAL;

import java.util.*;

public class Liga {

    private ArrayList<Equipo> equipos;
    private ArrayList<PersonaLiga> personas;
    private ArrayList<Incidencia> incidencias;
    private Queue<Partido> colaPartidos;
    private Stack<String> historial;
    private HashSet<Integer> idsRegistrados;
    private HashSet<String> nombresEquipos;
    private HashSet<Integer> idsPartidos;
    private int[][] calendario;
    private ArrayList<Apuesta> apuestas;
    private double saldoAdministrador;

    public Liga() {
        this.equipos = new ArrayList<>();
        this.personas = new ArrayList<>();
        this.incidencias = new ArrayList<>();
        this.colaPartidos = new LinkedList<>();
        this.historial = new Stack<>();
        this.idsRegistrados = new HashSet<>();
        this.nombresEquipos = new HashSet<>();
        this.idsPartidos = new HashSet<>();
        this.calendario = null;
        this.apuestas = new ArrayList<>();
        this.saldoAdministrador = 1000.0; // Saldo Inicial Ficticio
    }

    public ArrayList<Equipo> getEquipos() { 
    	return equipos; 
    }
    public ArrayList<PersonaLiga> getPersonas() { 
    	return personas; 
    }
    public ArrayList<Incidencia> getIncidencias() { 
    	return incidencias; 
    }
    public Queue<Partido> getColaPartidos() { 
    	return colaPartidos; 
    }
    public Stack<String> getHistorial() { 
    	return historial; 
    }
    public HashSet<Integer> getIdsRegistrados() { 
    	return idsRegistrados; 
    }
    public HashSet<String> getNombresEquipos() { 
    	return nombresEquipos; 
    }
    public int[][] getCalendario() { 
    	return calendario; 
    }
    public ArrayList<Apuesta> getApuesta() { 
    	return apuestas; 
    }
    public double getSaldoAdministrador() {
    	return saldoAdministrador;
    }

    public void setEquipos(ArrayList<Equipo> equipos) { 
    	this.equipos = equipos; 
    }
    public void setPersonas(ArrayList<PersonaLiga> personas) { 
    	this.personas = personas; 
    }
    public void setIncidencias(ArrayList<Incidencia> incidencias) { 
    	this.incidencias = incidencias; 
    }
    public void setColaPartidos(Queue<Partido> colaPartidos) { 
    	this.colaPartidos = colaPartidos; 
    }
    public void setHistorial(Stack<String> historial) { 
    	this.historial = historial; 
    }
    public void setIdsRegistrados(HashSet<Integer> idsRegistrados) { 
    	this.idsRegistrados = idsRegistrados; 
    }
    public void setNombresEquipos(HashSet<String> nombresEquipos) { 
    	this.nombresEquipos = nombresEquipos; 
    }
    public void setCalendario(int[][] calendario) { 
    	this.calendario = calendario; 
    }
    
    public void registrarPersona(PersonaLiga p) throws PersonaDuplicadaException {
    	
    	if(idsRegistrados.contains(p.getId())) {
    		throw new PersonaDuplicadaException("El jugador ya existe.");
    	}
    	
    	personas.add(p);
    	idsRegistrados.add(p.getId());
    	historial.push("Jug. Registrado: " +p.getNombre());
    
    }
    
    public void listarPersonas() {
    	
    	Iterator<PersonaLiga> i = personas.iterator();
    	int contador=1;
    	PersonaLiga p;
    	
    	if(personas.isEmpty()) {
    		System.out.println("Aún no hay jugadores registrados");
    		return;
    	}
    	
    	while(i.hasNext()) {
    		p=i.next();
    		System.out.println(contador+ ". " +p.getNombre()+ "	(@" +p.getNickname()+ ")");
    		System.out.println();
    		contador++;
    	}
    	
    }
    
    public PersonaLiga buscarPersona(int id) {
    	
    	Iterator<PersonaLiga> i = personas.iterator();
    	PersonaLiga p;
    	
    	while(i.hasNext()) {
    		p=i.next();
    		if(p!=null&&p.getId()==id) {
    			return p;
    		}
    	}
    	return null;
    }
    
    public void eliminarPersona(int id) throws PersonaNoEncontradaException {
    	
    	Iterator<PersonaLiga> i = personas.iterator();
    	PersonaLiga p;
    	boolean borrado=false;
    	
    	while(i.hasNext()){
    		p=i.next();
    		if(p!=null&&p.getId()==id) {
    			i.remove();
    			idsRegistrados.remove(p.getId());
    			historial.push("Jug. Borrado: " + p.getNombre());
    			borrado=true;
    			break;
    		}
    	}
    	
    	if(!borrado)
    		throw new PersonaNoEncontradaException("No se ha encontrado al jugador.");
    }
    
    public void registrarEquipo(Equipo e) throws EquipoDuplicadoException {
    	if(nombresEquipos.contains(e.getNombre())) {
    		throw new EquipoDuplicadoException("El equipo ya está registrado.");
    	}
    	
    	equipos.add(e);
    	nombresEquipos.add(e.getNombre());
    	historial.push("Eq. Registrado: " +e.getNombre());
    }
    
    public void listarEquipos() {
    	
    	Iterator<Equipo> i=equipos.iterator();
    	int contador = 1;
    	Equipo e;
    	
    	if(equipos.isEmpty()) {
    		System.out.println("Aun no hay equipos registrados.");
    		return;
    	}
    	
    	while(i.hasNext()) {
    		e=i.next();
    		System.out.println(contador+". "+ e.getNombre());
    		
    		contador++;
    	}
    	
    }
    
    public Equipo buscarEquipo(String nombre) {
    	
    	Iterator<Equipo> i = equipos.iterator();
    	Equipo e;
    	
    	while(i.hasNext()) {
    		e=i.next();
    		if(e!=null&&e.getNombre().equals(nombre)) {
    			return e;
    		}
    	}
    	return null;
    }
    
    public void eliminarEquipo(String nombre) throws EquipoNoEncontradoException {
    	
    	Iterator<Equipo> i = equipos.iterator();
    	Equipo e;
    	boolean borrado=false;
    	
    	while(i.hasNext()){
    		e=i.next();
    		if(e!=null&&e.getNombre().equals(nombre)) {
    			i.remove();
    			nombresEquipos.remove(e.getNombre());
    			historial.push("Eq. Borrado: " + e.getNombre());
    			borrado=true;
    			break;
    		}
    	}
    	
    	if(!borrado)
    		throw new EquipoNoEncontradoException("No se ha encontrado al equipo.");
    }
    
    public void encolarPartido(Partido p) throws PartidoDisputadoException, PartidoInvalidoException {
    	
    	if(p.isDisputado()) 
    		throw new PartidoDisputadoException("El partido ya se ha disputado");
    	
    	if(p.getEquipoLocal().equals(p.getEquipoVisitante())) 
    		throw new PartidoInvalidoException("Ambos equipos son iguales.");
    	
    	if(idsPartidos.contains(p.getId()))
    		throw new PartidoInvalidoException("Ya existe un partido con el ID " + p.getId() + ".");
    	
    	idsPartidos.add(p.getId());
    	colaPartidos.offer(p);
    	historial.push("Partido En Cola: " +p.getEquipoLocal()+ " VS " +p.getEquipoVisitante());
    	
    }
    
    public void mostrarSiguientePartido() {
    	
    	Partido p;
    	p=colaPartidos.peek();
    	
    	if(p==null)
    		System.out.println("No hay partidos pendientes.");
    	else
    		System.out.println("Partido: " +p.getEquipoLocal()+ " VS " +p.getEquipoVisitante());
    	
    }
    
    public void mostrarColaPartidos() {
    	
    	Iterator<Partido> i = colaPartidos.iterator();
    	Partido p;
    	int contador=1;
    	
    	if(colaPartidos.isEmpty()) {
    		System.out.println("No hay partidos pendientes.");
    		return;
    	}
    	
    	while(i.hasNext()) {
    		p=i.next();
    		if(p!=null) {
    			System.out.println(contador+ ". Partido: " +p.getEquipoLocal()+ " VS " +p.getEquipoVisitante());
    		}
    		contador++;
    	}
    }
    
    public void disputarSiguientePartido(int local, int vis, Jugador mvp) throws PartidoDisputadoException, PartidoInvalidoException, MvpInvalidoException, ConvocatoriaInvalidaException {
    	
    	Partido p;
    	
    	if(colaPartidos.isEmpty()) {
    	    System.out.println("No hay partidos pendientes.");
    	    return;
    	}
    	
    	p=colaPartidos.peek();
    	
    	// Validar convocatorias de ambos equipos antes de disputar
    	p.getEquipoLocal().validarConvocatoria();
    	p.getEquipoVisitante().validarConvocatoria();
    	
    	colaPartidos.poll();
    	p.registrarResultado(local, vis, mvp);
    	
    	resolverApuestas(p);
    	actualizarCalendario(p, local, vis);
    	historial.push("Partido disputado: " + p.getEquipoLocal().getNombre() + " VS " + p.getEquipoVisitante().getNombre());
    	
    }
    
    public void vaciarCola() {
    	int cantidad = colaPartidos.size();
    	colaPartidos.clear();
    	historial.push("Cola vaciada (" + cantidad + " partidos eliminados)");
    	System.out.println("Cola vaciada. Se han eliminado " + cantidad + " partido(s) pendiente(s).");
    }

        public void registrarAccion(String accion) {
    	historial.push(accion);
    }
    
    public void mostrarUltimaAccion() {
    	
    	String accion;
    	
    	if(historial.isEmpty()) {
    		System.out.println("El historial está vacío");
    		return ;
    	}
    	
    	accion=historial.peek();
    	System.out.println(accion);
    	
    }
    
    public void mostrarHistorial() {
    	
    	String s;
    	Iterator<String> i = historial.iterator();
    	int contador=1;
    	
    	if(historial.isEmpty()) {
    		System.out.println("El historial está vacío.");
    		return;
    	}
    	
    	while(i.hasNext()) {
    		s=i.next();
    		if(s!=null)
    			System.out.println(contador+". "+s);
    		contador++;
    	}
    	
    }
    
    public void deshacerUltimaAccion() {
    	
    	if(historial.isEmpty()) {
    		System.out.println("No hay cambios para deshacer.");
    		return;
    	}
    	
    	String s = historial.pop();
    	System.out.println("Deshaciendo: " + s);
    	
    	// Deshacer alta de persona: "Jug. Registrado: <nombre>"
    	if(s.startsWith("Jug. Registrado: ")) {
    		String nombre = s.substring("Jug. Registrado: ".length());
    		Iterator<PersonaLiga> it = personas.iterator();
    		while(it.hasNext()) {
    			PersonaLiga p = it.next();
    			if(p.getNombre().equals(nombre)) {
    				it.remove();
    				idsRegistrados.remove(p.getId());
    				System.out.println("Persona eliminada del sistema: " + nombre);
    				return;
    			}
    		}
    		System.out.println("No se pudo revertir: persona no encontrada.");
    		return;
    	}
    	
    	// Deshacer creación de equipo: "Eq. Registrado: <nombre>"
    	if(s.startsWith("Eq. Registrado: ")) {
    		String nombre = s.substring("Eq. Registrado: ".length());
    		Iterator<Equipo> it = equipos.iterator();
    		while(it.hasNext()) {
    			Equipo e = it.next();
    			if(e.getNombre().equals(nombre)) {
    				it.remove();
    				nombresEquipos.remove(nombre);
    				System.out.println("Equipo eliminado del sistema: " + nombre);
    				return;
    			}
    		}
    		System.out.println("No se pudo revertir: equipo no encontrado.");
    		return;
    	}
    	
    	// Para el resto de acciones (partidos, incidencias...) solo informamos
    	System.out.println("Acción registrada eliminada del historial (operación no reversible automáticamente).");
    }
    
    public void registrarIncidencia(Incidencia i) {
    	incidencias.add(i);
    	historial.push("Incidencia registrada: " + i.getTipo() + " - " + i.getEquipo().getNombre());
    }
    
    public void listarIncidencias() {
    	
    	Iterator<Incidencia> i = incidencias.iterator();
    	int contador=1;
    	Incidencia in;
    	
    	if(incidencias.isEmpty()) {
    		System.out.println("No hay incidencias.");
    		return;
    	}
    	
    	while(i.hasNext()) {
    		in=i.next();
    		if(in!=null)
    			System.out.println(contador+". " + in.getTipo() + " - " + in.getEquipo().getNombre());
    		contador++;
    	}
    }
    
    public void buscarIncidenciasPorEquipo(String nombreEquipo) {

        Iterator<Incidencia> i = incidencias.iterator();
        Incidencia in;
        int contador = 1;
        boolean encontrado = false;

        if(incidencias.isEmpty()) {
            System.out.println("No hay incidencias.");
            return;
        }

        while(i.hasNext()) {
            in = i.next();
            if(in != null && in.getEquipo().getNombre().equals(nombreEquipo)) {
                if(!encontrado)
                    System.out.println("-- EQUIPO: " + nombreEquipo + " --");
                System.out.println(contador + ". " + in.getTipo());
                contador++;
                encontrado = true;
            }
        }

        if(!encontrado)
            System.out.println("No hay incidencias para ese equipo.");
    }
    
    public void buscarIncidenciasPorJugador(String nickname) {
    	
    	Iterator<Incidencia> i = incidencias.iterator();
    	Incidencia in;
    	int contador = 1;
    	boolean encontrado = false;
    	
    	if(incidencias.isEmpty()) {
            System.out.println("No hay incidencias.");
            return;
        }
    	
    	while(i.hasNext()) {
    		in = i.next();
    		if(in != null && in.getJugador() != null && in.getJugador().getNickname().equals(nickname)) {
    			if(!encontrado)
    				System.out.println("-- JUGADOR: @" +nickname+ " --");
    			System.out.println(contador+ ". " +in.getTipo());
    			contador++;
    			encontrado = true;
    		}
    	}
    	
    	if(!encontrado)
    		System.out.println("No hay incidencias para ese jugador.");
    	
    }
    
    public void mostrarClasificacion() {
    	
    	int contador = 1;
    	Equipo e;
    	
    	if(equipos.isEmpty()) {
    		System.out.println("Aún no hay equipos para mostrar.");
    		return;
    	}
    	
    	Collections.sort(equipos, new Comparator<Equipo>() {
    		@Override
    	    public int compare(Equipo e1, Equipo e2) {
    	        if(e2.getVictorias() != e1.getVictorias())
    	            return e2.getVictorias() - e1.getVictorias();
    	    
    	        int dif1 = e1.getPuntosFavor() - e1.getPuntosContra();
    	        int dif2 = e2.getPuntosFavor() - e2.getPuntosContra();
    	        if(dif1 != dif2)
    	            return dif2 - dif1;
    	        

    	        return e1.getNombre().compareTo(e2.getNombre());
    	    }
    	}
    	);
    	
    	Iterator<Equipo> i = equipos.iterator();
    	System.out.println("-- CLASIFICACIÓN --");
    	System.out.println();
    	while(i.hasNext()) {
    	    e = i.next();
    	    System.out.println(contador + ". " + e.getNombre() + " | Victorias: " + e.getVictorias() + " | Derrotas: " + e.getDerrotas() + " | Dif. Puntos: " + (e.getPuntosFavor() - e.getPuntosContra()));
    	    contador++;
    	}
    }
    
    public void generarCalendario(int jornadas) {
    	
    	calendario= new int[equipos.size()][jornadas];
    	
    	for(int i=0; i<calendario.length; i++) {
    		for(int j=0; j<calendario[i].length; j++) {
    			calendario[i][j]=0;
    		}
    	}
    	
    }
    
    public void mostrarCalendario() {
    	
    	if(calendario==null) {
    		System.out.println("No hay calendario para mostrar.");
    		return;
    	}
    	
    	for(int i=0; i<calendario.length; i++) {
    		for(int j=0; j<calendario[i].length; j++) {
    			System.out.println(equipos.get(i).getNombre() + " | Jornada " + (j+1) + " | Puntos: " + calendario[i][j]);    		}
    	}	
    }
    
    public void mostrarJornada(int jornada) {

        if(calendario == null) {
            System.out.println("No hay calendario generado.");
            return;
        }

        if(jornada < 1 || jornada > calendario[0].length) {
            System.out.println("Jornada no válida.");
            return;
        }

        System.out.println("-- JORNADA " + jornada + " --");
        for(int i = 0; i < calendario.length; i++) {
            System.out.println(equipos.get(i).getNombre() + " | Puntos: " + calendario[i][jornada-1]);
        }
    }
    
    public double calcularCuota(Equipo e) {
    	double cuota;
    	cuota = 1 + (double)(e.getDerrotas() + 1) / (e.getVictorias() + 1);
    	return cuota;
    }
    
    public void realizarApuesta(Equipo e, double cantidad, Partido p) throws PartidoDisputadoException, PartidoInvalidoException, SaldoInsuficienteException {
    	
    	Apuesta a;
    	double cuota;
    	
    	if(p.isDisputado())
    		throw new PartidoDisputadoException("El partido ya se ha disputado.");
    	
    	if(!p.getEquipoLocal().equals(e) && !p.getEquipoVisitante().equals(e))
    	    throw new PartidoInvalidoException("El equipo no participa en ese partido.");

    	if(cantidad > saldoAdministrador)
    	    throw new SaldoInsuficienteException("Saldo insuficiente.");
    	
    	cuota=calcularCuota(e);
    	saldoAdministrador-=cantidad;
    	a=new Apuesta(e, cantidad, cuota, p);
    	apuestas.add(a);
    	historial.push("Apuesta: " + e.getNombre() + " | " + cantidad + "€ | Cuota: " + cuota);
    			
    }
    
    public void resolverApuestas(Partido p) {
    	
    	Iterator<Apuesta> i = apuestas.iterator();
    	Apuesta a;
    	
    	if(apuestas.isEmpty()) {
    	    System.out.println("No hay apuestas para resolver.");
    	    return;
    	}
    	
    	while(i.hasNext()) {
    	    a = i.next();
    	    if(a.getPartido().equals(p) && !a.isResuelta()) {
    	        if(a.getEquipo().equals(p.calcularGanador())) {
    	            a.setGanada(true);
    	            saldoAdministrador += (a.getCantidad() * a.getCuota());
    	        }
    	        a.setResuelta(true);
    	    }
    	}
    }
    
    public void mostrarApuestas() {
    	
    	Iterator<Apuesta> i = apuestas.iterator();
    	Apuesta a;
    	int contador=1;
    	
    	if(apuestas.isEmpty()) {
    	    System.out.println("No hay apuestas para resolver.");
    	    return;
    	}
    	
    	while(i.hasNext()) {
    		a=i.next();
    		if(a!=null) 
    			System.out.println(contador+ ". Apuesta: " + a.getEquipo().getNombre() + " | " + a.getCantidad() + "€ | Cuota: " + a.getCuota());
    		contador++;
    	}
    }
    
    public void actualizarCalendario(Partido p, int puntosLocal, int puntosVisitante) {
    	
        if(calendario == null) return;
        int jornada = p.getJornada() - 1;
        int indexLocal = equipos.indexOf(p.getEquipoLocal());
        int indexVisitante = equipos.indexOf(p.getEquipoVisitante());
        
        if(indexLocal >= 0 && jornada < calendario[0].length)
            calendario[indexLocal][jornada] += puntosLocal > puntosVisitante ? 3 : (puntosLocal == puntosVisitante ? 1 : 0);
            
        if(indexVisitante >= 0 && jornada < calendario[0].length)
            calendario[indexVisitante][jornada] += puntosVisitante > puntosLocal ? 3 : (puntosLocal == puntosVisitante ? 1 : 0);
    }
    
    
    
}
