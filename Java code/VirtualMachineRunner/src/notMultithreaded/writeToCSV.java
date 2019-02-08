package notMultithreaded;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.PrintWriter;

public class writeToCSV {
	protected static File filepath = new File("data.csv"); //File van de Generator uitlezen

	public writeToCSV(String stn, String temp, String dewp, String time, String country) {
		try {
			FileWriter fw = new FileWriter(filepath, true);
			BufferedWriter bw = new BufferedWriter(fw);
			PrintWriter pw = new PrintWriter(bw);
			pw.println(stn + "," + temp + "," + dewp + "," + time + "," +country);
			pw.flush();
			pw.close();


		} catch (Exception e) {
			System.out.println(stn + " niet verstuurd!");
		}
	}
}
