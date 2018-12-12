<?php
    $style = "";
    if (isset($_GET["status"])) {
        if ($_GET["status"] == "success"){
            $style = '<label style = "color:blue;margin-left:300px;">Change successfully</label>';
        } else {
            $style = '<label style = "color:red;margin-left:300px;">Current Password is invalid</label>';
        }
    }
?>
<form action = "PageHandler/PasswordHandler.php" method = "POST" onsubmit = "return checkFormPassword()">
    <fieldset>
        <legend>Change your password</legend>
        <?php echo $style; ?>
        <div class="form-group clearfix">
            
            <label class="col-md-3 control-label" for="textinput">Current Password</label>
            <div class="col-md-3">
                <input type = "hidden" name = "idUser" value = <?=$idUser?>>                
                <input type = "password" Class="form-control input-md" name = "currentPassword" id = "input-currentPassword">
            </div>
            <label style = "color:red;" id = "error-currentPassword"></lable>
        </div>
        <div class="form-group clearfix">
            <label class="col-md-3 control-label" for="textinput">New Password</label>
            <div class="col-md-3">
                <input type = "password" Class="form-control input-md" name = "newPassword" id = "input-newPassword">
            </div>
            <label style = "color:red;" id = "error-newPassword"></lable>
        </div>

        <div class="form-group clearfix">
            <label class="col-md-3 control-label" for="textinput">Confirm New Password</label>
            <div class="col-md-3">
                <input Class="form-control input-md" type = "password" name= "confirmNewPassword" id = "input-confirmNewPassword">
            </div>
            <label style = "color:red;" id = "error-confirmPassword"></lable>
        </div>

        <div class="form-group clearfix">
            <div class="col-md-12">
                <input type = "submit" value = "Change" Class="btn btn-sm btn-success">
            </div>
        </div>

    </fieldset>
</form>


