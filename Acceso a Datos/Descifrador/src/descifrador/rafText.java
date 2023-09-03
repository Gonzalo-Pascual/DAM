
package descifrador;

import java.io.*;
import java.io.RandomAccessFile;


public class rafText {
    private RandomAccessFile file;
    
    public rafText (String cifrado)throws IOException{
        this.file = new RandomAccessFile(new File("cifrado.txt"), "rw");
        this.file.writeBytes(cifrado);
    }
    
    public char getValor(int index) throws IOException{
        char valor;
        file.seek(index);
        valor= this.file.readChar();
        return valor;
    }
    
    
    
  
}
