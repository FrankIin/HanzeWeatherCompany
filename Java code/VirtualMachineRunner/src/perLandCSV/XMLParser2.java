package perLandCSV;

import static java.lang.Math.exp;

import java.io.IOException;
import java.io.StringReader;

import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.parsers.DocumentBuilder;
import org.w3c.dom.Document;
import org.w3c.dom.NodeList;
import org.xml.sax.InputSource;
import org.xml.sax.SAXException;
import org.w3c.dom.Node;
import org.w3c.dom.Element;

public class XMLParser2 {

	public XMLParser2(String stn) throws ParserConfigurationException, SAXException, IOException {
		new hashMapCountries();
				DocumentBuilderFactory dbFactory = DocumentBuilderFactory.newInstance();
				DocumentBuilder dBuilder = dbFactory.newDocumentBuilder();
				Document doc = dBuilder.parse(new InputSource(new StringReader(stn)));
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
									eElement.getElementsByTagName("DATE").item(0).getTextContent(),
									hashMapCountries.getCountry(Integer
											.parseInt(eElement.getElementsByTagName("STN").item(0).getTextContent())));
						}
					}
				}
	}

	public static void sendData(String stn, String temp, String dewp, String time, String date,  String country) {
		if (dewp.isEmpty()) {
			dewp = "0.0";
		}
		String data = (stn + "," + temp + "," + date + "," + time + "," + country + "," + reHumidity(dewp,temp));
		new writeToTXT(data, country); //stuur alle data mee samen 
		// System.out.println(stn + temp + dewp + time + country);
	}
	
	public static double reHumidity(String DEWP, String TEMP) {
		//calculates the relative humidity using dewpoint and temperature
		double ReHum = 100*(exp((17.625*Double.parseDouble(DEWP))/(243.04+Double.parseDouble(DEWP)))/exp((17.625*Double.parseDouble(TEMP))/(243.04+Double.parseDouble(TEMP))));
		return ReHum;
	}
}