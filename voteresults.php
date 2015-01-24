<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
    <link rel="icon" href="img/favicon.png">

    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
    <style>
        span {
            float: right;
        }
    </style>
</head>
<body class="container">
<h1 class="jumbotron">Results!</h1>
<div class="">
    <?php
    $pVal = $_POST["vote"];
    if (isset($pVal) && trim($pVal) != "") {
        echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-labe="Close"><span aria-hidden="true">&times;</span></button>You voted ' . $pVal . '!</div>';
        $file = 'tutorialPoll.txt';
        file_put_contents($file, $pVal . "\n", FILE_APPEND | LOCK_EX);
    }
    unset($pVal);
    $pVal = $_POST["major"];
    if (isset($pVal) && trim($pVal) != false) {
        $file = 'majorPoll.txt';
        file_put_contents($file, $pVal . "\n", FILE_APPEND | LOCK_EX);
    }
    unset($pVal);
    $pVal = $_POST["year"];
    if (isset($pVal) && trim($pVal) != false) {
        $file = 'gradPoll.txt';
        file_put_contents($file, $pVal . "\n", FILE_APPEND | LOCK_EX);
    }
    ?>
    <br>
    <?php
    echo '<div class="row"><h4 class="col-lg-12 col-md-12">Tutorial Sites</h4>';
    $voteDB = fopen("tutorialPoll.txt", "r") or die("database death");
    $list = [];
    while (!feof($voteDB)) {
        $line = fgets($voteDB);
        $list[$line] = isset($list[$line]) ? ++$list[$line] : 0;
    }
    fclose($voteDB);
    foreach ($list as $key => $value) {
        $value++;
        if (!is_numeric($key) && $value != 0) {
            echo '<div class="col-md-3 well well-sm hvr-grow">' . $key . ' <span class="badge">' . $value . "</span></div>";
        }
    }
//    echo '</div>';
    echo '<div class="col-lg-12 col-md-12"></div><h4 class="col-lg-12 col-md-12">Majors</h4>';
//    echo '<div class="row">';
    $voteDB = fopen("majorPoll.txt", "r") or die("database death");
    $list = [];
    while (!feof($voteDB)) {
        $line = fgets($voteDB);
        $list[$line] = isset($list[$line]) ? ++$list[$line] : 0;
    }
    fclose($voteDB);
    foreach ($list as $key => $value) {
        $value++;
        if (!is_numeric($key) && $value != 0) {
            echo '<div class="col-md-3 well well-sm hvr-float-shadow">' . $key . ' <span class="badge">' . $value . "</span></div>";
        }
    }
    echo '<div class="col-lg-12 col-md-12"></div><h4 class="col-lg-12 col-md-12">Grad Years</h4>';

    $voteDB = fopen("gradPoll.txt", "r") or die("database death");
    $list = [];
    while (!feof($voteDB)) {
        $line = fgets($voteDB);
        $list[$line] = isset($list[$line]) ? ++$list[$line] : 0;
    }
    fclose($voteDB);
    foreach ($list as $key => $value) {
        $value++;
        if (!is_numeric($key) && $value != 0) {
            echo '<div class="col-md-3 well well-sm hvr-float-shadow">' . $key . ' <span class="badge">' . $value . "</span></div>";
        }
    }
    echo '</div>';


    $pVal = $_POST["first"] . " " . $_POST["last"];
    if (isset($pVal) && trim($pVal) != false) {
        echo '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-labe="Close"><span aria-hidden="true">&times;</span></button>'.'Thank you, '. $pVal .'!</div>';
        $file = 'namePoll.txt';
        file_put_contents($file, $pVal . "\n", FILE_APPEND | LOCK_EX);
    }
    ?>
</div>

</body>
</html>