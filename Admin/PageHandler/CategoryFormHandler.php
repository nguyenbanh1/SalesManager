<?php
    require_once "../../DBMySQl/DataProvider.php";

    if (isset($_POST["nameProduct"])) {
        $sql = "insert Category(nameProduct) values('.".$_POST["nameProduct"]."')";
        DataProvider::excuteQuery($sql);
        DataProvider::close();
    }
?>