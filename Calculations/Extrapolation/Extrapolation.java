public class Extrapolation{
	public int prevValues[]; //needs to be array of 30 previous values			
	public int totDif = 0;
	public int extraValue = 0;
		
	//creates a linear equation based on previous data and it's used to predict a future value
	public int returnExtra(int prevValues[]){
		if(prevValues.length > 0) {
			//calculates the total difference between all the measured points compared to their previous point 
			for (int i = 0; i < prevValues.length; i++){
				if(i > 0){ 
					totDif += prevValues[i] - prevValues[i-1];
				}
			}
	
			int directionalCoefficient = totDif/prevValues.length;
			extraValue = directionalCoefficient * (prevValues.length + 1) + prevValues[0];
		}
		return extraValue;
	}
}