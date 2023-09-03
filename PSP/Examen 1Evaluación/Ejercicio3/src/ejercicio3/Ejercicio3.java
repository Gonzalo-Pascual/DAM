
package ejercicio3;

public class Ejercicio3 {

    public static void main(String[] args) throws InterruptedException {
       
        Thread hilo1 = new Thread(new Runnable(){
        @Override
        public void run(){
            for (int i = 0; i < 5; i++) {
               System.out.println("Hilo 1"); 
            }
        }
	});
        
        Thread hilo2 = new Thread(new Runnable(){
        @Override
        public void run(){
            for (int i = 0; i < 5; i++) {
               System.out.println("Hilo 2"); 
            }
        }
	});
        
        Thread hilo3 = new Thread(new Runnable(){
        @Override
        public void run(){
            for (int i = 0; i < 5; i++) {
               System.out.println("Hilo 3"); 
            }
        }
	});
        
        Thread hilo4 = new Thread(new Runnable(){
        @Override
        public void run(){
            for (int i = 0; i < 5; i++) {
               System.out.println("Hilo 4"); 
            }
        }
	});
        
        hilo1.start();
        hilo1.join();
        hilo2.start();
        hilo2.join();
        hilo3.start();
        hilo3.join();
        hilo4.start();
        hilo4.join();
    }
    
}
