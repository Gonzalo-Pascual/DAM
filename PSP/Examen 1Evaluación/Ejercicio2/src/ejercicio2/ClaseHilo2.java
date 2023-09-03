
package ejercicio2;

public class ClaseHilo2 implements Runnable{

    private Thread hilo2;
        
    public ClaseHilo2(Thread hilo2) {
      this.hilo2 = hilo2;
    }
    
    @Override
    public void run() {
        while (hilo2.isAlive()) {
            System.out.println("Hilo 2");
            try {
                Thread.sleep(500);
            } catch (InterruptedException ie) {
                ie.printStackTrace();
            }
        }
        System.out.println("Termina el hilo 1 y el hilo 2");
    }
    
    
}
