package Threaded_Pool_Server;
import java.sql.Connection;
import java.sql.DriverManager;

import javax.swing.JOptionPane;

public class DBConnect {
	public static Connection DbConnect() {
		Connection Conn=null;
		try {
			Class.forName("org.mariadb.jdbc.Driver");
			Conn = DriverManager.getConnection("jdbc:mariadb://localhost:3306/leertaak2?user=root&password=");
			JOptionPane.showMessageDialog(null, "Success");
			return Conn;
		}
		catch (Exception e) {
			JOptionPane.showMessageDialog(null, "Error"+e);
			return null;
		}
	}

}
