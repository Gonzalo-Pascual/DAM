/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package cifrado_raf;

import java.io.File;
import java.io.IOException;
import java.io.RandomAccessFile;

/**
 *
 * @author PROFESOR
 */
public class Raf {
    
    private RandomAccessFile file;
    
    
    public Raf (String cifrado, String ruta ) throws IOException{
        this.file= new RandomAccessFile(new File(ruta),"rw");
        this.file.writeBytes(cifrado);
    }

    
    
    public char getValor(int index) throws IOException{
        char valor;
        file.seek(index);
        valor= this.file.readChar();
        file.seek(0);
        return valor;
    } 
    public int tamano() throws IOException{
       return (int)this.file.length();
    }
}
