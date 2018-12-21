<?php
    session_start();
    if (isset($_SESSION["cart"]) && isset($_GET["idProduct"]) && isset($_GET["quantity"])) {
        $_SESSION["cart"][$_GET["idProduct"]] = $_GET["quantity"];
    }
    echo "ok";
?>