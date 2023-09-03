
package ejercicio2;

import java.io.File;
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
import org.w3c.dom.Attr;
import org.w3c.dom.DOMImplementation;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.Text;


public class Ejercicio2 {


    public static void main(String[] args) throws ParserConfigurationException, TransformerConfigurationException, TransformerException {
        DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
        DocumentBuilder builder = factory.newDocumentBuilder();
        

        DOMImplementation implementacion = builder.getDOMImplementation();
        org.w3c.dom.Document doc = implementacion.createDocument(null, "bib", null);
        
        //Primer libro
            //Raiz
            Element Raiz = (Element) doc.createElement("libro");
            doc.getDocumentElement().appendChild((org.w3c.dom.Node) (Node) Raiz);
             Attr attr = doc.createAttribute("año");
            attr.setValue("1994");
            Raiz.setAttributeNode(attr);

            //Primer elemento
            Element titulo = (Element) doc.createElement("titulo");
            Raiz.appendChild(titulo);
            Text text = doc.createTextNode("TCP/IP Illustrated");
            titulo.appendChild(text);

            //Autor
            Element autor = (Element) doc.createElement("Autor");
            Raiz.appendChild(autor);


            //Segundo elemento
            Element apellido = (Element) doc.createElement("apellido");
            autor.appendChild(apellido);
            Text text2 = doc.createTextNode("Stevens");
            apellido.appendChild(text2);

            //Tercer elemento
            Element nombre = (Element) doc.createElement("Nombre");
            autor.appendChild(nombre);
            Text text3 = doc.createTextNode("W.");
            nombre.appendChild(text3);

            //Cuarto elemento
            Element edit = (Element) doc.createElement("Editorial");
            Raiz.appendChild(edit);
            Text text4 = doc.createTextNode("Addison-Wesley");
            edit.appendChild(text4);

            //Quinto elemento
            Element precio = (Element) doc.createElement("Precio");
            Raiz.appendChild(precio);
            Text text5 = doc.createTextNode("65.95");
            precio.appendChild(text5);
        
        //Segundo libro
            //Raiz
            Element Raiz4 = (Element) doc.createElement("libro");
            doc.getDocumentElement().appendChild((org.w3c.dom.Node) (Node) Raiz4);
             Attr attr4 = doc.createAttribute("año");
            attr4.setValue("1992");
            Raiz4.setAttributeNode(attr4);

            //Primer elemento
            Element titulo4 = (Element) doc.createElement("titulo");
            Raiz4.appendChild(titulo4);
            Text text1111 = doc.createTextNode("Advan Programming for Unix environment");
            titulo4.appendChild(text1111);

            //Autor
            Element autor4 = (Element) doc.createElement("Autor");
            Raiz4.appendChild(autor4);


            //Segundo elemento
            Element apellido4 = (Element) doc.createElement("apellido");
            autor4.appendChild(apellido4);
            Text text2222 = doc.createTextNode("Stevens");
            apellido4.appendChild(text2222);

            //Tercer elemento
            Element nombre4 = (Element) doc.createElement("Nombre");
            autor4.appendChild(nombre4);
            Text text3333 = doc.createTextNode("W.");
            nombre4.appendChild(text3333);

            //Cuarto elemento
            Element edit4 = (Element) doc.createElement("Editorial");
            Raiz4.appendChild(edit4);
            Text text4444 = doc.createTextNode("Addison-Wesley");
            edit4.appendChild(text4444);

            //Quinto elemento
            Element precio4 = (Element) doc.createElement("Precio");
            Raiz4.appendChild(precio4);
            Text text5555 = doc.createTextNode("65.95");
            precio4.appendChild(text5555);
        
        //Tercer libro
        
            //Raiz
            Element Raiz2 = (Element) doc.createElement("libro");
            doc.getDocumentElement().appendChild((org.w3c.dom.Node) (Node) Raiz2);
             Attr attr2 = doc.createAttribute("año");
            attr2.setValue("2000");
            Raiz2.setAttributeNode(attr2);

            //Primer elemento
            Element titulo2 = (Element) doc.createElement("titulo");
            Raiz2.appendChild(titulo2);
            Text text11 = doc.createTextNode("Data on the Web");
            titulo2.appendChild(text11);

            //Autor 1
            Element autor2 = (Element) doc.createElement("Autor");
            Raiz2.appendChild(autor2);


            //Segundo elemento 
            Element apellido2 = (Element) doc.createElement("apellido");
            autor2.appendChild(apellido2);
            Text text22 = doc.createTextNode("Abiteboul");
            apellido2.appendChild(text22);

            //Tercer elemento
            Element nombre2 = (Element) doc.createElement("Nombre");
            autor2.appendChild(nombre2);
            Text text33 = doc.createTextNode("Serge");
            nombre2.appendChild(text33);
            
            //Autor 2
            Element autor22 = (Element) doc.createElement("Autor");
            Raiz2.appendChild(autor22);


            //Segundo elemento 
            Element apellido22 = (Element) doc.createElement("apellido");
            autor22.appendChild(apellido22);
            Text text221 = doc.createTextNode("Buneman");
            apellido22.appendChild(text221);

            //Tercer elemento
            Element nombre22 = (Element) doc.createElement("Nombre");
            autor22.appendChild(nombre22);
            Text text331 = doc.createTextNode("Peter");
            nombre22.appendChild(text331);
            
            //Autor 3
            Element autor222 = (Element) doc.createElement("Autor");
            Raiz2.appendChild(autor222);


            //Segundo elemento 
            Element apellido222 = (Element) doc.createElement("apellido");
            autor222.appendChild(apellido222);
            Text text222 = doc.createTextNode("Suciu");
            apellido222.appendChild(text222);

            //Tercer elemento
            Element nombre222 = (Element) doc.createElement("Nombre");
            autor222.appendChild(nombre222);
            Text text332 = doc.createTextNode("Dan");
            nombre222.appendChild(text332);

            //Cuarto elemento
            Element edit2 = (Element) doc.createElement("Editorial");
            Raiz2.appendChild(edit2);
            Text text44 = doc.createTextNode("Morgan Kaufmann editorials");
            edit2.appendChild(text44);

            //Quinto elemento
            Element precio2 = (Element) doc.createElement("Precio");
            Raiz2.appendChild(precio2);
            Text text55 = doc.createTextNode("39.95");
            precio2.appendChild(text55);
            
        //Cuarto libro
            //Raiz
            Element Raiz3 = (Element) doc.createElement("libro");
            doc.getDocumentElement().appendChild((org.w3c.dom.Node) (Node) Raiz3);
             Attr attr3 = doc.createAttribute("año");
            attr3.setValue("1999");
            Raiz3.setAttributeNode(attr3);

            //Primer elemento
            Element titulo3 = (Element) doc.createElement("titulo");
            Raiz3.appendChild(titulo3);
            Text text333 = doc.createTextNode("Economics of Technology for Digital TV");
            titulo3.appendChild(text333);

            //Autor
            Element autor3 = (Element) doc.createElement("Editor");
            Raiz3.appendChild(autor3);


            //Segundo elemento
            Element apellido3 = (Element) doc.createElement("apellido");
            autor3.appendChild(apellido3);
            Text text233 = doc.createTextNode("Gerbarg");
            apellido3.appendChild(text233);

            //Tercer elemento
            Element nombre3 = (Element) doc.createElement("Nombre");
            autor3.appendChild(nombre3);
            Text text33333 = doc.createTextNode("Darcy");
            nombre3.appendChild(text33333);
            
            //Tercer elemento
            Element afil = (Element) doc.createElement("Afiliacion");
            autor3.appendChild(afil);
            Text text3334 = doc.createTextNode("CITY");
            afil.appendChild(text3334);

            //Cuarto elemento
            Element edit3 = (Element) doc.createElement("Editorial");
            Raiz3.appendChild(edit3);
            Text text444 = doc.createTextNode("Kluwer Academic editorials");
            edit3.appendChild(text444);

            //Quinto elemento
            Element precio3 = (Element) doc.createElement("Precio");
            Raiz3.appendChild(precio3);
            Text text555 = doc.createTextNode("129.95");
            precio3.appendChild(text555);
        
        

        Source source = new DOMSource(doc);
        Result result = new StreamResult(new File("libros.xml"));
        Transformer transformer = TransformerFactory.newInstance().newTransformer();
        transformer.transform(source, result);
    }

}