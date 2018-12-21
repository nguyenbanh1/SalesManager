<?php
    session_start();
    if (!isset($_SESSION["user"])) {
        header("Location:../../login/login.php");
    } else {
        header("Location:../../Carts.php");
    }
?>