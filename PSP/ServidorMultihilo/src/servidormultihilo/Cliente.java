package servidormultihilo;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;

public class Cliente {
    private String Nombre;
    public Socket socket;
    PrintWriter salida;
    BufferedReader entrada;

    public Cliente(Socket socket) throws IOException {
        this.socket = socket;
        Iniciar();
    }
    
    private void Iniciar() throws IOException {
        entrada = new BufferedReader(
                new InputStreamReader(socket.getInputStream()));
        salida = new PrintWriter(socket.getOutputStream(), true);
    }
   
    
    
    public boolean estaConectado() {
        return socket.isConnected();
    }
    
    
    public String getNombre() {
        return Nombre;
    }

    public void setNombre(String Nombre) {
        this.Nombre = Nombre;
    }
}