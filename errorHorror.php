<!DOCTYPE html>
<html>
<head>
<?php
require 'head.php';
?>
    <script>
        setTimeout(function () {
            $("#advice").show();
        }, 5000);
    </script>
</head>
<body class="container">
<h1 class="jumbotron">Error, recheck your username and/or password.</h1>
<h2 class="jumbotron" id="advice" style="display: none">or just sign up for a new account</h2>
</body>
</html>