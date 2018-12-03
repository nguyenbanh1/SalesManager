<form>
    <fieldset>
        <legend>Profile</legend>

        <div class="form-group clearfix">
            <label class="col-md-2" class = "padding-input">Name</label>
            <div class="col-md-5">
                <input type = "hidden" name = "idUser" value = <?=$idUser?>>
                <input type = "text" Class="form-control form-control-line" name = "username" value = "<?=$nameUser?>">
            </div>
        </div>
        <div class="form-group clearfix">
            <label class="col-md-2 control-label" for="textinput" class = "padding-input">Email</label>
            <div class="col-md-5">
                <input type = "text" Class="form-control input-md" name = "email" value = "<?=$email?>">
            </div>
        </div>

        <div class="form-group clearfix">
            <label class="col-md-2 control-label" for="textinput" class = "padding-input">Address</label>
            <div class="col-md-5">
                <input Class="form-control input-md" type = "text" name= "Address" value = "<?=$addresses?>">
            </div>
        </div>

        <div class="form-group clearfix">
            <label class="col-md-2 control-label" for="textinput" class = "padding-input">DateOfBirth</label>
            <div class="col-md-5">
                <input Class="form-control input-md" type = "date" name= "dateofbirth" value = "<?=$dateOfBirth?>">
            </div>
        </div>
        <div class="form-group clearfix">
            <label class="col-md-2 control-label" for="textinput"class = "padding-input">Gender</label>
            <div class="col-md-5">
                <input Class="form-control input-md" type = "text" name= "gender" value = "<?=$gender?>">
            </div>
        </div>
        <div class="form-group clearfix">
            <label class="col-md-2 control-label" for="textinput" class = "padding-input">Telephone</label>
            <div class="col-md-5">
                <input Class="form-control input-md" type = "text" name= "telephone" value = "<?=$phone?>">
            </div>
        </div>

        <div class="form-group clearfix">
            <div class="col-md-12">
                <input type = "submit" value = "Update Profile">
            </div>
        </div>

    </fieldset>
</form>

