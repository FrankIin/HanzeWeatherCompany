package sendUnfilteredData;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.net.Socket;


public class workerRunnable implements Runnable {

	protected Socket clientSocket = null;

	public workerRunnable(Socket clientSocket) {
		this.clientSocket = clientSocket;
	}

	public void run() 
	{
		ByteArrayOutputStream result = new ByteArrayOutputStream();
		byte[] buffer = new byte[3370];
		int length;
		try {
			while ((length = clientSocket.getInputStream().read(buffer)) != -1) {
				result.write(buffer, 0, (length-1));
				new writeToCSV(result.toString());
				//DOORSTUREN NAAR VIRTUAL MACHINE
				result = new ByteArrayOutputStream();
			}
		} catch (IOException e) {
			e.printStackTrace();
		} 
	}
	
}