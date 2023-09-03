
package ejercicio2;

public class Ejercicio2 {

    public static void main(String[] args) {
    ClaseHilo1 clasehilo1 = new ClaseHilo1();
    Thread hilo1 = new Thread(clasehilo1);
    ClaseHilo2 claseHilo2 = new ClaseHilo2(hilo1);
    Thread hilo2 = new Thread(claseHilo2);
    hilo1.start();
    hilo2.start();      
        
    }
    
}
