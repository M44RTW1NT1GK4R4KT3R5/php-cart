<?php
	$dbcon = parse_ini_file("config.ini");
    if ($dbcon['debug']){
	   echo '<pre>';
	   print_r($dbcon);
	   echo '</pre>';
    }

	try {
    	$conn = new PDO(
    		"mysql:host=".$dbcon['host'].
    		";dbname=".$dbcon['database'],
    		 $dbcon['user'],
    		 $dbcon['password']
    	);
    // set the PDO error mode to exception
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($dbcon['debug']){
    	   echo "Connected successfully";
        }
    }
	catch(PDOException $e)
    {
        if ($dbcon['debug']){
    	   echo "Connection failed: " . $e->getMessage();
        }
    }
?>