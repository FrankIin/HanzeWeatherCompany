package generator;
import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.net.Socket;


public class workerRunnable implements Runnable {
	
	protected Socket clientSocket = null;
	static StringBuilder sb = new StringBuilder();
	static int a = 0;
	
	public workerRunnable(Socket clientSocket) {
		this.clientSocket = clientSocket;
	}

	public void run() {

		ByteArrayOutputStream result = new ByteArrayOutputStream();
		byte[] buffer = new byte[3370];
		int length;
			try {
				while ((length = clientSocket.getInputStream().read(buffer)) > 0) {
					result.write(buffer, 0, (length - 1));
					sb.append(result.toString());
					a++;
					if (a == 4000) {
						new writeToTXT(sb.toString());
						sb = new StringBuilder();
						a = 0;
					}

				}
			} catch (IOException e) {
				e.printStackTrace();
			}
	}

}