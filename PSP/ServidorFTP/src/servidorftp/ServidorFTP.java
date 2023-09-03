
package servidorftp;

import java.io.File;

import org.apache.ftpserver.ConnectionConfig;
import org.apache.ftpserver.ConnectionConfigFactory;
import org.apache.ftpserver.FtpServer;
import org.apache.ftpserver.FtpServerFactory;
import org.apache.ftpserver.ftplet.FtpException;
import org.apache.ftpserver.listener.ListenerFactory;
import org.apache.ftpserver.usermanager.PropertiesUserManagerFactory;
import org.apache.log4j.BasicConfigurator;

public class ServidorFTP {

public static final int PUERTO = 21;
public static void main(String args[]) {
    BasicConfigurator.configure();
    FtpServerFactory serverFactory = new FtpServerFactory();
    ListenerFactory miListenerFactory = new ListenerFactory();
    miListenerFactory.setPort(PUERTO);
    serverFactory.addListener("default", miListenerFactory.createListener());
    try {
        ConnectionConfigFactory miConnectionConfigFactory = new ConnectionConfigFactory();
        miConnectionConfigFactory.setAnonymousLoginEnabled(true);
        ConnectionConfig connectionConfig = miConnectionConfigFactory.createConnectionConfig();
        serverFactory.setConnectionConfig(connectionConfig);
        // Fija la configuración de las cuentas de usuario
        PropertiesUserManagerFactory userManagerFactory = new PropertiesUserManagerFactory();
        userManagerFactory.setFile(new File("usuarios.properties"));         
        serverFactory.setUserManager(userManagerFactory.createUserManager());
        FtpServer servidorFtp = serverFactory.createServer();
        servidorFtp.start();
    } catch (FtpException fe) {
            fe.printStackTrace();
    }
}
}
