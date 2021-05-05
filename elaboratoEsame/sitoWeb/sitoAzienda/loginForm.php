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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <style>
            body{
                background: white;
            }

            #formLogin{
                height: 500px;
                width: 500px;
                position: absolute;
                margin-left: auto;
                margin-right: auto;
                left: 0;
                right: 0;
                text-align: center;
            }

            #formLogin label{
                display: inline-block;
                width: 150px;
                margin-bottom: 15px;
            }

            #formLogin fieldset{
                border: 0;
                border-radius: 10px;
                background: lightgreen;
                padding: 30px;
                position: static;
            }

            #formLogin input[type="text"], #formLogin input[type="password"]{
                border-radius: 5px;
                border: 0;
            }

            #formLogin input[type="submit"]{
                width: 100px;
                margin-left: auto;
                margin-right: auto;
                border: 0;
                border-radius: 5px;
            }

            #formLogin img{
                width: 30%;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 10px;
            }

            #formLogin input[type="text"]:hover, #formLogin input[type="password"]:hover, #formLogin input[type="submit"]:hover{
                background: lightgrey;
                border: 1px solid darkgrey;
            }




        </style>

    </head>
    <body>
        <div class="nav"></div>
        <div id="formLogin" class="content" >
            <fieldset>

                <img src="loginImage.png" alt="">
                
                <form action="" method="post">
                    <label for="nomeTxt">Nome utente:</label>
                    <input type="text" name="nomeTxt" id="nomeTxt">
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
                form.animate({top: '200px'}, 600);
            });

        </script>
    </body>
</html>
