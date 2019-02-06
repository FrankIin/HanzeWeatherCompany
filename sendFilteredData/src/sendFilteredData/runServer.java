package sendFilteredData;

import sendFilteredData.hashMapCountries;
import sendFilteredData.server;

public class runServer {

	public static void main(String[] args) {
		new hashMapCountries();
		server server = new server(7789);
		new Thread(server).start();

	}

}
