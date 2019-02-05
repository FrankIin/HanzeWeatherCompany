package Threaded_Pool_Server;

import java.net.Socket;
import java.io.ByteArrayOutputStream;
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


public class WorkerRunnable implements Runnable{

    protected Socket clientSocket = null;
    protected String serverText   = null;

    public WorkerRunnable(Socket clientSocket, String serverText) {
        this.clientSocket = clientSocket;
        this.serverText   = serverText;
    }

    public void run() {
    	ByteArrayOutputStream result = new ByteArrayOutputStream();
    	StringBuilder sb = new StringBuilder();
    	byte[] buffer = new byte[3400];
    	int length;
    	try {
			while ((length = clientSocket.getInputStream().read(buffer)) != -1) {
			    result.write(buffer, 0, length);
			    sb.append(result.toString());
			   if (result.toString().contains("</WEATHERDATA>")) {
			    		XMLParser(sb.toString());
				    	buffer = new byte[3400];
				    	sb = new StringBuilder();		
				    	result = new ByteArrayOutputStream();
			    }
			    
			    
			}
		} catch (IOException e) {
			e.printStackTrace();
		}
    	
 catch (ParserConfigurationException e) {
			e.printStackTrace();
		} catch (SAXException e) {
			e.printStackTrace();
		}
    }

	private static void XMLParser(String value) throws ParserConfigurationException, SAXException, IOException {
	    DocumentBuilder db = DocumentBuilderFactory.newInstance().newDocumentBuilder();
	    InputSource is = new InputSource();
	    is.setCharacterStream(new StringReader(value));

	    Document doc = db.parse(is);
	    NodeList nodes = (doc.getElementsByTagName("MEASUREMENT"));

	    for (int i = 0; i < nodes.getLength(); i++) {
	      Element element = (Element) nodes.item(i);

	      NodeList stn = element.getElementsByTagName("STN");
	      Element stnline = (Element) stn.item(0);
			if (hashMapCountries.getSTN(Integer.parseInt(getCharacterDataFromElement(stnline)))) {
				
		      NodeList temp = element.getElementsByTagName("TEMP");
		      Element templine = (Element) temp.item(0);
		      NodeList dewp = element.getElementsByTagName("DEWP");
		      Element dewpline = (Element) dewp.item(0);
		      sendData(getCharacterDataFromElement(stnline),(getCharacterDataFromElement(templine)),(getCharacterDataFromElement(dewpline)));
	    }
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
	public static void sendData(String stn, String temp, String dewp) {
		if (dewp.isEmpty()) {dewp = "0";}		
			new WriteToCSV(stn,temp,Humidity.calcHumidity(Double.parseDouble(temp), Double.parseDouble(dewp)),hashMapCountries.getCountry(Integer.parseInt(stn)));
		
	}
}
