package Threaded_Pool_Server;

public class RunServer {

	public static void main(String[] args) {
		new hashMapCountries();
		Server server = new Server(7789);
		new Thread(server).start();
		
	}

	}
