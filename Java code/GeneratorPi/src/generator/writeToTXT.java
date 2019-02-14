package generator;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.PrintWriter;

public class writeToTXT {
	static String filepath = "XMLdata.txt";
	static PrintWriter pw;
	
	public writeToTXT(String stn) {
		try {
			FileWriter fw = new FileWriter(filepath, true);
			BufferedWriter bw = new BufferedWriter(fw);
			pw = new PrintWriter(bw);
			pw.println(stn);
			pw.flush();
			pw.close();
			renameFile();

		} catch (Exception e) {
			System.out.println(stn + " niet verstuurd!");
		}
	}
	
	public static void renameFile()
	{
	     //absolute path rename file
        File file = new File("XMLdata.txt");
        File newFile = new File("XML.txt");
        if(file.renameTo(newFile)){
            //System.out.println("File rename success");;
			new Runner();
        }else{
            System.out.println("File rename failed");
        }
	}
	
}
