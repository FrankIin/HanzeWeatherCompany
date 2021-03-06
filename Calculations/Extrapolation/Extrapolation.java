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
	
	//check if the currentValue is within the required bounds, return false if it falls within bounds
	//in this case the bounds are set to be a difference of 20%, both in increase and decrease
	public boolean valueWrong(int prevValue, int currentValue) {
		boolean checkValue = true;
		double maxDiffAllowed = 0.2;
		//difference cannot be calculated correctly when prevValue == 0
		if(prevValue != 0) {
			//calculates the difference between preValue and currentValue
			double difference = (currentValue-prevValue)/Math.abs(prevValue);
			
			if(difference > maxDiffAllowed || difference < -maxDiffAllowed) {
				//check that should be removed
				System.out.println("Value"+ currentValue + "does not fall within bounds of" + prevValue);
			}
			else {
				checkValue = false;
			}
		}
		else {
			System.out.println("Previous value was" + prevValue + "so the difference could not be calculated");
		}
		
		return checkValue;
	}
}