package leertaak2fromscratch;


import java.io.IOException;
import java.net.ServerSocket;


public class XMLparser {

	public static void main(String[] args) {
		//Maak een serversocket aan waarmee verbonden kan worden
		try {
			ServerSocket serversocket = new ServerSocket(7789,200);
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}
}
