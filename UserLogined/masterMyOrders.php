<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <!-- Bootstrap Core CSS -->
    <link href="../Admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href = "css/style.css" rel = "stylesheet">
    <!-- Menu CSS -->
</head>
<body>
    <div class="container">
        <div class="row profile">
            <div class="col-md-3 col-sm-3">
                <?php
                    require_once "ProfileSidebar.php"; 
                ?>                
            </div>
            <div class="col-md-9 col-sm-9">
                <div class="profile-content">
                    <?php require "profileContent/myorders.php" ?>
                </div>
            </div>
        </div>
    </div>
    <script src = "js/changeColor.js"></script>
    <script>
        function ClickEye() {

            if (document.getElementById("detailsOrder").style.display == "") {
                document.getElementById("detailsOrder").style.display = "none";
            } else {
                document.getElementById("detailsOrder").style.display = "";
            }      
        }
    </script>
</body>
</html>