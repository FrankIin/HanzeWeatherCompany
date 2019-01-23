package testingleertaak2;

import java.io.IOException;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;

import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;

public class ParsingXML {

	public static void main(String[] args) {
	DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
	try {
		DocumentBuilder builder = factory.newDocumentBuilder();
		Document doc = builder.parse("output.xml");
		NodeList Weatherdata = doc.getElementsByTagName("MEASUREMENT");
		for(int i=0;i<Weatherdata.getLength();i++) {
			Node W = Weatherdata.item(i);
			if(W.getNodeType()==Node.ELEMENT_NODE) {
				Element measurement = (Element) W;
				NodeList measurementList = measurement.getChildNodes();
				for(int j=0;j<measurementList.getLength();j++) {
					Node m = measurementList.item(j);
					if(m.getNodeType()==Node.ELEMENT_NODE) {
						Element stn = (Element) m;
						System.out.println("Weerstation: " + stn.getNodeName()+ " = " + stn.getTextContent());
					}
				}
			}
		}
	} catch (ParserConfigurationException e) {
		// TODO Auto-generated catch block
		e.printStackTrace();
	} catch (SAXException e) {
		// TODO Auto-generated catch block
		e.printStackTrace();
	} catch (IOException e) {
		// TODO Auto-generated catch block
		e.printStackTrace();
	}
		
	}
	
}
