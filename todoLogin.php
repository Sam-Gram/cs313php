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

<form action="todo.php" method="POST" class="col-sm-6 col-md-6 col-lg-6">
    <h4>Login</h4>
    <div>Username: <input type="text" placeholder="Username" name="username" class="form-control"/></div>
    <div>Password: <input type="password" placeholder="Password" name="password" class="form-control"/></div>
    <div><input type="submit" value="Submit" /></div>
</form>

<form action="addPerson.php" method="POST" class="col-sm-6 col-md-6 col-lg-6">
    <h4>Add User</h4>
    <div>Username: <input type="text" placeholder="Username" name="username" class="form-control"/></div>
    <div>Password: <input type="password" placeholder="Password" name="password" class="form-control"/></div>
    <div><input type="submit" value="Submit" /></div>
</form>
</div>
</body>

</html>