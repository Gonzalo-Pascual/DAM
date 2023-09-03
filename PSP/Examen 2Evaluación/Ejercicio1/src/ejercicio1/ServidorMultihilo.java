
package ejercicio1;
import java.io.IOException;
import java.net.Socket;
public class ServidorMultihilo {

    public static void main(String args[]) {

        Servidor servidor = new Servidor(5555);
        try {
            servidor.Iniciar();
            while (servidor.Conectado()) {
                Socket socket = servidor.NuevaConexion();
                Cliente cliente = new Cliente(socket);
                servidor.NuevoCliente(cliente);
                ConexionCliente conexionCliente = new ConexionCliente(servidor, cliente);
                conexionCliente.start();
            }  
        } catch (IOException ioe) {
            ioe.printStackTrace();

        }

    }
}
