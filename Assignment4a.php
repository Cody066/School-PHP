<?php


$dbHost = "127.0.0.1:8889";
$dbUser = "root";
$dbPass = "root";


$title = $_POST["Title"];
$FName = $_POST["FName"];
$LName = $_POST["LName"];
$street = $_POST["Street"];
$city = $_POST["City"];
$province = $_POST["Province"];
$postal = $_POST["Postal"];
$country = $_POST["Country"];
$phone = $_POST["Phone"];
$email = $_POST["Email"];
$sub = $_POST["Sub"];
$subValue = 0;
$errors = 0;


$conn = mysqli_connect($dbHost, $dbUser, $dbPass);

if (!$conn) {
	die("Connection Failed: " . mysqli_connect_error());
}
echo "Connected to DataBase";



$sql = "CREATE DATABASE IF NOT EXISTS assignment3";
mysqli_query($conn, $sql);


mysqli_close( $conn );



$dbName = "assignment3";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);


if (!$conn) {
	die("Connection Failed: " . mysqli_connect_error());
}


$sql = "CREATE TABLE IF NOT EXISTS registered_user (
	
	user_id int(11) NOT NULL AUTO_INCREMENT,
	Title varchar(100) NOT NULL,
	FName varchar(100) NOT NULL,
	LName varchar(100) NOT NULL,
	Street varchar(255) NOT NULL,
	City varchar(100) NOT NULL,
	Province varchar(100) NOT NULL,
	Postal varchar(100) NOT NULL,
	Country varchar(100) NOT NULL,
	Phone varchar(100) NOT NULL,
	Email varchar(100) NOT NULL,
	Sub TINYINT(1) NOT NULL,


	PRIMARY KEY (user_id) ) CHARSET=utf8";

	//echo "<br />$sql<br />"
	//if errors == true: copy this echo result and paste into query window in sequel pro

mysqli_query($conn, $sql) or die (mysqli_error());



?>


<!DOCTYPE html>
<html>
<head>

	<title>Assignment 3</title>

</head>

<body>
	<form action="assignment3a.php" method="POST" enctype = "multipart/form-data">

			<select name = "Title">
				<option value = "" >""</option>
				<option value = "Mr" >Mr</option>
				<option value = "Mrs">Mrs</option>
				<option value = "Ms">Ms</option>
				<option value = "Dr">Dr</option>
			</select>
			<?php
			CheckReq($title)
			?>
			<br/>


			<input type="text" name="FName" value="<?php echo $FName; ?>" placeholder="First Name">
			<?php
			CheckReq($FName)
			?>
			<br/>

			<input type="text" name="LName" value="<?php echo $LName; ?>" placeholder="Last Name">
			<?php
			CheckReq($LName)
			?>
			<br/>

			<input type="text" name="Street" value="<?php echo $street; ?>" placeholder="Street">
			<?php
			CheckReq($street)
			?>
			<br/>

			<input type="text" name="City" value="<?php echo $city; ?>" placeholder="City">
			<?php
			CheckReq($city)
			?>
			<br/>

			<input type="text" name="Province" value="<?php echo $province; ?>" placeholder="Province">
			<?php
			CheckReq($province)
			?>
			<br/>

			<input type="text" name="Postal" value="<?php echo $postal; ?>" placeholder="Postal Code">
			<?php
			CheckReq($postal)
			?>
			<br/>


			<select name = "Country">
				<option value = "" >""</option>
				<option value = "Canada" >Canada</option>
				<option value = "USA">USA</option>
			</select>
			<?php
			CheckReq($country)
			?>
			<br/>

			<input type="text" name="Phone" value="<?php echo $phone; ?>" placeholder="Phone">
			<?php
			CheckReq($phone)
			?>
			<br/>

			<input type="text" name="Email" value="<?php echo $email; ?>" placeholder="Email">
			<?php
			CheckReq($email)
			?>
			<br/>

			<input type="checkbox" name="Sub" value="Subscription" unchecked>Subscription
			<br/>

			<input type="submit" name="Submit" value="Submit" placeholder="submit">

		</form>

	</body>	

</html>	

<?php

	if (isset($sub)) {
		$subValue = 1;
	} else {
		$subValue = 0;
	}
	

	if ( isset($_POST["Submit"]) && ($errors == 0)) {

		AddData($conn, $title, $FName, $LName, $street, $city, $province, $postal, $country, $phone, $email, $subValue);
	
	} 



		$sql = "SELECT * FROM registered_user";
		$results = mysqli_query($conn, $sql);

		echo "<table = {{ marginTop:16 }} border= '1'>
				<tr>
					<th>User ID</th>
					<th>Title</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Street</th>
					<th>City</th>
					<th>Province</th>
					<th>Postal</th>
					<th>Country</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Subscription</th>
				</tr>
				<br/>";

		while ($row = mysqli_fetch_assoc($results) ){
			$Duser_id = $row['user_id'];
			$Dtitle = $row['Title'];
			$DFName = $row['FName'];
			$DLName = $row['LName'];
			$Dstreet = $row['Street'];
			$Dcity = $row['City'];
			$Dprovince = $row['Province'];
			$Dpostal = $row['Postal'];
			$Dcountry = $row['Country'];
			$Dphone = $row['Phone'];
			$Demail = $row['Email'];
			$DsubValue = $row['Sub'];

			echo "
					<tr>
						<td>'$Duser_id'</td>
						<td>'$Dtitle'</td>
						<td>'$DFName'</td>
						<td>'$DLName'</td>
						<td>'$Dstreet'</td>
						<td>'$Dcity'</td>
						<td>'$Dprovince'</td>
						<td>'$Dpostal'</td>
						<td>'$Dcountry'</td>
						<td>'$Dphone'</td>
						<td>'$Demail'</td>
						<td>'$DsubValue'</td>
					</tr>
					<br/>";
		}



		function AddData($conn, $title, $FName, $LName, $street, $city, $province, $postal, $country, $phone, $email, $subValue){

		$sql = "INSERT INTO registered_user (Title, FName, LName, Street, City, Province, Postal, Country, Phone, Email, Sub) VALUES ('$title', '$FName', '$LName', '$street', '$city', '$province', '$postal', '$country', '$phone', '$email', '$subValue')";

		//echo $sql;

		mysqli_query($conn, $sql) or die (mysqli_error());

		echo "<br />Data Inserted";

		}


		function CheckReq($eachVar) {
			if ($eachVar == null || empty($eachVar)) {
				echo "<font style ='color : red'><B>PLEASE ENTER A VALUE</B></font>";
				$errors += 1;

				
			}

		}






  ?>