
package accesoaleatoreo;
import java.io.*;

public class AccesoAleatoreo {

    public static void main(String[] args) throws IOException {
        File fichero = new File ("C:\\Users\\Alumno Tarde\\Documents\\Accesoaleatoreo.txt");
        RandomAccessFile file = new RandomAccessFile(fichero, "rw");
        String nombre[] = {"Pepe", "Juan", "Miguel", "Eva", "Ana"};
        int dep[] = {10, 20, 10, 10, 30};
        double salario []={1000, 1200, 1300, 1000, 1200};
        StringBuffer buffer = null;
        int n= nombre.length;
        for (int i=0; i<n; i++) {
            file.writeInt(i+1);
            buffer=new StringBuffer (nombre[i]);        
            buffer.setLength(10);
            file.writeInt(dep[i]);
            file.writeDouble(salario[i]);
        }
        file.close();
        
        
        
    }
    
}
