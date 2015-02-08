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
    function printDueDate($date) {
        $php_date = date_create_from_format('Y-m-d', $date);

        if ($php_date) {
            print "<td style=" . (date_diff($php_date , (new DateTime()))->invert ? 'background-color:green;' : 'background-color:red;') . ">" . ($date !== null ? $date : 'None Set') . '</td>';
        }
        else {
            print "<td>" . ($date !== null ? $date : 'None Set') . '</td>';
        }

    }

	error_reporting(E_ALL);
	echo "<h1>Php!</h1>";
	require 'dbConnection.php';
	require 'queries.php';
	$db = loadDatabase();
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
        printDueDate($test['item_due_date']);
        print '</tr>';
    }
    print '</table>';
?>
</body>
</html>