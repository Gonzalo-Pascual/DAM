/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package descifrador;

import java.io.*;
import java.util.HashMap;
import java.util.Map;

/**
 *
 * @author Alumno Tarde
 */
public class Descifrador {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args)  {


        Abecedario info = new Abecedario("abcdefghijklmnñopqrstuvwxyz");
        
        char letra = info.getLetra( 1);
        System.out.println(letra);
       
        int let = info.buscarPosition('h');
        System.out.println(letra);
        
        /*
        Apuntes:
        
        */
        
        
        
    }
    
}
