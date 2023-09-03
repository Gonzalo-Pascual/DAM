
package ficheroxml;

import org.xml.sax.Attributes;
import org.xml.sax.SAXException;
import org.xml.sax.helpers.DefaultHandler;


public class PruebaSax1 extends DefaultHandler{
    public PruebaSax1(){
        super();
    }
    @Override
    public void startDocument(){
        System.out.println("Comienzo del documento XML");
    }
    @Override
    public void endDocument(){
        System.out.println("Fin del documento XML");
    }
    @Override
    public void startElement(String uri, String nomber, String nombreC, Attributes atts){
        System.out.println("\tFin del documento XML");
    }
    @Override
    public void endElement(String uri, String nombre, String nombreC){
        System.out.println("\tFin Elemento: "+ nombre);
    }
    @Override
    public void characters(char[] ch, int inicio, int longitud) throws SAXException{
        String car = new String(ch, inicio, longitud);
        car= car.replaceAll("[\t\n]", "");
        System.out.println("\tCaracteres: "+car);
    }
}
