package isMultithreaded;
import java.io.IOException;
import java.io.StringReader;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;

import org.w3c.dom.CharacterData;
import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.InputSource;
import org.xml.sax.SAXException;

public class XMLParser implements Runnable {
	protected String value;
	
	public XMLParser(String value){
		this.value = value;
	}
	
	public void run() {
		DocumentBuilder db;
		try {
			db = DocumentBuilderFactory.newInstance().newDocumentBuilder();
			InputSource is = new InputSource();
			is.setCharacterStream(new StringReader(value));

			Document doc = db.parse(is);
			NodeList nodes = (doc.getElementsByTagName("MEASUREMENT"));
			for (int i = 0; i < 10; i++) 
			{
				Element element = (Element) nodes.item(i);
				NodeList stn = element.getElementsByTagName("STN");
				Element stnline = (Element) stn.item(0);
				if (hashMapCountries.getSTN(Integer.parseInt(getCharacterDataFromElement(stnline)))) {
				NodeList temp = element.getElementsByTagName("TEMP");
				Element templine = (Element) temp.item(0);
				NodeList dewp = element.getElementsByTagName("DEWP");
				Element dewpline = (Element) dewp.item(0);
				NodeList time = element.getElementsByTagName("TIME");
				Element timeline = (Element) time.item(0);
				sendData(getCharacterDataFromElement(stnline),getCharacterDataFromElement(templine),getCharacterDataFromElement(dewpline),getCharacterDataFromElement(timeline), hashMapCountries.getCountry(Integer.parseInt(getCharacterDataFromElement(stnline))));
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

		public static String getCharacterDataFromElement(Element e) {
			Node child = e.getFirstChild();
			if (child instanceof CharacterData) {
				CharacterData cd = (CharacterData) child;
				return cd.getData();
			}
			return "";
		}
		
		public static void sendData(String stn, String temp, String dewp, String time, String country) {
			new writeToCSV(stn,temp,dewp,time,country);
		}


}
