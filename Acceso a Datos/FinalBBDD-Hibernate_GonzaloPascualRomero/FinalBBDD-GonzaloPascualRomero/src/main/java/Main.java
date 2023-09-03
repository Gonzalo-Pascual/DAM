import entity.Hospital;
import entity.Plantilla;
import jakarta.persistence.*;
import org.hibernate.Transaction;

import javax.swing.*;

import java.sql.SQLException;

import static jakarta.persistence.Persistence.createEntityManagerFactory;

public class Main {
    public static void main(String[] args) {
        SwingUtilities.invokeLater(new Runnable() {
            @Override
            public void run() {
                JFrame frame = null;
                try {
                    frame = new Menu();
                } catch (SQLException e) {
                    throw new RuntimeException(e);
                }
                frame.setSize(1300, 700);
                frame.setVisible(true);
            }
        });
    }
}