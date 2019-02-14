package notMultithreaded;
import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.PrintWriter;

public class writeToTXT {
	String filepath = "csvDataa.txt";

	public writeToTXT(String stn) {
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
