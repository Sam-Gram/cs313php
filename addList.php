<?php
  require 'dbConnection.php';
  require 'queries.php';
  $db = loadDatabase();
  $stmt = $db->prepare($q_addList);

  $stmt->bindParam(':password', $_POST['password']);
  $stmt->bindParam(':username', $_POST['username']);
  $stmt->bindParam(':listname', $_POST['listname']);
  if ($stmt->execute()) {
      echo json_encode(true);
  } else {
      echo json_encode(false);
  }

?>