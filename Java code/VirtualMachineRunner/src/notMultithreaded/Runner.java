package notMultithreaded;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;

public class Runner {

	public static void main(String[] args) {
		File f = new File("/home/rasppi/ftp/weatherdata/sendData.txt"); //File van de Generator uitlezen
		File uitlezen = new File("uitlezen.txt"); // File van de Generator veranderen van naam voor het geval van overriden van volgende file van generator
		new hashMapCountries(); //zorg dat alle weerstations zijn ingeladen voor het vergelijken
		String line = null; // variable waar de uitgelezen data naar toe wordt geschreven
		StringBuilder sb = new StringBuilder(); //Stringbuilder voor het maken van een compleet XML bestand
		while (true) {
			if (f.exists()) { // wanneer sendData.txt aanwezig is ga door met de code :
				System.out.println("test");
				f.renameTo(uitlezen); // Verander naam van de file
				long startTime = System.currentTimeMillis(); //Tijd wordt bijgehouden van hoelang het programma runt
				try {
					// FileReader reads text files in the default encoding.
					FileReader fileReader = new FileReader(uitlezen); //Bestand uitlezen

					// Always wrap FileReader in BufferedReader.
					BufferedReader bufferedReader = new BufferedReader(fileReader);
					while ((line = bufferedReader.readLine()) != null) { //Wanneer de volgende line van sendData.txt niet leeg is ga door met code :
						sb.append(line + "\r\n"); //Voeg de uitgelezen lijn van sendDatat toe aan de StringBuilder
						if (line.contains("</WEATHERDATA>")) { //wanneer de uitgelezen regel code "</WEATHERDATA>" bevat ga door met code :
							new XMLParser(sb.toString()); //Zorg dat de StringBuilder wordt uitgelezen door XMLParser
							sb = new StringBuilder(); //StringBuilder wordt weer gereset en dus kan het opnieuw gebruikt worden voor volgende XML gedeelte van sendData.txt
						}

					}
					// Always close files.
					bufferedReader.close(); //Wanneer sendData.txt volledig is verwerkt, sluit de connectie met bufferedReader
					long endTime = System.currentTimeMillis(); //stop de tijd voor het bijhouden van hoelang het programma runt
					System.out.println("That took " + (endTime - startTime) + " milliseconds"); //Zet de tijd van hoelang het programma runt in de Terminal
				} catch (FileNotFoundException ex) { //De rest is voor eventuele fouten met de code
					System.out.println("Unable to open file '" + f + "'"); 
				} catch (IOException ex) {
					System.out.println("Error reading file '" + f + "'");
					// Or we could just do this:
					// ex.printStackTrace();
				}
			}
		}
	}
}
