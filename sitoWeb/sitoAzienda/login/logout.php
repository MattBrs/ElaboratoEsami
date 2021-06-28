<?php
    session_start();    //carico la sessione
    session_destroy();  //la elimino
    header("location: ../index.php");   //redireziono utente alla pagina principale
exit();