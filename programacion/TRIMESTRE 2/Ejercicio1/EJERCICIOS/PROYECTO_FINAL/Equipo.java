package PROYECTO_FINAL;
import java.util.*;

public class Equipo implements Comparable<Equipo>{
	
	private String nombre;
	private String ciudad;
	private Entrenador entrenador;
	private double presupuesto;
	private int victorias;
	private int derrotas;
	private int puntosFavor;
	private int puntosContra;
	private Jugador[] titulares;
	private ArrayList<Jugador> suplentes;
	
	public Equipo(String nombre, String ciudad, Entrenador entrenador, double presupuesto) {
		this.nombre=nombre;
		this.ciudad=ciudad;
		this.entrenador=entrenador;
		this.presupuesto=presupuesto;
		this.victorias=0;
		this.derrotas=0;
		this.puntosFavor=0;
		this.puntosContra=0;
		this.titulares=new Jugador[5];
		this.suplentes=new ArrayList<Jugador>();
	}
	
	public String getNombre() {
		return this.nombre;
	}
	
	public String getCiudad() {
		return this.ciudad;
	}
	
	public Entrenador getEntrenador() {
		return this.entrenador;
	}
	
	public double getPresupuesto() {
		return this.presupuesto;
	}
	
	public int getVictorias() {
		return this.victorias;
	}
	
	public int getDerrotas() {
		return this.derrotas;
	}
	
	public int getPuntosFavor() {
		return this.puntosFavor;
	}
	
	public int getPuntosContra() {
		return this.puntosContra;
	}
	
	public Jugador[] getTitulares() {
		return this.titulares;
	}
	
	public ArrayList<Jugador> getSuplentes() {
		return this.suplentes;
	}
	
	public void setNombre(String nombre) {
		this.nombre=nombre;
	}
	
	public void setCiudad(String ciudad) {
		this.ciudad=ciudad;
	}
	
	public void setEntrenador(Entrenador entrenador) {
		this.entrenador=entrenador;
	}
	
	public void setPresupuesto(double presupuesto) {
		this.presupuesto=presupuesto;
	}
	
	public void setVictorias(int victorias) {
		this.victorias=victorias;
	}
	
	public void setDerrotas(int derrotas) {
		this.derrotas=derrotas;
	}
	
	public void setPuntosFavor(int puntosFavor) {
		this.puntosFavor=puntosFavor;
	}
	
	public void setPuntosContra(int puntosContra) {
		this.puntosContra=puntosContra;
	}
	
	public void setTitulares(Jugador[] titulares) {
		this.titulares=titulares;
	}
	
	public void setSuplentes(ArrayList<Jugador> suplentes) {
		this.suplentes=suplentes;
	}
	
	public void añadirTitular(Jugador j) throws TitularInvalidoException {
		
		for(int i=0; i<titulares.length; i++) {
			if(titulares[i]!=null&&j.getRol().equals(titulares[i].getRol())) {
				throw new TitularInvalidoException("No pueden haber dos titulares con el mismo rol.");
			}
		}
		
		if(j.getSancionado()) {
			throw new TitularInvalidoException("Este jugador está sancionado");
		}
		
		for(int i=0; i<titulares.length; i++) {
			if(titulares[i]==null) {
				titulares[i]=j;
				break;
			}
		}
	}
	
	public void añadirSuplente(Jugador j) throws SuplenteInvalidoException {
		
		for(Jugador ju : titulares) {
		    if(ju != null && ju.equals(j)) {
		        throw new SuplenteInvalidoException("Este jugador ya es titular.");
		    }
		}

		if(suplentes.contains(j)) {
		    throw new SuplenteInvalidoException("Este jugador ya está en el banquillo.");
		}
		
		suplentes.add(j);
		
	}
	
	public void promoverSuplente(Jugador j, int posicion) throws TitularInvalidoException, SuplenteInvalidoException {
		
		boolean quitado=false;
	
		if(posicion>4||posicion<0) {
			throw new TitularInvalidoException("Introduzca una posición correcta (1-5).");

		}
		if(titulares[posicion]!=null) {
			throw new TitularInvalidoException("Ya hay un jugador en esa posición.");
		}
		
		quitado=suplentes.remove(j);
		
		if(!quitado) {
			throw new SuplenteInvalidoException("Este jugador no está en los suplentes.");
		}
		
		for(int i=0; i<titulares.length; i++) {
			if(titulares[i]!=null&&titulares[i].equals(j)) {
					throw new TitularInvalidoException("Este jugador ya es titular.");
			}
		}
		titulares[posicion]=j;
	}
	
