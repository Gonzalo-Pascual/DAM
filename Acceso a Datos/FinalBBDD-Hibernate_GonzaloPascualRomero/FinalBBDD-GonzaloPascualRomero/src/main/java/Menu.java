import entity.Hospital;
import entity.Plantilla;
import entity.Sala;
import jakarta.persistence.*;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.*;
import java.util.Vector;

import static jakarta.persistence.Persistence.createEntityManagerFactory;

public class Menu extends JFrame {

    private JPanel panel;
    private JTabbedPane tabbedPane1;
    private JTextField Hnombre;
    private JButton Hañadir;
    private JButton Heditar;
    private JButton Heliminar;
    private JButton Hbuscar;
    private JTextField Hdireccion;
    private JTextField Hbusqueda;
    private JTextField Pnombre;
    private JTextField Papellido;
    private JTextField Pespecialidad;
    private JTextField Pid_hospital;
    private JButton Pañadir;
    private JButton Peliminar;
    private JTextField Pbusqueda;
    private JTextField Snombre;
    private JTextField s1;
    private JButton Sañadir;
    private JButton Seliminar;
    private JTextField Sbusqueda;
    private JTextField Sid_hospital;
    private JTable Ptabla;
    private JTable Htabla;
    private JTable Stabla;
    private JLabel s;
    private JTextField Stipo;
    private JButton Seditar;
    private JButton Sbuscar;
    private JButton Peditar;
    private JButton Pbuscar;
    private JButton btn;
    Statement sql;
    Connection conexion;

    EntityManagerFactory entityManagerFactory = createEntityManagerFactory("default");
    EntityManager entityManager = entityManagerFactory.createEntityManager();
    EntityTransaction transaction = entityManager.getTransaction();


