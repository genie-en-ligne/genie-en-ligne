<?php 
    require_once("./config.php");

    if(!isset($_GET['mod'])){
        $_GET['mod'] = 'utilisateur';
    }

    require_once("./gabarit.test.php");
?>