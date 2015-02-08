<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo</title>
    <?php
        require 'head.php';
    ?>
</head>
<body class="container">
<?php
	error_reporting(E_ALL);
	echo "<h1>Php!</h1>";
	require 'dbConnection.php';
	require 'queries.php';
	$db = loadDatabase();
//    echo $q_getAll;
	$stmt = $db->query($q_getAll);

    print '<table class="table table-hover">';
    print '<tr>';
    print '<th>User</th>';
    print '<th>List</th>';
    print '<th>Item</th>';
    print '<th>Due Date</th>';
    print '</tr>';
    foreach ($stmt as $test) {
        print '<tr>';
        print '<td>' . $test['user_name'] . '</td>';
        print '<td>' . $test['list_name'] . '</td>';
        print '<td>' . $test['item_text'] . '</td>';
        print '<td>' . ($test['item_due_date'] ? $test['item_due_date'] : 'None Set') . '</td>';
        print '</tr>';
    }
    print '</table>';
?>
</body>
</html>