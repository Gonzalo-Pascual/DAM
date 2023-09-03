/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package descifrador;

/**
 *
 * @author Alumno Tarde
 */
public class Abecedario {
    
    private char[] ab;
  
    
    public Abecedario(String valor){
        this.ab= valor.toCharArray();
    }
    
    public char getLetra(int index){
        return this.ab[index];
    }   

    public boolean setLetra (char valor, int position){
        this.ab[position]= valor;
        return true;
    }
    
    public int buscarPosition(char letra){
        boolean entra= true;
        int index=0;
        char rbusqueda;
        int contador=0;
        while(entra){
            if(letra == this.ab[contador]){
                index = contador;
                entra = false;
            }else{
            contador++;
            }
        }
        return index;
        
    }

    
    
    
}



        