package servidormultihilo;

import java.io.IOException;

/**
 * Clase que atiende las conexiones con cada cliente
 */
public class ConexionCliente extends Thread {

    private Cliente cliente;
    private Servidor servidor;

    public ConexionCliente(Servidor servidor, Cliente cliente) {
        this.servidor = servidor;
        this.cliente = cliente;
    }

    @Override
    public void run() {

        try {
            servidor.Enviar("Introduce tu nombre: ", cliente);
            cliente.setNombre(cliente.entrada.readLine());
            servidor.Enviar("Bienvenido al chat " + cliente.getNombre(), cliente);
            String mensaje = null;
            while (cliente.estaConectado()) {
                mensaje = servidor.Recibir(cliente);
                mensaje = cliente.getNombre() + ">> " + mensaje;
                servidor.EnviarClientes(mensaje, cliente.getNombre());
            }
        } catch(IOException ioe) {
            ioe.printStackTrace();
        }
    }
}