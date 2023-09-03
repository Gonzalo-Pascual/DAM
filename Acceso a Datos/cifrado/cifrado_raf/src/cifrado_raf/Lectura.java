/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package cifrado_raf;

import java.io.IOException;

/**
 *
 * @author PROFESOR
 */
public class Lectura {
   private String texto;
   private String abecedario;
   private String cifrado;
   private Raf file;
   
   public Lectura(String texto, String abecedario, String cifrado ) throws IOException{
       this.texto=texto;
       this.abecedario=abecedario;
       this.cifrado=cifrado;
       this. file= new Raf(this.cifrado, "cifrado.txt");
   }
    
   
   public String cifrar() throws IOException{
       String salida="";
       Abecedario ab= new Abecedario(this.abecedario);
        for (int i = 0; i < this.texto.length(); i++) {
        char letra=this.texto.charAt(i);
        int position=ab.buscarPosition(letra);
        char valor=this.file.getValor(position);
        salida.concat(String.valueOf(valor));
       }
      return salida; 
   }
   public String descifrar(String cifrado) throws IOException{
  String salida="";
  boolean entrada= true;
  int contador=0;
       Abecedario ab= new Abecedario(this.abecedario);
        for (int i = 0; i < cifrado.length(); i++) {
            entrada=true;
            while(entrada){
                if (cifrado.charAt(i)== this.file.getValor(contador)){
                    int position=contador;
                    salida.concat(String.valueOf(this.abecedario.charAt(position)));
                    contador=0;
                    entrada=false;
                }
                else
                    contador++;
                    
            }
             
        }
      return salida; 
        }
   
}
