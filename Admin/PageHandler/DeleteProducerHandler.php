<?php 

    require_once("../../DBMySql/DataProvider.php");
    if (isset($_GET["idProducer"])) {
        $sql = "delete from Producer where idProducer = ".$_GET["idProducer"]."";
        DataProvider::excuteQuery($sql);
        DataProvider::close();
    }

    header("Location:../NewProducer.php");

?>
