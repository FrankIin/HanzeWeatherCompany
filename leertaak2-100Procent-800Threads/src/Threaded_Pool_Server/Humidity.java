package Threaded_Pool_Server;
import static java.lang.Math.exp;

public class Humidity {
	double Humidity = 0;
	protected static double dewp = 0;
	protected static double temp = 0;
	public Humidity(String stn, String temp1, String dewp1) {
		if (dewp1.isEmpty()) {dewp1 = "0";}
		double dewp = Double.parseDouble(dewp1);
		double temp = Double.parseDouble(temp1);
		reHumidity(dewp,temp,stn);

	}
	public void reHumidity(double dewp2, double temp, String stn) {
		double ReHum = 0; //relative humidity in %	
		
		//calculates the relative humidity using dewpoint and temperature
		ReHum = 100*(exp((17.625*dewp2)/(243.04+dewp2))/exp((17.625*temp)/(243.04+temp)));
		calcHumidity(temp, ReHum, stn);
	}
	
	public void calcHumidity(double temp, double reHum, String stn) {
		//calculates the absolute humidity using temperature and the relative humidity
		Humidity = (6.112*exp((17.67*temp)/(temp+243.5))*2.1674)/(273.15+temp);
		new WriteToCSV(stn,Double.toString(temp),Double.toString(Humidity));
	}
}