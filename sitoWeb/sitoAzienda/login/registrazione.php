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
        <title>Registrazione</title>
    </head>
    <body>
        <?php
            $nomeUtente = $_REQUEST['nomeTxt'];
            $emailUtente = $_REQUEST['emailTxt'];
            $userPassw = $_REQUEST['passwordTxt'];
            $posizioneUtente = $_REQUEST['posizioneSl'];

            if(isset($_REQUEST['regBtn'])){
                $conn = new mysqli($servername, $username, $password, $db_name);

                if ( !preg_match('/^[a-zA-Z0-9]{3,30}+$/', $nomeUtente) ){
                    echo "<script>alert('Nome utente non valido'); window.location = 'registrationForm.php';  </script>";
                }

                if(!filter_var($emailUtente, FILTER_VALIDATE_EMAIL)){
                    echo "<script>alert('email non valida'); window.location = 'registrationForm.php';  </script>";
                }



                $hashedPasswd = password_hash($userPassw, PASSWORD_DEFAULT);

                $query = "insert into utenti_azienda (nome_utente, email_utente, password_utente, abitazione_utente) VALUES (?,?,?,?)";

                $statement = $conn->prepare($query);
                $statement->bind_param("ssss",$nomeUtente,$emailUtente, $hashedPasswd, $posizioneUtente);

                $result = $statement->execute();

                if($statement->error == ""){
                    echo "<h1>Registrazione avvenuta con successo</h1>";

                    $_SESSION['nomeUtente'] = $nomeUtente;
                    echo "<a href='paginaPersonale.php'>Clicca qui per andare nell'area personale</a>";
                }else{
                    echo "<h1>Nome utente o email utilizzati da un altro utente</h1>";
                    echo "<a href='registrationForm.php'>Clicca qui per riprovare</a>";
                }
                $conn->close();
            }
        ?>
    </body>
</html>
