<?php
	function loadDatabase() {
        $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

        if ($openShiftVar === null || $openShiftVar == "") {
            // Not in openshift
            $dbHost = 'localhost';
            $dbName = 'test';
            $dbPort = '3306';
            $dbUser = '';
            $dbPassword = '';
            $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
            return $db;

        } else {
            $dbName = 'cs313';
            $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
            $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
            $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
            $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
            $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
            return $db;
        }
	}
?>