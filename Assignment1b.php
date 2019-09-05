<?php

error_reporting(0);
//retrieve data from form
if ( isset($_POST["submit"])) {

$datefind = $_POST["datefind"];


	//error checking 

	$error = 0;

	if ($datefind == null || empty($datefind)) {
		$error = 1;
	}

}

if (!isset($_POST["submit"]) || ($error != 0)) {

?>


<!DOCTYPE html>
<html>
<head>

	<title>Assignment 1B</title>

</head>

<body>

	<form action="Assignment1b.php" method="POST" enctype = "multipart/form-data" >

		<input type="text" name="datefind" value="" placeholder="Please Enter a Date">
		<?php 
		if (isset($datefind) && ($datefind ==null || empty($datefind))) {
			 echo "<font style ='color : red'><B>*required</B></font>";
		}
			if ($datefind==null || empty($datefind)) {
				echo "<font style ='color : red'><B>*required</B></font>";
			}
		?>


		<br/>

		<input type="submit" name="submit" value="Submit" placeholder="submit">

		<br/>

	</form>

</body>	
</html>	


<?php

	} else {
		

		CompareDate($datefind);
	
	}

	function CompareDate($datepassed) {


	$date1 = new DateTime($datepassed);
	
	$date2 = new DateTime('2016-06-30');
	
	$difference = $date1->diff($date2);
	
	echo "The difference between the 2 dates is " .$difference->format('%a days');
	
	//this took me forever to finally get right 
	
	}





?>