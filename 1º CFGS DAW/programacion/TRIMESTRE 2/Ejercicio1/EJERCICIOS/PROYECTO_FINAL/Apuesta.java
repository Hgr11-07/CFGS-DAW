package PROYECTO_FINAL;

public class Apuesta {

    private Equipo equipo;
    private double cantidad;
    private double cuota;
    private Partido partido;
    private boolean resuelta;
    private boolean ganada;

    public Apuesta(Equipo equipo, double cantidad, double cuota, Partido partido) {
        this.equipo = equipo;
        this.cantidad = cantidad;
        this.cuota = cuota;
        this.partido = partido;
        this.resuelta = false;
        this.ganada = false;
    }

    public Equipo getEquipo() { 
    	return equipo; 
    }
    public double getCantidad() { 
    	return cantidad; 
    }
    public double getCuota() { 
    	return cuota; 
    }
    public Partido getPartido() { 
    	return partido; 
    }
    public boolean isResuelta() { 
    	return resuelta; 
    }
    public boolean isGanada() { 
    	return ganada; 
    }

    public void setEquipo(Equipo equipo) { 
    	this.equipo = equipo; 
    }
    public void setCantidad(double cantidad) { 
    	this.cantidad = cantidad; 
    }
    public void setCuota(double cuota) { 
    	this.cuota = cuota; 
    }
    public void setPartido(Partido partido) { 
    	this.partido = partido; 
    }
    public void setResuelta(boolean resuelta) { 
    	this.resuelta = resuelta; 
    }
    public void setGanada(boolean ganada) { 
    	this.ganada = ganada; 
    }

    @Override
    public String toString() {
        return "Apuesta | Equipo: " + equipo.getNombre() +
               " | Cantidad: " + cantidad + "€" +
               " | Cuota: " + cuota +
               " | Resuelta: " + resuelta +
               " | Ganada: " + ganada;
    }

}