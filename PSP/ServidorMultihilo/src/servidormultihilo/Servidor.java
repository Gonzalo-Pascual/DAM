package servidormultihilo;
import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.ArrayList;

public class Servidor {

    private ServerSocket socket;
    private int puerto;
    private ArrayList<Cliente> clientes;

    public Servidor(int puerto) {
        this.puerto = puerto;
    }

    public void Iniciar() throws IOException {
        clientes = new ArrayList<>();
        socket = new ServerSocket(puerto);
    }

    public void Terminar() throws IOException {
        socket.close();
    }

    public Socket NuevaConexion() throws IOException {
        return socket.accept();
    }

    public boolean Conectado() {
        if (socket != null)
            return !socket.isClosed();
        return false;
    }

    public void NuevoCliente(Cliente cliente) {
        clientes.add(cliente);
    }

    public void Enviar(String mensaje, Cliente cliente) {
        cliente.salida.println(mensaje);
    }

    public String Recibir(Cliente cliente) throws IOException {
        return cliente.entrada.readLine();
    }

    public void EnviarClientes(String mensaje, String NombreRemitente) {
        for (Cliente cliente : clientes) {
            if (!cliente.getNombre().equals(NombreRemitente))
                Enviar(mensaje, cliente);
        }
    }
    public void NombreClientes() {
        StringBuilder nombres = new StringBuilder();
        nombres.append("Nombre:");
        for (Cliente cliente : clientes) {
            nombres.append(cliente.getNombre());
        }
        for (Cliente cliente : clientes) {
            Enviar(nombres.toString(), cliente);
        }
    }
}