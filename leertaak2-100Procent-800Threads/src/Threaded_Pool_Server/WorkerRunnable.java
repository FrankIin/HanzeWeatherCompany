package Threaded_Pool_Server;

import java.net.Socket;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.Reader;
import java.io.StringReader;
import java.nio.charset.StandardCharsets;
import java.sql.Connection;
import java.sql.Statement;
import java.util.Scanner;
import java.util.regex.Pattern;

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

	protected static Connection myConn = null;
    protected static Statement myStmt = null;
    protected Socket clientSocket = null;
    protected String serverText   = null;
    private static final Pattern XML_DECL_PATTERN = Pattern.compile("<\\?xml.*?\\?>");
    private static final Pattern DATA_PATTERN = 
        Pattern.compile(".*?</WEATHERDATA>\\s+", Pattern.DOTALL);
	private static Scanner scanner;

    public WorkerRunnable(Socket clientSocket, String serverText) {
        this.clientSocket = clientSocket;
        this.serverText   = serverText;
    }

    public void run() {
        try (Reader sr = new InputStreamReader(clientSocket.getInputStream(), StandardCharsets.ISO_8859_1))
        {
                disassemble(sr);

        }
        catch (Exception e)
        {
            e.printStackTrace();
        }
    }

    private static void disassemble(Reader reader) {
        scanner = new Scanner(reader);
		final Scanner sc = scanner.useDelimiter("\\Z");
        try {
            while (true) {
                final String xml = sc
                    .skip(XML_DECL_PATTERN)
                    .findWithinHorizon(DATA_PATTERN, 0);
                if (xml == null || xml.isEmpty())
                    break;
                accept(xml);
            }
        }
        catch (Exception e) {
            throw new IllegalStateException("cannot interpret stream", e);
        }
    }



        public static void accept(String xml) {
            try {
            	//System.out.println(xml);
            	XMLParser(xml);
                //final WeatherData weatherData = (WeatherData) unmarshaller.unmarshal(new StringReader(xml));
                //System.out.println(weatherData);
            }
            catch (Exception e) {
                throw new IllegalStateException(e);
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

	      NodeList name = element.getElementsByTagName("STN");
	      Element line = (Element) name.item(0);
	      System.out.println("STN: " + getCharacterDataFromElement(line));
  /*
	      NodeList title = element.getElementsByTagName("TEMP");
	      line = (Element) title.item(0);
	      System.out.println("TEMP: " + getCharacterDataFromElement(line));
	      */
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
