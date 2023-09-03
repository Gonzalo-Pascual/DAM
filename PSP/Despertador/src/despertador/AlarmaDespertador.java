
package despertador;

import javax.swing.JLabel;
import javax.swing.SwingWorker;

/**
 *
 * @author Alumno Tarde
 */
public class AlarmaDespertador extends SwingWorker<Void, Void> {
    
    private int hora;
    private int minuto;
    private boolean activada;
    private JLabel lbEstado;
    
    public AlarmaDespertador(JLabel lbEstado, int hora, int minuto){
        this.lbEstado= lbEstado;
        this.hora= hora;
        this.minuto= minuto;
        activada = true;
    }
    
    public void desactivar(){
        activada= false;
    }
    
    public void sonar(){
        lbEstado.setText("Despierta");
        desactivar();
    }
    
    @SuppressWarnings("empty-statement")
    protected Void doInBackground() throws Exception{
        int[] momentoActual = new int[2];
        
        while ((activada)&&(isDone())){
            System.out.println("Comprobando hora");
            
            momentoActual = Util.getHoraMinutoActual();
            if((momentoActual[0] == hora) && (momentoActual[1] == minuto)){
                sonar();
            }
            
            try{
                Thread.sleep(500);
            }catch(InterruptedException ie){}
        }
            if(isCancelled())
                lbEstado.setText("Alarma cancelada por el usuario");
        return null;

        
    }

    
}


