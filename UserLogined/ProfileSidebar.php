<?php
    $nameFile = basename($_SERVER['PHP_SELF']);
    $masterPasswordNamePage = "";
    $masterPersonalNamePage = "";
    $masterMyOrdersPage = "";

    if ($nameFile == "masterPassword.php") {
        $masterPasswordNamePage = "background-color:pink;";
    } elseif ($nameFile == "masterPersonal.php") {
        $masterPersonalNamePage = "background-color:pink;";
    } elseif ($nameFile == "masterMyOrders.php") {
        $masterMyOrdersPage = "background-color:pink;";
    }

    require_once("../DBMySql/DataProvider.php");
    $imageName = "";
    $idUser = null;
    $nameUser = "";
    $addresses = "";
    $type = "";
    $dateOfBirth = null;
    $email = "";
    $phone = "";
    if (isset($_GET["idUser"]) && $_GET["idUser"] != "") {
        $idUser = $_GET["idUser"];
        $sql = "select * from User where idUser = ".$idUser;
        $rs = DataProvider::excuteQuery($sql);
        while ($row = mysqli_fetch_array($rs)) {
            $imageName = $row["imageName"];
            $nameUser = $row["nameUser"];
            $addresses = $row["addresses"];
            $type = $row["type"];
            $dateOfBirth = $row["dateOfBirth"];
            $email = $row["email"];
            $phone = $row["phone"];
        }
    }
?>
<div class="profile-sidebar">
    <!-- SIDEBAR USERPIC -->
    <div class="profile-userpic">
        <img src = "imagesUser/<?=$imageName?>" alt = "image not found" Class = "img-responsive">
    </div>
    <!-- END SIDEBAR USERPIC -->

    <!-- SIDEBAR USER TITLE -->
    <div class="profile-usertitle">
        <div class="profile-usertitle-name"><?=$nameUser?>
        </div>
        <div class="profile-usertitle-job"><?=$type?>
        </div>
    </div>
    <!-- END SIDEBAR USER TITLE -->

    <!-- SIDEBAR BUTTONS -->
    <div class="profile-userbuttons">
        <form action = "profileContent/UploadAvatarHandler.php" method = "post"  enctype="multipart/form-data">
            <input type = "hidden" value = "<?=$idUser?>" name = "idUser">
            <input type = "file" id = "FileUploadAvatar" name = "FileUploadAvatar" Class = "btn btn-sm">
            <input type = "submit" value = "Upload" Class="btn btn-sm btn-success">
        </form>  
    </div>
    <!-- SIDEBAR BUTTONS -->
                
<!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
        <ul class="nav">
            <li id = "personal" style = "<?=$masterPersonalNamePage?>" onclick = "onclickPersonal()">
                <a href = "masterPersonal.php?idUser=<?=$idUser?>"class="glyphicon glyphicon-home"> Personal</a>
            </li>
            <li id = "password" style = "<?=$masterPasswordNamePage?>">
                <a href = "masterPassword.php?idUser=<?=$idUser?>" class="glyphicon glyphicon-lock"> Password</a>
            </li>
            <li id = "myorders" style = "<?=$masterMyOrdersPage?>">
                <a href = "masterMyOrders.php?idUser=<?=$idUser?>" class = "glyphicon glyphicon-shopping-cart"> My Orders</a>
            </li>
            <li id = "Back to Website">
                <a href = "../index.php" class="glyphicon glyphicon-log-out"> Website</a>
            </li>
            <li id = "logout">
                <a href = "../login/LogoutHandler.php" class="glyphicon glyphicon-log-out"> Logout</a>
            </li>
        </ul>
    </div>
</div>
<!-- END MENU -->
