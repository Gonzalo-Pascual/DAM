
package boxeo;


public class Boxeo {

    public static void main(String[] args) {
        Ring ring = new Ring();
        Boxeador boxeador1 = new Boxeador("Lili", ring);
        Boxeador boxeador2 = new Boxeador("Brayan", ring);
        boxeador1.start();
        boxeador2.start();
        
        try{
            boxeador1.join();
            boxeador2.join();
        }catch(InterruptedException ie){}
        
        System.out.println("Fin del combate");
            if (boxeador1.getGolpes() > boxeador2.getGolpes())
                System.out.println("Ha ganado " + boxeador1.getNombre());
            else if (boxeador1.getGolpes() < boxeador2.getGolpes())
                System.out.println("Ha ganado " + boxeador2.getNombre());
            else
                System.out.println("Empate");
    }
    
}
