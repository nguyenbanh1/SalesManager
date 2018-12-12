<?php 
    include_once ("../../DBMySql/DataProvider.php");
    
    if (isset($_POST["idProducer"])) { // action like edit
        $sql = "update producer set nameProducer = '".$_POST['nameProducer']."' where idProducer = ".$_POST["idProducer"];
        DataProvider::excuteQuery($sql);
        DataProvider::close();
    } else { // action like add
        $sql = "insert into producer(nameProducer) values('".$_POST['nameProducer']."')";
        DataProvider::excuteQuery($sql);
        DataProvider::close();
    }
    header("Location:../NewProducer.php");
?>