package sendUnfilteredData;

import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.PrintWriter;

public class writeToCSV {
	String filepath = "data.csv";

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
