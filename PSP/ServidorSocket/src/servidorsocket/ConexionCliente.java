
package servidorsocket;

import java.io.IOException;

public class ConexionCliente extends Thread{
    private Cliente cliente;
    private Servidor servidor;
    
    public ConexionCliente(Cliente cliente, Servidor servidor){
        this.cliente = cliente;
        this.servidor = servidor;
    }

    @Override
    public void run(){
        int id = (int)Thread.currentThread().getId();
        cliente.salida.println("Hola bienvenido a mi Chat");
        cliente.id = id;
        servidor.añadirclientes(cliente);
        try{
            while(cliente.estarConectado()){
                String mensaje = cliente.entrada.readLine();
                servidor.enviarmensajes(mensaje);
            }
        }catch(IOException ie){
            ie.printStackTrace();
        }
        
    }
}
