
package servidorsocket;

import java.io.IOException;
import java.net.Socket;

public class ServidorSocket {

    public static void main(String[] args) {
        Servidor servidor  = new Servidor(5555);  //Etablecer una conexión        
        try{
            servidor.iniciar(); //iniciar el servidor
            while(servidor.estaConectado()){
                Socket socket = servidor.aceptarConexion();
                Cliente cliente = new Cliente(socket);
                servidor.añadirclientes(cliente);
                ConexionCliente conexioncliente = new ConexionCliente(cliente, servidor);
                conexioncliente.start();
            }
        }catch(IOException e){
            e.printStackTrace();
        }
    }
    
}
