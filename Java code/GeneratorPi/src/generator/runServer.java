package generator;
public class runServer {

	public static void main(String[] args) {
		server server = new server(7789);
		new Thread(server).start();

	}

}
