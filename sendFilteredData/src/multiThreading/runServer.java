package multiThreading;

import multiThreading.hashMapCountries;
import multiThreading.server;

public class runServer {

	public static void main(String[] args) {
		new hashMapCountries();
		server server = new server(7789);
		new Thread(server).start();

	}

}
