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
        <title>Assistenza</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="../styles/pageContent.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../index.php">Vetreria Giavenale</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../prodotti/prodottiAzienda.php">Prodotti</a></li>
                    <li class="active"><a href="serviziAzienda.php">Servizi</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../login/loginForm.php"><span class="glyphicon glyphicon-log-in"></span>
                            <?php
                                if($_SESSION['nomeUtente'] != ""){
                                    echo $_SESSION['nomeUtente'];
                                }else{
                                    echo "Login";
                                }
                            ?>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>


        <?php
            if($_SESSION['nomeUtente'] != ""){      //se utente e' loggato stampo le informazioni del servizio
                echo "<div class='content'>
                        <form action='resolveRequest.php' method='post'>
                            <h1>Servizio di assistenza utente</h1>
                            <p>Il nostro personale dedicato all' assistenza utente provvedera' a contattarti tramite email per rispondere a qualsiasi domanda</p>
                            <p>Seleziona la citta' piu' vicina alla tua posizione:</p>
                            <input type='hidden' name='requestType' value='Assistenza'>
                            <select name='posizioneSl' id='posizioneSl' required>
                                <option value='Schio'>Schio</option>
                                <option value='Thiene'>Thiene</option>
                                <option value='Marano'>Marano</option>
                                <option value='Vicenza'>Vicenza</option>
                            </select><br><br>
                            <input type='submit' value='Clicca qui per inviare la richiesta' >
                        </form>
                    </div>";
            }
        ?>
    </body>
</html>
