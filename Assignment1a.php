<?php

error_reporting(0);
//retrieve data from form
if ( isset($_POST["submit"])) {

$stuff = $_POST["stuff"];


	//error checking 

	$error = 0;

	if ($stuff == null || empty($stuff)) {
		$error = 1;
	}

}

if (!isset($_POST["submit"]) || ($error != 0)) {

?>


<!DOCTYPE html>
<html>
<head>

	<title>Assignment 1A</title>

</head>

<body>
	<form action="Assignment1.php" method="POST" enctype = "multipart/form-data">

		<input type="text" name="stuff" value="<?php echo $stuff; ?>" placeholder="Please Enter a Number">
		<?php 
		if (isset($stuff) && ($stuff ==null || empty($stuff))) {
			 echo "<font style ='color : red'><B>*required</B></font>";
		}
			if ($stuffe==null || empty($stuff)) {
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
		DoStuff($stuff);

	}

	function DoStuff($NumPassed) {

	//$NumPassed = floatval($NumPassed);
	echo "Value is :" .floatval($NumPassed)."</br>";

   // $NumPassed = ceil($NumPassed);
    echo "Ceil is :" .ceil($NumPassed). "</br>";

   // $NumPassed = floor($NumPassed);
    echo "Floor is :" .floor($NumPassed). "</br>";

    
    echo "Round is :" .round($NumPassed). "</br>";

    //  echo $NumPassed;
   
	//return $NumPassed;
}





?>


