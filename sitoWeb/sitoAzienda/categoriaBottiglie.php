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
        <title>Bottiglie</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="styles/pageContent.css">
    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Vetreria Giavenale</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="prodottiAzienda.php">Prodotti</a></li>
                    <li><a href="serviziAzienda.php">Servizi</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if($_SESSION['nomeUtente'] == ""){
                        echo "<li><a href='registrationForm.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
                        echo "<li><a href='loginForm.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                    }else{
                        echo "<li><a href='loginForm.php'><span class='glyphicon glyphicon-log-in'></span>" . $_SESSION['nomeUtente'] .  "</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <div class="content">
            <?php
            echo "<h1>Bottiglie</h1>";
                $conn = new mysqli($servername, $username, $password, $db_name);

                $query = "select nome_prodotto, info_prodotto, nome_sede from prodotti_azienda
                            join categoria_prodotto_azienda cpa on cpa.id_categoria = prodotti_azienda.categoria
                            join sedi_azienda sa on sa.id_sede = prodotti_azienda.sede
                            where nome_categoria='Bottiglie' group by nome_prodotto;";

                $statement = $conn->prepare($query);
                $statement->execute();
                $result = $statement->get_result();

                while($row = $result->fetch_assoc()){
                    echo "<h3>" . $row['nome_prodotto'] . "</h3><p>" . $row['info_prodotto'] . "</p>";
                    echo "<p><b>Disponibile presso:</b> " . $row['nome_sede'] . "</p>";

                }
                $conn->close();
            ?>
        </div>

    </body>
</html>



