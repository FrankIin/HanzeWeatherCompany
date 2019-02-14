package notMultithreaded;

import java.io.File;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.DocumentBuilder;
import org.w3c.dom.Document;
import org.w3c.dom.NodeList;
import org.w3c.dom.Node;
import org.w3c.dom.Element;

public class XMLParser2 {
	static StringBuilder sb = new StringBuilder();

	public static void main(String[] args) {
		new hashMapCountries();
		try {
			File inputFile = new File("data.csv");
			if (inputFile.exists()) {
				System.out.println("Start timer");
				long startTime = System.currentTimeMillis(); // Tijd wordt bijgehouden van hoelang het programma runt
				DocumentBuilderFactory dbFactory = DocumentBuilderFactory.newInstance();
				DocumentBuilder dBuilder = dbFactory.newDocumentBuilder();
				Document doc = dBuilder.parse(inputFile);
				doc.getDocumentElement().normalize();
				NodeList nList = doc.getElementsByTagName("MEASUREMENT");

				for (int temp = 0; temp < nList.getLength(); temp++) {
					Node nNode = nList.item(temp);
					if (nNode.getNodeType() == Node.ELEMENT_NODE) {
						Element eElement = (Element) nNode;
						if (hashMapCountries.getSTN(
								Integer.parseInt(eElement.getElementsByTagName("STN").item(0).getTextContent()))) {
							sendData(eElement.getElementsByTagName("STN").item(0).getTextContent(),
									eElement.getElementsByTagName("TEMP").item(0).getTextContent(),
									eElement.getElementsByTagName("DEWP").item(0).getTextContent(),
									eElement.getElementsByTagName("TIME").item(0).getTextContent(),
									hashMapCountries.getCountry(Integer
											.parseInt(eElement.getElementsByTagName("STN").item(0).getTextContent())));
						}
					}
				}
				new writeToTXT(sb.toString());
				sb = new StringBuilder();
				long endTime = System.currentTimeMillis(); // stop de tijd voor het bijhouden van hoelang het programma
															// runt
				System.out.println("That took " + (endTime - startTime) + " milliseconds"); // Zet de tijd van hoelang
																							// het
			} // programma runt in de Terminal
		} catch (Exception e) {
			e.printStackTrace();
		}

	}

	public static void sendData(String stn, String temp, String dewp, String time, String country) {
		sb.append(stn + "," + temp + "," + dewp + "," + time + "," + country + "\r\n");
		// System.out.println(stn + temp + dewp + time + country);
	}
}