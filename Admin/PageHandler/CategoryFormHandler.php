<?php
    require_once "../../DBMySQl/DataProvider.php";

    if (isset($_POST["nameCategory"])) {
        $sql = "insert Category(nameCategory) values('".$_POST["nameCategory"]."')";
        DataProvider::excuteQuery($sql);
        DataProvider::close();
    }
    header("Location:../NewCategory.php");
?>