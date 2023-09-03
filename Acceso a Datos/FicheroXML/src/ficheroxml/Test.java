
package ficheroxml;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.transform.Result;
import javax.xml.transform.Source;
import javax.xml.transform.Transformer;
import javax.xml.transform.TransformerConfigurationException;
import javax.xml.transform.TransformerException;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;
import org.w3c.dom.DOMImplementation;
import org.w3c.dom.Node;
import org.w3c.dom.Text;
import org.w3c.dom.Element;
import org.xml.sax.SAXException;

public class Test {
    public static void main(String[] args) throws FileNotFoundException, IOException, SAXException, ParserConfigurationException, TransformerConfigurationException, TransformerException{
        DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
        DocumentBuilder builder = factory.newDocumentBuilder();
        DOMImplementation implementacion = builder.getDOMImplementation();
        org.w3c.dom.Document document = implementacion.createDocument(null, "listadealumnos", null );
        document.setXmlVersion("1.1");
        Element raiz = (Element) document.createElement("alumno");
        document.getDocumentElement().appendChild((Node) raiz);
        
        Element elem1 = (Element) document.createElement("nombre");
        elem1.setAttribute("cantidad", "2");
        Text text1 = document.createTextNode("Juan");
        Element edad1 = (Element) document.createElement("Edad");
        Text text_edad1 = document.createTextNode("19");
        
        Element elem2 = (Element) document.createElement("nombre");
        elem2.setAttribute("cantidad", ""
                + "  2");
        Text tex2 = document.createTextNode("Maria");
        Element edad2 = (Element) document.createElement("Edad");
        Text text_edad2 = document.createTextNode("20");
        
        elem1.appendChild(text1);
        elem2.appendChild(text1);
        elem1.appendChild(text1);
            
        Source source = new DOMSource(document);
        Result result = new StreamResult(new File("alumnos.xml"));
        Transformer transformer = TransformerFactory.newInstance().newTransformer();
        transformer.transform(source, result);
        
        
        
   }
    
}
