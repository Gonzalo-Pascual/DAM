package printttwrite;

import java.io.*;

public class Printttwrite {

    public static void main(String[] args) throws IOException{

        PrintWriter fichero = new PrintWriter(new FileWriter("C:\\Users\\Alumno Tarde\\Documents\\texto.txt"));
        for (int i = 1; i < 11; i++) {
            fichero.println("Fila número: " + i);
        }
        fichero.close();
    }
}
