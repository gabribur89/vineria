<?php

session_start();

unset($_SESSION["id_utente"]);

unset($_SESSION["nomeutente"]);

header("location:homepage.php");

?>