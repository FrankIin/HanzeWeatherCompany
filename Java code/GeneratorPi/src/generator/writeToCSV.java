package generator;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.PrintWriter;

public class writeToCSV {
	protected static File filepath = new File("data.csv"); //File van de Generator uitlezen

	public writeToCSV(String stn) {
		try {
			FileWriter fw = new FileWriter(filepath, true);
			BufferedWriter bw = new BufferedWriter(fw);
			PrintWriter pw = new PrintWriter(bw);
			pw.println(stn);
			pw.flush();
			pw.close();


		} catch (Exception e) {
			System.out.println(stn + " niet verstuurd!");
		}
	}
}
