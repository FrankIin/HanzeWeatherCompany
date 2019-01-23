package Threaded_Pool_Server;

import java.net.Socket;
import java.io.InputStreamReader;
import java.io.Reader;
import java.io.StringReader;
import java.nio.charset.StandardCharsets;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Scanner;
import java.util.function.Consumer;
import java.util.regex.Pattern;

import javax.xml.bind.JAXBContext;
import javax.xml.bind.JAXBException;
import javax.xml.bind.Unmarshaller;
import javax.xml.bind.annotation.XmlElement;
import javax.xml.bind.annotation.XmlRootElement;


public class WorkerRunnable implements Runnable{
	
	protected String STN;
    protected Socket clientSocket = null;
    protected String serverText   = null;
    private static final Pattern XML_DECL_PATTERN = Pattern.compile("<\\?xml.*?\\?>");
    private static final Pattern DATA_PATTERN = 
        Pattern.compile(".*?</WEATHERDATA>\\s+", Pattern.DOTALL);
	private static Scanner scanner;
	static int cijfer = 0;

    public WorkerRunnable(Socket clientSocket, String serverText) {
        this.clientSocket = clientSocket;
        this.serverText   = serverText;
    }

    public void run() {
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
                System.out.println(weatherData);
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
        public String toString() { return "WeerData: " + measurement; }
    }

    private static class Measurement
    {
        @XmlElement(name = "STN") int stn;
        @XmlElement(name="TEMP") String temp;
        @XmlElement(name="DATE") String date;
        @XmlElement(name="TIME") String time;
        @XmlElement(name="DEWP") String dewp;
        @XmlElement(name="STP") String stp;
        @XmlElement(name="SLP") String slp;
        @XmlElement(name="VISIB") String visib;
        @XmlElement(name="WDSP") String wdsp;
        @XmlElement(name="PRCP") String prcp;
        @XmlElement(name="SNDP") String sdnp;
        @XmlElement(name="FRSHTT") String frshtt;
        @XmlElement(name="CLDC") String cldc;
        @XmlElement(name="WNDDIR") String wnddir;
        
        @Override
        public String toString() {/*sendAll(stn,temp,date,time,dewp,stp,slp,visib,wdsp,prcp,sdnp,frshtt,cldc,wnddir); */return "[stn=" + stn + "]\t [temp=" + temp+ "]\t [date=" +date+ "]\t [time=" +time+ "]\t [cldc=" +cldc+ "]\t [sdnp=" +sdnp+ "]\t";}
       
    }
    
    public static void sendAll(int STN, String TEMP, String DATE, String TIME, String DEWP, String STP, String SLP, String VISIB, String WDSP, String PRCP, String SDNP, String FRSHTT, String CLDC, String WNDDIR) throws SQLException {
    	Connection myConn = null;
        Statement myStmt = null;
    	try {
			
			//1. Get a connection to the database
			myConn = DriverManager.getConnection("jdbc:mariadb://localhost:3306/leertaak2", "root", "");
			
			//2. Create a statement
			myStmt = myConn.createStatement();
			
			//3. Execute SQL query
			String sql = 
			"IF EXISTS (SELECT * FROM leertaak2.measurements WHERE STN="+STN+")" + 
					"UPDATE leertaak2.measurements " + 
					"SET TEMP="+TEMP+", DATE="+DATE+", TIME="+TIME+", DEWP="+DEWP+", STP="+STP+", SLP="+SLP+", VISIB="+VISIB+", WDSP="+WDSP+", PRCP="+PRCP+", SDNP="+SDNP+", FRHSTT="+FRSHTT+", CLDC="+CLDC+", WNDDIR="+WNDDIR+" " + 
					"WHERE STN="+STN+"" + 
					"ELSE" + 
					"INSERT INTO leertaak2.measurements (STN, TEMP, DATE, TIME, DEWP, STP, SLP, VISIB, WDSP, PRCP, SDNP, FRSHTT, CLDC, WNDDIR)" + 
					"VALUES ("+STN+", "+TEMP+", "+DATE+", "+TIME+", "+DEWP+", "+STP+", "+SLP+", "+VISIB+", "+WDSP+", "+PRCP+", "+SDNP+", "+FRSHTT+", "+CLDC+", "+WNDDIR+")";
			
			myStmt.executeUpdate(sql);
			
			System.out.println("Insert complete!");
			
		}catch (Exception exc) {
            exc.printStackTrace();
        } finally {
            if (myStmt != null) {
                myStmt.close();
            }
 
            if (myConn != null) {
                myConn.close();
            }
            
        }
    }
}
