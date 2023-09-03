/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package cifrado_raf;


import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

/**
 *
 * @author PROFESOR
 */
//String AB="abcdefghijklñmnopqrstuvwxyz";
//Cifrado="rstuvwxyzabcdefghijklñmnopq";
public class Cifrado_raf {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws IOException {
        
        Abecedario info= new Abecedario("abcdefghijklñmnopqrstuvwxyz"); //almaceno el dicionario
        int position=info.buscarPosition('a'); //busco la posión de la letra
        Raf secreto= new Raf("rstuvwxyzabcdefghijklñmnopq", "G:\\cifrado\\resultado.txt"); // Cargo la codificación en un RAF
        char letra = secreto.getValor(position);//busco la codificación por el indice del abecedario
        System.out.println(letra);
        //Lectura texto= new Lectura("hola","abcdefghijklñmnopqrstuvwxyz","rstuvwxyzabcdefghijklñmnopq");
        //texto.cifrar();
        
        
    }
    
}
