<?php
	require('dbConnection.php');
	$db = loadDatabase();

	$stmt = $db->query($q_getAll);
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
	foreach ($results as $temp) {
		foreach($temp as $temp1) {
			      echo $temp1;
		}
	}
?>