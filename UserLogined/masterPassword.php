<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <!-- Bootstrap Core CSS -->
    <link href="../Admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href = "css/style.css" rel = "stylesheet">
    
    
</head>
<body>
    <div class="container">
        <div class="row profile">
            <div class="col-md-3 col-sm-3">
                <?php require_once "ProfileSidebar.php" ?>
            </div>
            <div class="col-md-9 col-sm-9">
                <div class="profile-content">
                    <?php require "profileContent/password.php" ?>
                </div>
            </div>
        </div>
    </div>
    <script src = "js/changeColor.js"></script>
    <script>
        function checkFormPassword() {
            var flag = true;
            var currentPasswordEle = document.getElementById("input-currentPassword");
            var newPasswordEle = document.getElementById("input-newPassword");
            var confirmPasswordEle = document.getElementById("input-confirmNewPassword");

            var currentPasswordErrorEle = document.getElementById("error-currentPassword");
            var newPasswordErrorEle = document.getElementById("error-newPassword");
            var confirmErrorEle = document.getElementById("error-confirmPassword");    

            if (currentPasswordEle.value == null || currentPasswordEle.value == "") {
                currentPasswordErrorEle.innerHTML = "Current Password is empty";
                flag = false;
            } else {
                currentPasswordErrorEle.innerHTML = "";
            }

            if (newPasswordEle.value == null || newPasswordEle.value == "") {
                newPasswordErrorEle.innerHTML = "New Password is empty";
                flag = false;
            } else {
                newPasswordErrorEle.innerHTML = "";
            }

            if (confirmPasswordEle.value == null || confirmPasswordEle.value == "") {
                confirmErrorEle.innerHTML = "Confirm Password is empty";
                flag = false;
            } else {
                confirmErrorEle.innerHTML = "";
                if (confirmPasswordEle.value !== newPasswordEle.value) {
                    confirmErrorEle.innerHTML = "Confirm Password is not equal with New Password";
                    flag = false;
                }
            }
            
            return flag;
        }    
    </script>
    
</body>
</html>