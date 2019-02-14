package notMultithreaded;
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

public class XMLParser {
	protected String value;
	static StringBuilder sb = new StringBuilder();
	
	public XMLParser(String value){
		this.value = value;
		DocumentBuilder db;
		try {
			db = DocumentBuilderFactory.newInstance().newDocumentBuilder();
			InputSource is = new InputSource();
			is.setCharacterStream(new StringReader(value));

			Document doc = db.parse(is);
			NodeList nodes = (doc.getElementsByTagName("MEASUREMENT"));
			for (int i = 0; i < nodes.getLength(); i++) 
			{
				Element element = (Element) nodes.item(i);
				Element stnline = (Element) element.getElementsByTagName("STN").item(0);
				if (hashMapCountries.getSTN(Integer.parseInt(getCharacterDataFromElement(stnline)))) {
				Element templine = (Element) element.getElementsByTagName("TEMP").item(0);
				Element dewpline = (Element) element.getElementsByTagName("DEWP").item(0);
				Element timeline = (Element) element.getElementsByTagName("TIME").item(0);
				sendData(getCharacterDataFromElement(stnline),getCharacterDataFromElement(templine),getCharacterDataFromElement(dewpline),getCharacterDataFromElement(timeline), hashMapCountries.getCountry(Integer.parseInt(getCharacterDataFromElement(stnline))));
				}
				
			}
			new writeToTXT(sb.toString());
			sb = new StringBuilder();
		} catch (ParserConfigurationException e) {
			e.printStackTrace();
		} catch (SAXException e) {
			e.printStackTrace();
		} catch (IOException e) {
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
			sb.append(stn + "," + temp + "," + dewp + "," + time + "," + country + "\r\n");
		}


}
