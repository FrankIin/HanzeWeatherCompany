package generator;
import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.PrintWriter;

public class writeToTXT {
	static String filepath = "data.txt";
	static PrintWriter pw;
	StringBuilder sb = new StringBuilder();

	public writeToTXT(String stn) {
		try {
			FileWriter fw = new FileWriter(filepath, true);
			BufferedWriter bw = new BufferedWriter(fw);
			pw = new PrintWriter(bw);
			pw.println(stn);
			pw.flush();
			pw.close();



		} catch (Exception e) {
			System.out.println(stn + " niet verstuurd!");
		}
	}

}
