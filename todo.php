<?php
// Handle redirect if the person is a fink
$username = $_POST['username'];
$password = $_POST['password'];

require 'queries.php';
require 'dbConnection.php';
$db       = loadDatabase();
$stmt     = $db->prepare($q_getUser);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();
$result   = $stmt->fetch();
if ($result['user_name'] && $result['user_password']) {
    $user = $result['user_name'];
} else {
    header('Location: errorHorror.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo</title>

    <?php
        require 'head.php';
        echo "<script type=\"application/javascript\">
        var username = \"$username\";
        var password = \"$password\";
    </script>";
    ?>
    <script src="js/todo.js"></script>
    <style type="text/css">
        .glyphicon-remove {
            float: right;
            color: red;
        }
    </style>

</head>
<body class="container">
<h1>Todo!</h1>
<div class="row">
<?php
    function printDueDate($date)
    {
        $php_date = date_create_from_format('Y-m-d', $date);

        if ($php_date) {
            print "<td style=" . (date_diff($php_date, (new DateTime()))->invert ? 'background-color:green;' : 'background-color:red;') . ">" . ($date !== null ? $date : 'None Set') . '</td>';
        } else {
            print "<td>" . ($date !== null ? $date : 'None Set') . '</td>';
        }

    }
	$stmt = $db->prepare($q_getUserStuff);
    $stmt->bindParam(':username', $user);
    $stmt->execute();
    $result = $stmt->fetchAll();

    $lists = [];

    // Build the list up off of the query
    foreach ($result as $test) {
        if (array_key_exists($test['list_name'], $lists)) {
            array_push($lists[$test['list_name']], $test['item_text']);
        } else {
            $lists[$test['list_name']] = [$test['item_text']];
        }
    }

    // Produce Html
    foreach ($lists as $name => $list) {
        print "<div class='col-lg-3 col-md-3 col-sm-3 list-group'><span class='label label-default'>$name</span>";
        foreach ($list as $item) {
          print "<div class='list-group-item'>" . $item . "<span type='button' class='list-item glyphicon glyphicon-remove' list='$name' item='$item'><span/>" . "</div>";
        }
        print "<input class='list-group-item list-item-add' list='$name' type='text' placeholder='Add Item'>";
        print  "</div>";
    }
?>
    <form class="col-sm-12 col-md-12 col-lg-12 form-group">
        <input class="form-control" type="text" placeholder="New List" id="newlistname"/>
        <input id="addListForm" type="button" value="Submit"/>
    </form>
</div>

</body>
</html>