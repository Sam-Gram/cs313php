<?php
require 'dbConnection.php';
require 'queries.php';
$db = loadDatabase();
//$q_deleteItem = $q_deleteItem . ' AND ' . ( is_null($_POST['itemduedate']) ? 'i.item_due_date IS NULL' : 'i.item_due_date = :itemduedate');
$stmt = $db->prepare($q_deleteItem);
//. (is_null($_POST['itemduedate']) ? 'i.item_due_date IS NULL' : 'i.item_due_date = :itemduedate')
$stmt->bindParam(':username', $_POST['username']);
$stmt->bindParam(':listname', $_POST['listname']);
$stmt->bindParam(':itemname', $_POST['itemname']);
if ($stmt->execute()) {
    echo json_encode(true);
} else {
    echo json_encode(false);
}
?>