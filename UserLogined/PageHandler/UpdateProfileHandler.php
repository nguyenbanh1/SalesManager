<?php

    $nameUser = "";
    $email = "";
    $address = "";
    $dateofbirth = "";
    $telephone = "";
    $idUser = "";

    if (isset($_POST["idUser"])) {
        $idUser = $_POST["idUser"];
    }

    if (isset($_POST["nameUser"])) {
        $nameUser = $_POST["nameUser"];
    }

    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }

    if (isset($_POST["Address"])) {
        $address = $_POST["Address"];
    }

    if (isset($_POST["dateofbirth"])) {
        $dateofbirth = $_POST["dateofbirth"];
    }

    if (isset($_POST["telephone"])) {
        $telephone = $_POST["telephone"];
    }

    $sql = "update user set nameUser = '"
    .$nameUser."', email = '".$email."', addresses = '".$address."', phone = '".$telephone."',dateOfBirth='".$dateofbirth."' where idUser =".$idUser;
    require "../../DBMySql/DataProvider.php";
    DataProvider::excuteQuery($sql);
    DataProvider::close();
    header("Location:../masterPersonal.php?idUser=".$idUser);

?>