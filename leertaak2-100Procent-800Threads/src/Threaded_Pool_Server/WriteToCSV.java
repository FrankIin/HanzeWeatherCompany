package Threaded_Pool_Server;

import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.PrintWriter;

public class WriteToCSV {
	String filepath = "data.csv";
	public WriteToCSV(String stn, String temp, String dewp) {
		// TODO Auto-generated constructor stub
		try 
		{
			FileWriter fw = new FileWriter(filepath,true);
			BufferedWriter bw = new BufferedWriter(fw);
			PrintWriter pw = new PrintWriter(bw);
			pw.println(stn + "," + temp + "," + dewp);
			pw.flush();
			pw.close();
			
			
		} 
		catch (Exception e) 
		{
			System.out.println(stn +" niet verstuurd!");
		}
	}
}
