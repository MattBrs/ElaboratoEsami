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
        <title>Richiesta servizio</title>
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

        <div class="content">
            <?php
                if(isset($_SESSION['nomeUtente'])){
                    //variabili di appoggio e inserimento nel DB
                    $nomeUtente = $_SESSION['nomeUtente'];
                    $servizio = $_POST['requestType'];
                    $id_servizio = -1;
                    $id_utente = -1;
                    $id_sede = -1;

                    $conn = new mysqli($servername, $username, $password, $db_name);    //connessione database
                    $query = "select id_servizio from servizi_azienda where nome_servizio=?"; //query per ottenere id servizio
                    //prendo id servzio
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s", $servizio);
                    $stmt->execute();
                    $ris = $stmt->get_result();
                    if($ris->num_rows > 0){
                        $row = $ris->fetch_assoc();
                        $id_servizio = $row['id_servizio'];
                    }

                    $query2 = "select id_utente from utenti_azienda where nome_utente=?";  //query per ottenere id utente

                    //prendo id utente

                    $stmt = $conn->prepare($query2);
                    $stmt->bind_param("s", $nomeUtente);
                    $stmt->execute();
                    $ris = $stmt->get_result();
                    if($ris->num_rows > 0){
                        $row = $ris->fetch_assoc();
                        $id_utente = $row['id_utente'];
                    }

                    $query = "select id_sede from sedi_azienda where posizione_sede=?";  //query per ottenere id sede
                    $sede = $_POST['posizioneSl'];
                    //prendo id sede
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s", $sede);
                    $stmt->execute();
                    $ris = $stmt->get_result();

                    if($ris->num_rows > 0){
                        $row = $ris->fetch_assoc();
                        $id_sede = $row['id_sede'];
                    }

                    $query = "insert into utente_richiede_servizio (utente, servizio, sede) VALUES (?,?,?)";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("sss", $id_utente, $id_servizio, $id_sede);
                    $stmt->execute();

                    $conn->close();

                } else{
                    echo "<h1>Devi loggarti per visualizzare questa pagina</h1>";
                }
            ?>
        </div>

    </body>
</html>



