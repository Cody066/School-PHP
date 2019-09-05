<?php

error_reporting(0);
//retrieve data from form
if ( isset($_POST["submit"])) {

$num1 = $_POST["num1"];
$num2 = $_POST["num2"];

}

if (!isset($_POST["submit"]) || ($error != 0)) {

?>


<!DOCTYPE html>
<html>
<head>

	<title>Assignment 1A</title>

</head>

<body>
	<form action="Assignment1c.php" method="POST" enctype = "multipart/form-data">

		<input type="text" name="num1" value="<?php echo $num1; ?>" placeholder="Please Enter a Number">
		<?php 
		if (isset($num1) && ($num1 ==null || empty($num1))) {
			 echo "<font style ='color : red'><B>*required</B></font>";
		}
			if ($num1==null || empty($num1)) {
				echo "<font style ='color : red'><B>*required</B></font>";
			}
		?>


		<br/>
		
				<input type="text" name="num2" value="<?php echo $num2; ?>" placeholder="Please Enter a Number">
		<?php 
		if (isset($num2) && ($num2 ==null || empty($num2))) {
			 echo "<font style ='color : red'><B>*required</B></font>";
		}
			if ($num2==null || empty($num2)) {
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
		$resultAdd = addThem($num1,$num2);
		echo $num1. " plus " .$num2. " is " .$resultAdd. "<br/>";
		
		$resultSub = subtractThem($num1,$num2);
		echo $num1. " minus " .$num2. " is " .$resultSub. "<br/>";
		
		$resultMult= multiplyThem($num1,$num2);
		echo $num1. " multiplied by " .$num2. " is " .$resultMult. "<br/>";
		
		$resultDiv = divideThem($num1,$num2);
		echo $num1. " divided by " .$num2. " is " .$resultDiv. "<br/>";
	
	}

	function addThem($num1a,$num2a) {
		
		$resultAdd = $num1a + $num2a;

		return $resultAdd;

}

	function subtractThem($num1a,$num2a) {
		
		$resultSub = $num1a - $num2a;

		return $resultSub;

}

	function multiplyThem($num1a,$num2a) {
		
		$resultMult = $num1a * $num2a;

		return $resultMult;

}

	function divideThem($num1a,$num2a) {
		
		$resultDiv = $num1a / $num2a;

		return $resultDiv;

}





?>