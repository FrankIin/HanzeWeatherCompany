package isMultithreaded;
import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;

public class Runner {

	
	public static void main(String[] args) {
		long startTime = System.currentTimeMillis();
	    String fileName = "data.txt";	
	    // This will reference one line at a time
	    new hashMapCountries();
	    String line = null;
	    StringBuilder sb = new StringBuilder();
	    try {
	        // FileReader reads text files in the default encoding.
	        FileReader fileReader = 
	            new FileReader(fileName);

	        // Always wrap FileReader in BufferedReader.
	        BufferedReader bufferedReader = 
	            new BufferedReader(fileReader);

	        while((line = bufferedReader.readLine()) != null) {
	        	sb.append(line + "\r\n");
	            if(line.contains("</WEATHERDATA>"))
	            {
	                    new Thread(new XMLParser(sb.toString())).start();; 
		            	sb = new StringBuilder();
	            }
	            
	        }   
	        // Always close files.
	        bufferedReader.close();
	        long endTime = System.currentTimeMillis();

	        System.out.println("That took " + (endTime - startTime) + " milliseconds");
	        
	    }
	    catch(FileNotFoundException ex) {
	        System.out.println(
	            "Unable to open file '" + 
	            fileName + "'");                
	    }
	    catch(IOException ex) {
	        System.out.println(
	            "Error reading file '" 
	            + fileName + "'");                  
	        // Or we could just do this: 
	        // ex.printStackTrace();
	      }
	    }
}
