<?php
    session_start();
    if (isset($_SESSION["cap_code"]) && isset($_POST["captcha"])) {
        if ($_SESSION["cap_code"] != $_POST["captcha"]) {
            header("Location:login.php?status=captcha");
        } else {
            if (isset($_POST["username"]) && isset($_POST["password"])) {
                require_once "../DBMySql/DataProvider.php";
                $sql = "select iduser,type from user where username = '".$_POST["username"]."' and password = '".$_POST["password"]."'";
                $rs = DataProvider::excuteQuery($sql);
                $idUser = null;
                $type = null;
                while ($row = mysqli_fetch_array($rs)) {
                    $idUser = $row["iduser"];
                    $type = $row["type"];
                }

                if ($idUser != "") {
                    header("Location:../index.php");
                    $_SESSION["user"] = array();
                    $_SESSION["user"]["idUser"] = $idUser;
                    $_SESSION["user"]["username"] = $_POST["username"];
                    $_SESSION["user"]["type"] = $type;
                } else {
                    header("Location:login.php?status=account");
                }                
            }
        }
    }
?>