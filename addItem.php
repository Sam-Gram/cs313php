<?php
require 'dbConnection.php';
require 'queries.php';
$db = loadDatabase();
$stmt = $db->prepare($q_addItem);
$stmt->bindParam(':username', $_POST['username']);
$stmt->bindParam(':listname', $_POST['listname']);
$stmt->bindParam(':itemname', $_POST['itemname']);
$stmt->bindParam(':itemduedate', $_POST['itemduedate']);
if ($stmt->execute()) {
    echo json_encode(true);
} else {
    echo json_encode(false);
}

?>