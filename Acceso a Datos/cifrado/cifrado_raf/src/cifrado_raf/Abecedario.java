/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package cifrado_raf;

/**
 *
 * @author PROFESOR
 */
public class Abecedario {
    
    private char[] ab;
    
    
   public Abecedario(String valor){
     this.ab=valor.toCharArray();
   } 

    public char getLetra(int position) {
        return this.ab[position];
    }

    public boolean setLetra(char valor, int position) {
        this.ab[position]=valor; 
        return true;
    }
    public int buscarPosition(char letra){
        boolean entra= true;
        int index=0;
        char rbusqueda;
        int contador= 0;
        while(entra){
            if(letra == this.ab[contador]){
                index = contador;
                entra=false;
            }
            else    
           contador++;  
            
            
        } 
        return index;
    }

   
   
}
