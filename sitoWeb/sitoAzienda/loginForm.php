<?php
    session_start();
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="styles/logRegForm.css">

    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Vetreria Giavenale</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Prodotti</a></li>
                    <li><a href="#">Servizi</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="registrationForm.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li class="active" ><a href="loginForm.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </nav>

        <div id="formLogin" class="content" >
            <fieldset>

                <img src="loginImage.png" alt="">
                
                <form action="" method="post">
                    <label for="nomeTxt">Nome utente:</label>
                    <input type="text" name="nomeTxt" id="nomeTxt" placeholder="MarioRossi">
                    <br>
                    <label for="passwordTxt">Password:</label>
                    <input type="password" name="passwordTxt" id="passwordTxt">
                    <br>
                    <input type="submit" value="Login" id="loginBtn" name="loginBtn">
                </form>
            </fieldset>
        </div>

        <script>
            form = $("#formLogin");
            $(document).ready(function(){
                form.animate({top: '35%'}, 600);
            });

        </script>
    </body>
</html>
