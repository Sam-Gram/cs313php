<?php
	error_reporting(E_ALL);
	echo "Php!";
	require 'dbConnection.php';
	require 'queries.php';
	$db = loadDatabase();
	echo $db;
	$stmt = $db->query($q_getAll);
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
	foreach ($results as $temp) {
		echo $temp;
		foreach($temp as $temp1) {
			      echo $temp1;
		}
	}
?>