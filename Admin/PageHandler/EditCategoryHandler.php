<?php 
    include_once ("../../DBMySql/DataProvider.php");
    
    if (isset($_POST["idCategory"])) { // action like edit
        $sql = "update category set nameCategory = '".$_POST['nameCategory']."' where idCategory = ".$_POST["idCategory"];
        DataProvider::excuteQuery($sql);
        DataProvider::close();
    } else { // action like add
        $sql = "insert into category(nameCategory) values('".$_POST['nameCategory']."')";
        DataProvider::excuteQuery($sql);
        DataProvider::close();
    }
    header("Location:../NewCategory.php");
?>