import static java.lang.Math.exp;

public class Humidity {
	double Humidity = 0;
	double Temp = 0; //temperature, needs to be taken from our data
	double Dew = 0; //DewPoint, needs to be taken from our data
	
	public double reHumidity() {
		double ReHum = 0; //relative humidity in %	
		
		//calculates the relative humidity using dewpoint and temperature
		ReHum = 100*(exp((17.625*Dew)/(243.04+Dew))/exp((17.625*Temp)/(243.04+Temp)));
		return ReHum;
	}
	
	public double calcHumidity() {
		//calculates the absolute humidity using temperature and the relative humidity
		Humidity = (6.112*exp(17.67*Temp)/(Temp+243.5)*reHumidity()*2.1674)/(273.15+Temp);
		return Humidity;
	}
}