package sendFilteredData;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.io.StringReader;
import java.net.Socket;

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

public class workerRunnable implements Runnable {

	protected Socket clientSocket = null;

	public workerRunnable(Socket clientSocket) {
		this.clientSocket = clientSocket;
	}

	public void run() 
	{
		ByteArrayOutputStream result = new ByteArrayOutputStream();
		byte[] buffer = new byte[3370];
		int length;
		try {
			while ((length = clientSocket.getInputStream().read(buffer)) != -1) {
				result.write(buffer, 0, (length-1));
				XMLParser(result.toString());
				//System.out.println(result.toString());
				result = new ByteArrayOutputStream();
			}
		} catch (IOException e) {
			e.printStackTrace();
		} catch (ParserConfigurationException e) {
			e.printStackTrace();
		} catch (SAXException e) {
			e.printStackTrace();
		}
	}

	public static void XMLParser(String value) throws ParserConfigurationException, SAXException, IOException {
		DocumentBuilder db = DocumentBuilderFactory.newInstance().newDocumentBuilder();
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
				// new writeToCSV(getCharacterDataFromElement(stnline), getCharacterDataFromElement(templine), getCharacterDataFromElement(dewpline), getCharacterDataFromElement(timeline), hashMapCountries.getCountry(Integer.parseInt(getCharacterDataFromElement(stnline))));
				// DOORSTUREN NAAR VIRTUAL MACHINE
				//System.out.println(getCharacterDataFromElement(stnline) + ", " + getCharacterDataFromElement(templine) + ", " + getCharacterDataFromElement(dewpline) + ", " + getCharacterDataFromElement(timeline) + "," + hashMapCountries.getCountry(Integer.parseInt(getCharacterDataFromElement(stnline))));
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
}