<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "DatabaseAziendale";
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Area personale</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                    <li><a href="serviziAzienda.php">Servizi</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="loginForm.php"><span class="glyphicon glyphicon-log-in"></span> <?php echo $_SESSION['nomeUtente']; ?>  </a></li>
                </ul>
            </div>
        </nav>

        <?php
            $nomeUtente = $_SESSION['nomeUtente'];
            if($nomeUtente != ""){
                $conn = new mysqli($servername, $username, $password, $db_name);        //connessione database
                $query = "select nome_utente, email_utente, abitazione_utente from DatabaseAziendale.utenti_azienda where nome_utente='" . $nomeUtente . "'";      //prendo le informazioni dell'utente dal DB
                $result = $conn->query($query);             //eseguo la query
                if($result->num_rows > 0){                  //se contiene qualcosa proseguo
                    $row = $result->fetch_assoc();          //metto il risultato su row
                    echo "<h1>Informazioni personali</h1>";
                    echo "<ul><li>" . $row['nome_utente'] . "</li><li>" . $row['email_utente'] . "</li><li>" . $row['abitazione_utente'] . "</li></ul>";    //mostro le informazioni
                    echo "<br><a href='logout.php'>Logout</a>";
                }
            }else{
                header("location: loginForm.php");
                exit();
            }
        ?>
    </body>
</html>
