
package servidorsocket;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;

public class Cliente {
    private Socket socket; //Almacenar el socket en el que se almacena 
    BufferedReader entrada; // Bucles de entrada o salida 
    PrintWriter salida;
    int id;
    
    public Cliente(Socket socket) throws IOException{
        this.socket = socket;
        entrada = new BufferedReader(new InputStreamReader(socket.getInputStream()));
        salida = new PrintWriter(socket.getOutputStream(), true);
        this.id = (int)Thread.currentThread().getId();
    }
    
    public boolean estarConectado(){
        return !socket.isClosed();
    }
    public int MenosYo(){
        return id;
    }
    
}
