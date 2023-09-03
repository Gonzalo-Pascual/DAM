
package ejercicio1;

import java.io.*;

public class Ejercicio1 {


    public static void main(String[] args) throws FileNotFoundException, IOException {
        RandomAccessFile  fichero = new RandomAccessFile("texto.txt", "rw");
        
        //Crear fichero
        /*
        for  (int i=1; i<=1000; i++){
          fichero.writeInt(i);  
        } 
        fichero.close();
        */
        
        //Lector fichero
        
        int num =0;
        int suma = 0;
        int impares = 0;
        
        for(int i=1; i<=1000; i++){
            fichero.seek(num);
            
            if (i %2 != 0)  {
                impares=fichero.readInt();
                System.out.println(impares);
                suma=impares+impares;
                num=num+8;
            }   
        }
        
        System.out.println("suma total: "+suma);
            
        fichero.close();
       
    }
    
}
