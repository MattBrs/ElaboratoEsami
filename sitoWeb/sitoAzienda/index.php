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
        <title>Vetreria Giavenale</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="styles/pageContent.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse" >
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Vetreria Giavenale</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="prodotti/prodottiAzienda.php">Prodotti</a></li>
                    <li><a href="servizi/serviziAzienda.php">Servizi</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        if($_SESSION['nomeUtente'] == ""){
                            echo "<li><a href='login/registrationForm.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
                            echo "<li><a href='login/loginForm.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                        }else{
                            echo "<li><a href='login/loginForm.php'><span class='glyphicon glyphicon-log-in'></span>" . $_SESSION['nomeUtente'] .  "</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </nav>

        <div class="content">
            <h1>Vetreria Giavenale</h1>
            <p>
                Da oltre 50 anni presso la nostra sede di Giavenale, provincia di Vicenza, ci occupiamo
                di lavorare il vetro in ogni sua forma.
                Il nostro obiettivo e' ricercare in ogni momento le migliori soluzioni possibili per sodisfare le tue richieste.
            </p>

            <h3>Chi siamo?</h3>
            <p>
                Siamo un'azienda che lavora principalmente nel territorio scledense.
                Nel corso degli anni abbiamo espanso i nostri orizzonti verso un apliamento della copertura territoriale
                e ora, tramite una rete di sedi sparse in varie citta', arriviamo fino a Vicenza.
            </p>

            <h3>Cosa facciamo?</h3>
            <p>Produciamo forme in vetro su misura di ogni tipo. Visita la sezione prodotti per scoprire di piu'</p>

        </div>
    </body>
</html>
