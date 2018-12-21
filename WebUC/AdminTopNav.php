﻿<?php
    session_start();
    if (isset($_SESSION["user"]["idUser"])) {
        require "../DBMySql/DataProvider.php";
        $sql = "select * from user where idUser =".$_SESSION["user"]["idUser"];
        $rs = DataProvider::excuteQuery($sql);
        $image = "";
        if ($row = mysqli_fetch_array($rs)) {
            $image = $row["imageName"];
        }
        DataProvider::close();
    } else {
        header("Location:../index.php");
    }
?>
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo" href="index.php">
                <!-- Logo icon image, you can use font-icon also -->
                <b>
                    <!--This is dark logo icon-->
                    <img src="../plugins/images/admin-logo.png" alt="home" class="dark-logo" />
                    <!--This is light logo icon-->
                    <img src="../plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                </b>
                <!-- Logo text image you can use text also -->
                <span class="hidden-xs">
                    <!--This is dark logo text-->
                    <img src="../plugins/images/admin-text.png" alt="home" class="dark-logo" />
                    <!--This is light logo text-->
                    <img src="../plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                </span></a>
        </div>
        <!-- /Logo -->
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li style ="right:40px;">
                <a href="../index.php">&laquo; Back to Website</a>
            </li>
            <li class="profile-pic" style="color:white;top:10px;right:35px;">
                <img src="../UserLogined/imagesUser/<?=$image?>" alt="user-img" width="36" height ="36"/>
                Admin</a>
            </li>
        </ul>
    </div>
</nav>