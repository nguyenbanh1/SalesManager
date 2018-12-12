<?php

require_once("../../DBMySql/DataProvider.php");
if (isset($_GET["idProduct"])) {
    $sql = "delete from Product where idProduct = ".$_GET["idProduct"]."";
    DataProvider::excuteQuery($sql);
    DataProvider::close();
}
header("Location:../NewProducts.php");
?>