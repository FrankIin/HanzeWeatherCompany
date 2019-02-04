package Threaded_Pool_Server;

import static java.lang.Math.exp;
import static java.lang.Math.round;


public class Humidity {
	public static String calcHumidity(double Temp, double Dew) {
		double ReHum = 0; //relative humidity in %	
		double Humidity = 0;
		
		//calculates the relative humidity using dewpoint and temperature
		ReHum = 100*(exp((17.625*Dew)/(243.04+Dew))/exp((17.625*Temp)/(243.04+Temp)));
		
		//calculates the absolute humidity using temperature and the relative humidity
		Humidity = round((6.112*exp((17.67*Temp)/(Temp+243.5))*ReHum*2.1674)/(273.15+Temp));
		return Double.toString(Humidity);
	}
}