	public void eliminarSuplente(Jugador j) throws SuplenteInvalidoException {
		
		boolean quitado=false;
		quitado=suplentes.remove(j);
		
		if(!quitado) {
			throw new SuplenteInvalidoException("Este jugador no está en los suplentes.");
		}
		
	}
	
	public void mostrarPlantilla() {
		
		Jugador j;
		
		System.out.println("-- PLANTILLA TITULAR --");
		Iterator<Jugador> iterator = suplentes.iterator();
		int indice=1;
		
		for(int i=0; i<titulares.length; i++) {
			if(titulares[i]!=null)
				System.out.println((i+1)+". "+titulares[i].getNombre()+ "	("+titulares[i].getNickname()+")");
			else
				System.out.println("----");
		}
		
		System.out.println();
		System.out.println();
		System.out.println("-- BANCO DE SUPLENTES --");
		
		while(iterator.hasNext()) {
			j=iterator.next();
			System.out.println(indice+". " +j.getNombre()+ "	("+j.getNickname()+")");
			indice++;
		}
	}
	
	public double calcularCosteTotal() {
		
		double total=0;
		Iterator<Jugador> iterator = suplentes.iterator();
		
		for(int i=0; i<titulares.length; i++) {
			if(titulares[i]!=null)
				total+=titulares[i].calcularCosteMensual();
		}
		
		while(iterator.hasNext()) {
		    total += iterator.next().calcularCosteMensual();
		}
		
		total+=entrenador.calcularCosteMensual();
		
		return total;
	}
	
	@Override
	public String toString() {
		return "Equipo: "+nombre+ " | Ciudad: " +ciudad+ " | Entrenador: " +entrenador+ " | Presupuesto: " +presupuesto+ " | Victorias: " +victorias+ " | Derrotas: " +derrotas+ " | Puntos a Favor: " +puntosFavor+ " | Puntos En Contra: " +puntosContra;
	}

	/**
	 * Valida que el equipo puede disputar un partido:
	 *  - Exactamente 5 titulares (ninguna posición vacía)
	 *  - Ningún titular sancionado
	 *  - No hay dos titulares con el mismo rol
	 * Si alguna condición falla lanza ConvocatoriaInvalidaException.
	 */
	public void validarConvocatoria() throws ConvocatoriaInvalidaException {

		// 1. Los 5 huecos deben estar ocupados
		for(int i = 0; i < titulares.length; i++) {
			if(titulares[i] == null) {
				throw new ConvocatoriaInvalidaException(
					"El equipo " + nombre + " no tiene 5 titulares (posición " + (i+1) + " vacía).");
			}
		}

		// 2. Ningún titular puede estar sancionado
		for(int i = 0; i < titulares.length; i++) {
			if(titulares[i].getSancionado()) {
				throw new ConvocatoriaInvalidaException(
					"El jugador " + titulares[i].getNickname() + " del equipo " + nombre + " está sancionado.");
			}
		}

		// 3. No puede haber dos titulares con el mismo rol (doble comprobación defensiva)
		for(int i = 0; i < titulares.length; i++) {
			for(int j = i + 1; j < titulares.length; j++) {
				if(titulares[i].getRol().equals(titulares[j].getRol())) {
					throw new ConvocatoriaInvalidaException(
						"El equipo " + nombre + " tiene dos titulares con el rol " + titulares[i].getRol() + ".");
				}
			}
		}
	}

	@Override
	public int compareTo(Equipo e) {
		// 1. Por victorias descendente
		if(this.victorias != e.victorias)
			return e.victorias - this.victorias;
		// 2. Por diferencia de puntos descendente
		int difThis = this.puntosFavor - this.puntosContra;
		int difOtro = e.puntosFavor - e.puntosContra;
		if(difThis != difOtro)
			return difOtro - difThis;
		// 3. Por nombre alfabético ascendente
		return this.nombre.compareTo(e.nombre);
	}
	
}
