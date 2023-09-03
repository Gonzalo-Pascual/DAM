package ejercicio1;

import java.io.IOException;

public class ConexionCliente extends Thread {

    private Cliente cliente;
    private Servidor servidor;
    private int Numero = 23;

    public ConexionCliente(Servidor servidor, Cliente cliente) {
        this.servidor = servidor;
        this.cliente = cliente;
    }

    @Override
    public void run() {

        try {
            servidor.Enviar("Introduce tu nombre: ", cliente);
            cliente.setNombre(cliente.entrada.readLine());
            servidor.Enviar("Bienvenido al juego " + cliente.getNombre(), cliente);
            String mensaje = null;
            while (cliente.estaConectado()) {
                mensaje = servidor.Recibir(cliente);
                mensaje = cliente.getNombre() + ">> " + mensaje;
                if (mensaje.equals(cliente.getNombre() + ">> " + Numero)) {
                    servidor.EnviarClientes("El jugador " + cliente.getNombre() + " ha acertado el numero...", cliente.getNombre());
                    servidor.Enviar("Has acertado el numero " + cliente.getNombre() + "!!!", cliente);
                    cliente.desconectado();
                    servidor.desconectado();
                    if (Thread.activeCount() == 3) {
                        servidor.EnviarClientes("Has perdido el juego", cliente.getNombre());
                        cliente.desconectado();
                        servidor.desconectado();
                        break;
                    }
                    break;
                }
            }
            cliente.desconectado();
            servidor.desconectado();
        } catch (IOException ioe) {
            ioe.printStackTrace();
        }
    }
}
