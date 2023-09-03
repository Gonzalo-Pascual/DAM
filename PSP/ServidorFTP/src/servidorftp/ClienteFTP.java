
package servidorftp;

import java.io.BufferedOutputStream;
import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStream;
import org.apache.commons.net.ftp.FTPClient;
import org.apache.commons.net.ftp.FTPFile;

public class ClienteFTP {
    
public static final String IP = "localhost";
public static final int PUERTO = 21;
public static final String USUARIO = "admin";
public static final String CONTRASENA = "admin";

public static void main(String args[]) throws IOException {

    FTPClient clienteFtp = null;

    try {
        System.out.println("Conectando e iniciando sesión . . .");
        clienteFtp = new FTPClient();
        clienteFtp.connect(IP, PUERTO);
        clienteFtp.login(USUARIO, CONTRASENA);

        clienteFtp.enterLocalPassiveMode();
        clienteFtp.setFileType(FTPClient.BINARY_FILE_TYPE);

        System.out.println("Listando el directorio raíz del servidor . . ");
        FTPFile[] ficheros = clienteFtp.listFiles();
        for (int i = 0; i < ficheros.length; i++) {
                System.out.println(ficheros[i].getName());
        }

        String ficheroRemoto = "/modelo.txt";
        File ficheroLocal = new File("modelo.txt");     
        System.out.println("Descargando fichero '" + ficheroRemoto + "' del servidor . . .");
        // Descarga un fichero del servidor FTP
        OutputStream os = new BufferedOutputStream(new FileOutputStream(ficheroLocal));
        if (clienteFtp.retrieveFile(ficheroRemoto, os))
                System.out.println("El fichero se ha recibido correctamente");
        os.close();
    } catch (IOException ioe) {
        ioe.printStackTrace();
    } finally {
        /*
         * Cierra la sesión y desconecta del servidor FTP
         */
        if (clienteFtp != null) {
            System.out.println("Cerrando conexión y desconectando del servidor . . .");
            if (clienteFtp.isConnected()) {
                clienteFtp.logout();
                clienteFtp.disconnect();
            }
        }
    }
}
    
}
