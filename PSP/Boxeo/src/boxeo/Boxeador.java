
package boxeo;

import java.util.*;


public class Boxeador extends Thread{
    
    private String nombre;
    private Ring ring;
    private int golpes;

    public Boxeador(String nombre, Ring ring) {
        this.nombre = nombre;
        this.ring = ring;
    }

    public String getNombre() {
        return nombre;
    }

    public int getGolpes() {
        return golpes;
    }
    
    public void pegar(){
        golpes++;
    }

    @Override
    
    public void run(){
       while (ring.getGolpes() < 10) {		
            ring.pegar(this);
       		try {
                    Thread.sleep(new Random().nextInt(1));
                } catch (InterruptedException ie) {}
            }
	}

}
