<?php 
    require_once("../../DBMySql/DataProvider.php");
    if (isset($_GET["idOrder"]) && isset($_GET["status"])) {
        $sql = "update orders set status = '".$_GET["status"]."' where idOrder =".$_GET["idOrder"];
        DataProvider::excuteQuery($sql);
        DataProvider::close();
    }
    header("Location:../NewOrders.php");
?>