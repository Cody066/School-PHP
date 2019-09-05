<?php

	$fileName = "assignment4c.xml";

///////////////////////////////file open and read

	if (file_exists("assignment4c.xml")){

		$myfile =fopen("assignment4c.xml", "r") or die ("no access");

		$xmlText = fread($myfile, filesize(assignment4c.xml"));

		fclose($myfile);

		echo $xmlText;

		//echo "File Does Exist";

	}else {
		echo "File Does Not Exist";
	}

?>