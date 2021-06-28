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
        <title>Login</title>
    </head>
    <body>
        <?php
            if($_SESSION['nomeUtente'] == ""){  //controllo se l'utente non e' gia loggato
                if(isset($_POST['loginBtn'])){  //controllo se e' stato premuto il bottone
                    $nomeUtente = $_POST['nomeTxt'];
                    $passw = $_POST['passwordTxt'];
                    $conn = new mysqli($servername, $username, $password, $db_name);                //connessione database
                    $query = "select * from utenti_azienda where nome_utente=?";  //query per prendere dati utente

                    $statement = $conn->prepare($query);                                    //faccio prepare della query (sqlinjection)
                    $statement->bind_param("s", $nomeUtente);                   //bind_param con quello che devo inserire

                    $statement->execute();                                                  //eseguo la query
                    $result = $statement->get_result();                                     //metto il risultato su $result

                    if($result->num_rows > 0){                                              //se ha piu' di 0 righe l'ha trovato
                        $row = $result->fetch_assoc();                                      //leggo la riga del risultato e la metto su row

                        if(password_verify($passw, $row['password_utente'])){               //controllo che la password corrisponda
                            $_SESSION['nomeUtente'] = $nomeUtente;
                            echo "<h1>Login effettuato con successo</h1>";
                            header("location: paginaPersonale.php");
                            exit();
                        }else{                                                              //se e' diversa avviso l'utente
                            echo "<h1>password errata</h1>";
                            echo "<p><a href='loginForm.php'>Clicca qui per riprovare</a></p>";
                        }
                    }else{                                                                  //se ci sono 0 righe non ha trovato l'utente
                        echo "<h1>Nome utente errato</h1>";
                        echo "<p><a href='loginForm.php'>Clicca qui per riprovare</a></p>";
                    }
                    $conn->close();
                }
            }else{                                      //altrimenti redireziono all'area personale
                header("location: paginaPersonale.php");
                exit();
            }
        ?>
    </body>
</html>