    public Menu() throws SQLException {

        super("Ejemplo");
        setContentPane(panel);
        conectar();
        visualizarHospital();
        visualizarPlantilla();
        visualizarSala();

        //=============================================BOTONES HOSPITAL=============================================
        Hañadir.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                agregarHospital();
            }
        });
        Hbuscar.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                buscarHospital();
            }
        });
        Heditar.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {editarHospital();}
        });
        Heliminar.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                eliminarHospital();
            }
        });
        //=============================================BOTONES PLANTILLA=============================================
        Pañadir.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                agregarPlantilla();
            }
        });
        Pbuscar.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {buscarPlantilla();}
        });
        Peditar.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {editarPlantilla();}
        });
        Peliminar.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                eliminarPlantilla();
            }
        });
        //=============================================BOTONES SALA=============================================
        Sañadir.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                agregarSala();
            }
        });
        Sbuscar.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {buscarSala();}
        });
        Seditar.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {editarSala();}
        });
        Seliminar.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                eliminarSala();
            }
        });
    }

    public void conectar() {
        try {
            conexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/acceso", "root", "");
            System.out.println("Conectado");
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }
    }

    //=============================================METODOS DE HOSPITAL=============================================
    public void agregarHospital() {
        try {
            transaction.begin();
            Hospital nuevo = new Hospital();
            nuevo.setNombre(Hnombre.getText());
            nuevo.setDireccion(Hdireccion.getText());
            entityManager.persist(nuevo);
            transaction.commit();
            JOptionPane.showMessageDialog(null, "Operación realizada con éxito");
            Hnombre.setText("");
            Hdireccion.setText("");
            Hbusqueda.setText("");
            visualizarHospital();
        } catch (SQLException e) {
            throw new RuntimeException(e);
        } finally {
            if (transaction.isActive()) {
                transaction.rollback();
            }
        }
    }

    private void buscarHospital() {
        try {
            Hospital hospital = entityManager.createQuery("SELECT h FROM Hospital h WHERE h.idHospital = :nombre", Hospital.class)
                    .setParameter("nombre", Hbusqueda.getText())
                    .getSingleResult();
            Hnombre.setText(hospital.getNombre());
            Hdireccion.setText(hospital.getDireccion());
        } catch (NoResultException ex) {
            JOptionPane.showMessageDialog(null, "No se encontró un hospital con ese Id");
        }
    }

    public void editarHospital() {
        try {
            String id = Hbusqueda.getText();
            String nombre = Hnombre.getText();
            String direccion = Hdireccion.getText();
            transaction.begin();
            Hospital hospitalAEditar = entityManager.find(Hospital.class, id);
            hospitalAEditar.setNombre(nombre);
            hospitalAEditar.setDireccion(direccion);
            entityManager.merge(hospitalAEditar);
            transaction.commit();
            JOptionPane.showMessageDialog(null, "Operación realizada con éxito");
            Hnombre.setText("");
            Hdireccion.setText("");
            Hbusqueda.setText("");
            visualizarHospital();
        } catch (Exception e) {
            transaction.rollback();
            throw new RuntimeException(e);
        }
    }

    public void eliminarHospital() {
        try {
            int busqueda = Integer.parseInt(Hbusqueda.getText());
            transaction.begin();
            Hospital hospitalEliminar = entityManager.find(Hospital.class, busqueda);
            entityManager.remove(hospitalEliminar);
            transaction.commit();
            JOptionPane.showMessageDialog(null, "Operación realizada con éxito");
            Hbusqueda.setText("");
            Hnombre.setText("");
            Hdireccion.setText("");
            visualizarHospital();
        } catch (SQLException e) {
            throw new RuntimeException(e);
        } finally {
            if (transaction.isActive()) {
                JOptionPane.showMessageDialog(null, "La operación no se pudo realizar");
                transaction.rollback();
            }
        }

    }

    public void visualizarHospital() throws SQLException {
        sql = conexion.createStatement();
        ResultSet rs = sql.executeQuery("select * from Hospital");
        ResultSetMetaData metaData = rs.getMetaData();
        Vector<String> columnNames = new Vector<String>();
        int columnCount = metaData.getColumnCount();
        for (int column = 1; column <= columnCount; column++) {
            columnNames.add(metaData.getColumnName(column));
        }
        Vector<Vector<Object>> data = new Vector<Vector<Object>>();
        while (rs.next()) {
            Vector<Object> vector = new Vector<Object>();
            for (int columnIndex = 1; columnIndex <= columnCount; columnIndex++) {
                vector.add(rs.getObject(columnIndex));
            }
            data.add(vector);
        }
        Htabla.setModel(new DefaultTableModel(data, columnNames));
    }


    //=============================================METODOS DE PLANTILLA=============================================

    public void agregarPlantilla() {

        try {
            transaction.begin();
            Plantilla nuevo = new Plantilla();
            nuevo.setNombre(Pnombre.getText());
            nuevo.setApellido(Papellido.getText());
            nuevo.setEspecialidad(Pespecialidad.getText());
            nuevo.setIdHospital(Integer.parseInt(Pid_hospital.getText()));
            entityManager.persist(nuevo);
            transaction.commit();
            JOptionPane.showMessageDialog(null, "Operación realizada con éxito");
            Pnombre.setText("");
            Papellido.setText("");
            Pespecialidad.setText("");
            Pid_hospital.setText("");
            Pbusqueda.setText("");
            visualizarPlantilla();
        } catch (SQLException e) {
            throw new RuntimeException(e);
        } finally {
            if (transaction.isActive()) {
                JOptionPane.showMessageDialog(null, "La operación no se pudo realizar");
                transaction.rollback();
            }
        }

    }

    private void buscarPlantilla() {
        try {
            Plantilla plantilla = entityManager.createQuery("SELECT p FROM Plantilla p WHERE p.idPlantilla = :nombre", Plantilla.class)
                    .setParameter("nombre", Pbusqueda.getText())
                    .getSingleResult();
            Pnombre.setText(plantilla.getNombre());
            Papellido.setText(plantilla.getApellido());
            Pespecialidad.setText(plantilla.getEspecialidad());
            Pid_hospital.setText(String.valueOf(plantilla.getIdHospital()));
        } catch (NoResultException ex) {
            JOptionPane.showMessageDialog(null, "No se encontró un trabajador con ese Id");
        }
    }

    public void editarPlantilla() {
        try {
            String id = Pbusqueda.getText();
            String nombre = Pnombre.getText();
            String apellido = Papellido.getText();
            String especialidad = Pespecialidad.getText();
            String id_hospital = Pid_hospital.getText();
            transaction.begin();
            Plantilla plantillaEditar = entityManager.find(Plantilla.class, id);
            plantillaEditar.setNombre(nombre);
            plantillaEditar.setApellido(apellido);
            plantillaEditar.setEspecialidad(especialidad);
            plantillaEditar.setIdHospital(Integer.parseInt(id_hospital));
            entityManager.merge(plantillaEditar);
            transaction.commit();
            JOptionPane.showMessageDialog(null, "Operación realizada con éxito");
            Pnombre.setText("");
            Papellido.setText("");
            Pespecialidad.setText("");
            Pid_hospital.setText("");
            Pbusqueda.setText("");
            visualizarPlantilla();
        } catch (Exception e) {
            transaction.rollback();
            throw new RuntimeException(e);
        }
    }

    public void visualizarPlantilla() throws SQLException {
        sql = conexion.createStatement();
        ResultSet rs = sql.executeQuery("select * from Plantilla");
        ResultSetMetaData metaData = rs.getMetaData();
        // names of columns
        Vector<String> columnNames = new Vector<String>();
        int columnCount = metaData.getColumnCount();
        for (int column = 1; column <= columnCount; column++) {
            columnNames.add(metaData.getColumnName(column));
        }

        // data of the table
        Vector<Vector<Object>> data = new Vector<Vector<Object>>();
        while (rs.next()) {
            Vector<Object> vector = new Vector<Object>();
            for (int columnIndex = 1; columnIndex <= columnCount; columnIndex++) {
                vector.add(rs.getObject(columnIndex));
            }
            data.add(vector);
        }

        Ptabla.setModel(new DefaultTableModel(data, columnNames));
    }

    public void eliminarPlantilla() {
        try {
            int busqueda = Integer.parseInt(Pbusqueda.getText());
            transaction.begin();
            Plantilla plantillaEliminar = entityManager.find(Plantilla.class, busqueda);
            entityManager.remove(plantillaEliminar);
            transaction.commit();
            JOptionPane.showMessageDialog(null, "Operación realizada con éxito");
            Pnombre.setText("");
            Papellido.setText("");
            Pespecialidad.setText("");
            Pid_hospital.setText("");
            Pbusqueda.setText("");
            visualizarPlantilla();
        } catch (SQLException e) {
            throw new RuntimeException(e);
        } finally {
            if (transaction.isActive()) {
                JOptionPane.showMessageDialog(null, "La operación no se pudo realizar");
                transaction.rollback();
            }
        }

    }


    //=============================================METODOS DE SALA=============================================
    public void agregarSala() {

        try {
            transaction.begin();
            Sala nuevo = new Sala();
            nuevo.setNombre(Snombre.getText());
            nuevo.setTipo(Stipo.getText());
            nuevo.setIdHospital(Integer.parseInt(Sid_hospital.getText()));
            entityManager.persist(nuevo);
            transaction.commit();
            JOptionPane.showMessageDialog(null, "Operación realizada con éxito");
            Snombre.setText("");
            Stipo.setText("");

            Sbusqueda.setText("");
            Sid_hospital.setText("");
            visualizarSala();
        } catch (SQLException e) {
            throw new RuntimeException(e);
        } finally {
            if (transaction.isActive()) {
                JOptionPane.showMessageDialog(null, "La operación no se pudo realizar");
                transaction.rollback();
            }
        }

    }

    private void buscarSala() {
        try {
            Sala sala = entityManager.createQuery("SELECT p FROM Sala p WHERE p.idSala = :nombre", Sala.class)
                    .setParameter("nombre", Sbusqueda.getText())
                    .getSingleResult();
            Snombre.setText(sala.getNombre());
            Stipo.setText(sala.getTipo());
            Sid_hospital.setText(String.valueOf(sala.getIdHospital()));
        } catch (NoResultException ex) {
            JOptionPane.showMessageDialog(null, "No se encontró una sala con ese Id");
        }
    }


    public void editarSala() {
        try {
            String id = Sbusqueda.getText();
            String nombre = Snombre.getText();
            String tipo = Stipo.getText();
            String id_hospital = Sid_hospital.getText();
            transaction.begin();
            Sala salaEditar = entityManager.find(Sala.class, id);
            salaEditar.setNombre(nombre);
            salaEditar.setTipo(tipo);
            salaEditar.setIdHospital(Integer.parseInt(id_hospital));
            entityManager.merge(salaEditar);
            transaction.commit();
            JOptionPane.showMessageDialog(null, "Operación realizada con éxito");
            Snombre.setText("");
            Stipo.setText("");
            Sid_hospital.setText("");
            Sbusqueda.setText("");
            visualizarSala();
        } catch (Exception e) {
            transaction.rollback();
            throw new RuntimeException(e);
        }
    }

    public void visualizarSala() throws SQLException {
        sql = conexion.createStatement();
        ResultSet rs = sql.executeQuery("select * from Sala");
        ResultSetMetaData metaData = rs.getMetaData();
        Vector<String> columnNames = new Vector<String>();
        int columnCount = metaData.getColumnCount();
        for (int column = 1; column <= columnCount; column++) {
            columnNames.add(metaData.getColumnName(column));
        }
        Vector<Vector<Object>> data = new Vector<Vector<Object>>();
        while (rs.next()) {
            Vector<Object> vector = new Vector<Object>();
            for (int columnIndex = 1; columnIndex <= columnCount; columnIndex++) {
                vector.add(rs.getObject(columnIndex));
            }
            data.add(vector);
        }
        Stabla.setModel(new DefaultTableModel(data, columnNames));
    }

    public void eliminarSala() {
        try {
            int busqueda = Integer.parseInt(Sbusqueda.getText());
            transaction.begin();
            Sala salaEliminar = entityManager.find(Sala.class, busqueda);
            entityManager.remove(salaEliminar);
            transaction.commit();
            JOptionPane.showMessageDialog(null, "Operación realizada con éxito");
            Snombre.setText("");
            Stipo.setText("");

            Sbusqueda.setText("");
            Sid_hospital.setText("");
            visualizarSala();
        } catch (SQLException e) {
            throw new RuntimeException(e);
        } finally {
            if (transaction.isActive()) {
                JOptionPane.showMessageDialog(null, "La operación no se pudo realizar");
                transaction.rollback();
            }
        }

    }
}