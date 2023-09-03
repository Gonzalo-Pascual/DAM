
package barrapsp;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.JFrame;
import javax.swing.JOptionPane;

public class barra extends javax.swing.JFrame {

      
    private boolean cargando;

    public barra() {

        initComponents();
        BtIniciar.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                iniciar();
            }
        });

        btDeneter.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                 detener();
            }
        });

    }

    private void iniciar() {
        Thread hiloCarga = new Thread() {
            public void run() {

                // Se activa la carga
                cargando = true;
                // Mientras la barra de progreso no esté completa y no se haya cancelado la carga, ésta se realiza
                while (barraProgreso.getValue() < 100 && cargando) {
                    barraProgreso.setValue(barraProgreso.getValue() + 5);
                    try {
                        // Una pausa que simula la tarea que haya que realizar
                        Thread.sleep(1500);
                    } catch (InterruptedException ie) {
                    }
                }

                // La carga ha terminado, se muestra un mensaje
                if (cargando) {
                    JOptionPane.showMessageDialog(null, "Carga completada", "Carga", JOptionPane.INFORMATION_MESSAGE);
                } // El usuario ha cancelado la carga
                else {
                    barraProgreso.setValue(0);
                    JOptionPane.showMessageDialog(null, "Carga cancelada por el usuario", "Carga", JOptionPane.INFORMATION_MESSAGE);
                }
            }
        };
        hiloCarga.start();
    }

    private void detener() {
        cargando = false;
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jPanel2 = new javax.swing.JPanel();
        btDeneter = new javax.swing.JButton();
        BtIniciar = new javax.swing.JButton();
        barraProgreso = new javax.swing.JProgressBar();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 100, Short.MAX_VALUE)
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 100, Short.MAX_VALUE)
        );

        jPanel2.setBackground(new java.awt.Color(153, 153, 255));

        btDeneter.setBackground(new java.awt.Color(51, 51, 51));
        btDeneter.setForeground(new java.awt.Color(153, 153, 255));
        btDeneter.setText("Cancelar");
        btDeneter.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btDeneterActionPerformed(evt);
            }
        });

        BtIniciar.setBackground(new java.awt.Color(51, 51, 51));
        BtIniciar.setForeground(new java.awt.Color(153, 153, 255));
        BtIniciar.setText("Cargar");
        BtIniciar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BtIniciarActionPerformed(evt);
            }
        });

        barraProgreso.setBackground(new java.awt.Color(51, 51, 51));
        barraProgreso.setForeground(new java.awt.Color(153, 153, 153));
        barraProgreso.setStringPainted(true);

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addGap(55, 55, 55)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(jPanel2Layout.createSequentialGroup()
                        .addComponent(btDeneter)
                        .addGap(42, 42, 42)
                        .addComponent(BtIniciar))
                    .addComponent(barraProgreso, javax.swing.GroupLayout.PREFERRED_SIZE, 190, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(64, Short.MAX_VALUE))
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addGap(57, 57, 57)
                .addComponent(barraProgreso, javax.swing.GroupLayout.PREFERRED_SIZE, 22, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(31, 31, 31)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(btDeneter)
                    .addComponent(BtIniciar))
                .addContainerGap(62, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(85, 85, 85)
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(68, 68, 68)
                        .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(57, 57, 57)
                        .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(49, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btDeneterActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btDeneterActionPerformed
        JOptionPane.showMessageDialog(null, "Carga interrumpida", "Carga", JOptionPane.YES_NO_OPTION);
    }//GEN-LAST:event_btDeneterActionPerformed

    private void BtIniciarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BtIniciarActionPerformed

        iniciar();
        JOptionPane.showMessageDialog(null, "Carga completada", "Carga", JOptionPane.YES_NO_OPTION);
    }//GEN-LAST:event_BtIniciarActionPerformed

    public static void main(String args[]) {
        JFrame frame = new JFrame("JBarraProgreso");
         //frame.setContentPane(new JBarraProgreso().panel1);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.pack();
        frame.setLocationRelativeTo(null);
        frame.setVisible(true);
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new barra().setVisible(true);
            }
        });
    
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton BtIniciar;
    private javax.swing.JProgressBar barraProgreso;
    private javax.swing.JButton btDeneter;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel2;
    // End of variables declaration//GEN-END:variables
}
