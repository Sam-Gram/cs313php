<?php
session_start();
if (isset($_SESSION['been'])) {
    header('Location: voteresults.php');
    exit;
}
$_SESSION["been"] = "green";
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="icon" href="img/favicon.png">
    <title><?php echo "Vote Now"; ?></title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
</head>
<body class="container">
<!--I am a stegosaurus-->
<h1 class="jumbotron">Vote Now!!</h1>

<h3>What is the best programming tutorial site?</h3>

<form action="voteresults.php" method="post">
    <div class="form-group">
        <label for="first">First</label>
        <input type="text" class="form-control" name="first" id="first" placeholder="First Name"><br>
        <label for="last">Last</label>
        <input type="text" class="form-control" name="last" id="last" placeholder="Last Name"><br>

        <label for="major">Major</label>
        <select name="major" class="form-control" id="major">
            <option value="Computer Information Technology">Computer Information Technology</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Web Engineering">Web Engineering</option>
            <option value="Other">Other</option>
        </select>

        <br/>
        <label for="year">Grad Year</label>
        <select class="form-control" name="year" id="year">
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="Brother Burton">I am Brother Burton</option>
        </select>
        <br>
        <input type="radio" name="vote" value="lynda.com">lynda.com<br>
        <input type="radio" name="vote" value="Plural Sight">Plural Sight<br>
        <input type="radio" name="vote" value="Code School">Code School<br>
        <input type="radio" name="vote" value="Code Academy">Code Academy<br>
        <input type="radio" name="vote" value="W3 Schools">W3 Schools<br>
        <input type="radio" name="vote" value="The New Boston">The New Boston<br>
        <input type="radio" name="vote" value="Udemy">Udemy<br>
        <input type="submit">
    </div>
</form>
<a href="voteresults.php">Or don't vote and see the results!</a>
</body>
</html>