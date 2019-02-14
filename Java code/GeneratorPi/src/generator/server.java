package generator;
import java.net.ServerSocket;
import java.net.Socket;
import java.io.IOException;

public class server implements Runnable {

	protected int serverPort = 7789;
	protected ServerSocket serverSocket = null;

	public server(int port) {
		this.serverPort = port;
	}

	public void run() {

		try {
			this.serverSocket = new ServerSocket(this.serverPort);
		} catch (IOException e1) {
			e1.printStackTrace();
		}
		while (true) {
			Socket clientSocket = null;
			try {
				clientSocket = this.serverSocket.accept();
			} catch (IOException e) {
				throw new RuntimeException("Error accepting client connection", e);
			}
			new Thread(new workerRunnable(clientSocket)).start();
		}
	}
	




}