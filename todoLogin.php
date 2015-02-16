<!DOCTYPE html>
<html>
<head>
    <?php
    require 'head.php';
    ?>
</head>
<body class="container">
<div class="row form-group">
    <h1 class="col-sm-12 col-md-12 col-lg-12">Todo Login</h1>
<form action="todo.php" method="POST">
    <div class="col-md-12 col-lg-12 col-sm-12">Username: <input type="text" placeholder="Username" name="username" class="form-control"/></div>
    <div class="col-md-12 col-lg-12 col-sm-12">Password: <input type="text" placeholder="Password" name="password" class="form-control"/></div>
    <div class="col-md-12 col-lg-12 col-sm-12"><input type="submit" value="Submit" /></div>
</form>
</div>
</body>

</html>