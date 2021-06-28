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
        <title>Barattoli</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="../styles/pageContent.css">
        <meta name="description" content="Display dei barattoli di vetro che vendiamo">
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../index.php">Vetreria Giavenale</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">Home</a></li>
                    <li class="active"><a href="prodottiAzienda.php">Prodotti</a></li>
                    <li><a href="../servizi/serviziAzienda.php">Servizi</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if($_SESSION['nomeUtente'] == ""){      //se utente e' loggato stampo l'username in alto a destra
                        echo "<li><a href='../login/registrationForm.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
                        echo "<li><a href='../login/loginForm.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                    }else{
                        echo "<li><a href='../login/loginForm.php'><span class='glyphicon glyphicon-log-in'></span>" . $_SESSION['nomeUtente'] .  "</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <div class="content">
            <?php
                echo "<h1>Barattoli</h1>";
                $conn = new mysqli($servername, $username, $password, $db_name);

                //query per prendere tutti i barattoli dal db che appartengono alla categoria barattoli
                $query = "select nome_prodotto, info_prodotto, nome_sede, costo_prodotto from prodotto_risiede 
                                join prodotti_azienda pa on pa.id_prodotto = prodotto_risiede.prodotto 
                                join categoria_prodotto_azienda cpa on cpa.id_categoria = pa.categoria
                                join sedi_azienda sa on sa.id_sede = prodotto_risiede.sede
                                where nome_categoria='Barattoli' group by nome_prodotto, nome_sede;";
                $statement = $conn->prepare($query);
                $statement->execute();
                $result = $statement->get_result();

                $tmp = ""; //variabile d'appoggio che utilizzo per i prodotti della stessa sede
                while($row = $result->fetch_assoc()){
                    if($row['nome_prodotto'] == $tmp){              //se il prodotto letto e' lo stesso di quello letto in precedenza
                        echo " ," . $row['nome_sede'];              //inserisco solo la sede
                    }else{
                        echo "</p>";
                        echo "<h3>" . $row['nome_prodotto'] . "</h3><p>" . $row['info_prodotto'] . "</p>";
                        echo "<p> Costo: <b>". $row['costo_prodotto'] ."€</b></p>";         //altrimenti aggiungo il nuovo prodotto
                        echo "<p><b>Disponibile presso:</b> " . $row['nome_sede'];

                    }
                    $tmp = $row['nome_prodotto'];
                }
                $conn->close();
            ?>
        </div>
    </body>
</html>
