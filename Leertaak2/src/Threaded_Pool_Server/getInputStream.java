package Threaded_Pool_Server;

import java.io.*;
import java.net.*;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;

import org.w3c.dom.Document;
import org.xml.sax.SAXException;
import java.io.StringReader;

import org.w3c.dom.CharacterData;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.InputSource;

public class getInputStream {

	private static ServerSocket ss;
	protected static String value;

	public static void main(String[] args) throws IOException, ParserConfigurationException, SAXException {
		ss = new ServerSocket(7789);
			Socket s = ss.accept();
			InputStream is1 = s.getInputStream();
			DataInputStream dis = new DataInputStream(is1);
			StringBuilder value = new StringBuilder()
					.append("<?")
					.append(dis.readUTF());
			String value1 = value.toString();

		    DocumentBuilder db = DocumentBuilderFactory.newInstance().newDocumentBuilder();
		    InputSource is = new InputSource();
		    is.setCharacterStream(new StringReader(value1));

		    Document doc = db.parse(is);
		    NodeList nodes = (doc.getElementsByTagName("MEASUREMENT"));

		    for (int i = 0; i < nodes.getLength(); i++) {
		      Element element = (Element) nodes.item(i);

		      NodeList name = element.getElementsByTagName("STN");
		      Element line = (Element) name.item(0);
		      System.out.println("STN: " + getCharacterDataFromElement(line));

		      NodeList title = element.getElementsByTagName("TEMP");
		      line = (Element) title.item(0);
		      System.out.println("TEMP: " + getCharacterDataFromElement(line));
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
