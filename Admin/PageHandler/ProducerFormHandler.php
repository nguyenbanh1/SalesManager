<?php
    require_once "../../DBMySQl/DataProvider.php";

    if (isset($_POST["nameProducer"])) {
        $sql = "insert Producer(nameProducer) values('.".$_POST["nameProducer"]."')";
        DataProvider::excuteQuery($sql);
        DataProvider::close();        
    }
?>