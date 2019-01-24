package leertaak2;

import java.io.InputStreamReader;
import java.io.Reader;
import java.io.StringReader;
import java.net.ServerSocket;
import java.net.Socket;
import java.nio.charset.StandardCharsets;
import java.util.Scanner;
import java.util.function.Consumer;
import java.util.regex.Pattern;

import javax.xml.bind.JAXBContext;
import javax.xml.bind.JAXBException;
import javax.xml.bind.Unmarshaller;
import javax.xml.bind.annotation.XmlElement;
import javax.xml.bind.annotation.XmlRootElement;

public class GetXML {
    private static final int port = 7789;
    private static final Pattern XML_DECL_PATTERN = Pattern.compile("<\\?xml.*?\\?>");
    private static final Pattern DATA_PATTERN = 
        Pattern.compile(".*?</WEATHERDATA>\\s+", Pattern.DOTALL);
	private static ServerSocket serverSocket;
	private static Scanner scanner;

    public static void main(String[] args) throws Exception {
        serverSocket = new ServerSocket(port,200);
        System.out.printf("Listening on %d%n", serverSocket.getLocalPort());
        final Socket clientSocket = serverSocket.accept();
        System.out.printf("Processing from %s%n", clientSocket);

        try (Reader sr = new InputStreamReader(clientSocket.getInputStream(), StandardCharsets.ISO_8859_1))
        {
            disassemble(sr, new ConvertToPojoAndPrint());
        }
        catch (Exception e)
        {
            e.printStackTrace();
        }
    }

    private static void disassemble(Reader reader, Consumer<String> xmlConsumer) {
        scanner = new Scanner(reader);
		final Scanner sc = scanner.useDelimiter("\\Z");
        try {
            while (true) {
                final String xml = sc
                    .skip(XML_DECL_PATTERN)
                    .findWithinHorizon(DATA_PATTERN, 0);
                if (xml == null || xml.isEmpty())
                    break;
                xmlConsumer.accept(xml);
            }
        }
        catch (Exception e) {
            throw new IllegalStateException("cannot interpret stream", e);
        }
    }

    private static class ConvertToPojoAndPrint implements Consumer<String>
    {
        final JAXBContext jaxbContext;
        final Unmarshaller unmarshaller;

        ConvertToPojoAndPrint() throws JAXBException {
            jaxbContext = JAXBContext.newInstance(WeatherData.class);
            unmarshaller = jaxbContext.createUnmarshaller();
        }

        @Override
        public void accept(String xml) {
            try {
                final WeatherData weatherData = (WeatherData) unmarshaller.unmarshal(new StringReader(xml));
                System.out.println("Another sample: " + weatherData);
            }
            catch (Exception e) {
                throw new IllegalStateException(e);
            }
        }
    }

    @XmlRootElement(name = "WEATHERDATA")
    private static class WeatherData
    {
        @XmlElement(name = "MEASUREMENT")
        Measurement measurement;
        @Override
        public String toString() { return "WeatherData{" + "measurement=" + measurement + '}'; }
    }

    private static class Measurement
    {
        @XmlElement(name = "STN")
        String stn;
        @XmlElement(name="TEMP")
        String temp;
        // ... skipping the rest of elements for brevity
        @Override
        public String toString() { return "Measurement{" + "stn='" + stn + '\'' + "'}{'" + "temp='" + temp+ '\''; }
    }
}