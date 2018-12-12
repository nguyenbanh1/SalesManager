<?php 

    require_once("../../DBMySql/DataProvider.php");
    if (isset($_GET["idCategory"])) {
        $sql = "delete from Category where idCategory = ".$_GET["idCategory"]."";
        DataProvider::excuteQuery($sql);
        DataProvider::close();
    }

    header("Location:../NewCategory.php");

?>
