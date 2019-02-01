package Threaded_Pool_Server;

import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.StringReader;
import java.io.BufferedReader;
import java.io.IOException;
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

/**

 */
public class WorkerRunnable implements Runnable{

    protected Socket clientSocket = null;
    protected String serverText   = null;
	protected static String value;
	protected static StringBuilder sb;

    public WorkerRunnable(Socket clientSocket, String serverText) {
        this.clientSocket = clientSocket;
        this.serverText   = serverText;
    }

    public synchronized void run() {		
	try {
		readUntilChar(clientSocket.getInputStream(), "</WEATHERDATA>");
	} catch (ParserConfigurationException | SAXException | IOException e) {
		// TODO Auto-generated catch block
		e.printStackTrace();
	}

    //XMLParser(sb.toString());
	//String dis = new DataInputStream(is1).readUTF();
	/*
	StringBuilder value = new StringBuilder()
			.append("<?")
			.append(dis);
	String value1 = value.toString();
	ArrayList<String> values = new ArrayList<String>();
	String[] value2 = value1.split("/WEATHERDATA>");
	System.out.println(value2.length);
	for (int i = 0;i<value2.length;i++) {
		StringBuilder test = new StringBuilder().append(value2[i]).append("/WEATHERDATA>");
		System.out.println(test);
		values.add(test.toString());
		if ((values.get(i).contains("</WEATHERDATA>"))) {
			System.out.println(values.get(i));
			//XMLParser(values.get(i));

		}
	}
*/
  }
public static String readUntilChar(InputStream stream, String target) throws ParserConfigurationException, SAXException {
sb = new StringBuilder();
int k = 0 ;

try {
    BufferedReader buffer=new BufferedReader(new InputStreamReader(stream));

    String r;
    while ((r = buffer.readLine()) != null | k == 1) {
        String c = (String) r;
   
        
	    sb.append(c).append(System.getProperty("line.separator"));
	    
       if (c.compareTo(target) == 0) {
        	   XMLParser(sb.toString());
        	   sb = new StringBuilder();
       }
       
       
    }

    //XMLParser(sb.toString());
} catch(IOException e) {
    // Error handling
}
return sb.toString();
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