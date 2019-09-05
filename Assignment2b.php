<?php

error_reporting(0);
//retrieve data from form


$size = $_POST["size"];
$pepperoni = $_POST["pepperoni"];
$cheese = $_POST["cheese"];
$olive = $_POST["olive"];
$pine = $_POST["pine"];
$ham = $_POST["ham"];
$price = 0;


?>


<!DOCTYPE html>
<html>
<head>

	<title>Assignment 2b</title>

</head>

<body>


	<form action="Assignment2b.php" method="POST" enctype = "multipart/form-data">

		<select name = "size">
			<option value = "small" >Small - $9.00</option>
			<option value = "medium">Medium - $12.50</option>
			<option value = "large">Large - $15.00</option>
			<option value = "xlarge">Extra Large - $17.50</option>
		</select>

		<br/>

		<input type="checkbox" name="pepperoni" value="pepperoni" unchecked>Pepperoni<br/>

		<input type="checkbox" name="cheese" value="cheese" unchecked>Cheese<br/>

		<input type="checkbox" name="olive" value="olives" unchecked>Olives<br/>

		<input type="checkbox" name="pine" value="pineapple" unchecked>Pineapple<br/>

		<input type="checkbox" name="ham" value="ham" unchecked>Ham<br/>

		<input type="submit" name="submit" value="Submit" placeholder="submit">

		<br/>

		<?php
		// make sure the size has been picked
			if(isset($size) && !empty($size)) {
				if ($size == small) {
					$price = 9.0;
					}
					else if ($size == medium) {
							$price = 12.50;
					}
					else if ($size == large) {
					$price = 15.0;
					}
					else if ($size == xlarge) {
					$price = 17.50;
					}
			//check whick toppings get added and adjust the price				
				if (isset($pepperoni)){
					$price += 1;
				}
				if (isset($cheese)){
					$price += 0;
				}
				if (isset($olive)){
					$price += 1;
				}
				if (isset($pine)){
					$price += 1;
				}
				if (isset($ham)){
					$price += 1;
				}
			
				

			}
			// if no toppings then declare no toppings else display toppings with the price
			if ($pepperoni == null && $cheese == null && $pine == null && $olive == null && $ham == null ) {
				echo "You ordered a " .$size. " pizza with no toppings you sadist, the total is $";
				echo $price;
			}
				else {
				echo "You ordered a " .$size. " pizza with " .$pepperoni. " " .$cheese. " " .$pine. " " .$olive. " " .$ham. " the total is $"; 
				echo $price;
				}
		?>




	</form>

</body>	
</html>	


