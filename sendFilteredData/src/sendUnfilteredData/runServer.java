package sendUnfilteredData;

import sendUnfilteredData.arrayListSTN;
import sendUnfilteredData.server;

public class runServer {

	public static void main(String[] args) {
		new arrayListSTN();
		server server = new server(7789);
		new Thread(server).start();

	}

}
