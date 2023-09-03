
package servidorsocket;

import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.ArrayList;

public class Servidor {
    private ServerSocket socket; //Establecer la conexión para poder recibir clientes
    private int puerto; //El puerto para entrar
    private ArrayList<Cliente>  clientes; //

    public Servidor(int puerto) {
        this.puerto = puerto;
        clientes = new ArrayList<Cliente>();
    }
    
    public void iniciar() throws IOException{ //Establecer el socket en el puerto establecido
        socket = new ServerSocket(puerto);
    }
    
    public void parar() throws IOException{ //Cierra el socket
        socket.close();
    }
    
    public boolean estaConectado(){
        return !socket.isClosed();
    }
    
    public Socket aceptarConexion () throws IOException{
        return socket.accept();
    }
    
    public void añadirclientes (Cliente cliente){
        clientes.add(cliente);
    }
    
    public void enviarmensajes(String mensaje){
        for(Cliente cliente : clientes){
            cliente.salida.println(mensaje);
        }
    }
    
}
