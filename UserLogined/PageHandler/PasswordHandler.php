<?php 
    require_once "../../DBMySql/DataProvider.php";
    $rs = 1;
    if (isset($_POST["idUser"]) && isset($_POST["newPassword"]) && isset($_POST["currentPassword"])) {
        
        $newPassword = $_POST["newPassword"];
        $currentPassword = $_POST["currentPassword"];
        $sql = "update user set password = '".$newPassword."' where idUser = ".$_POST["idUser"]." and password = '".$currentPassword."'";
        $rs = DataProvider::excuteQuery($sql);
        if ($rs == 1) {
            header("Location: ../masterPassword.php?idUser=".$_POST["idUser"]."&status=success");
        } else {
            header("Location: ../masterPassword.php?idUser=".$_POST["idUser"]."&status=fail");
        }
        DataProvider::close();
    }
?>