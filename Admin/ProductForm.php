<?php

    $d = date("Y-m-d")."";
    $note = null;
    if (isset($_GET["status"])) 
    {
        if ($_GET["status"] == "success") {
            $note = '<strong style = "color: rgb(128, 128, 255);margin-left:350px;">Add Product Successfully</strong>';
        } else {
            $note = '<strong style = "color: red;margin-left:350px;">Add Product failed</strong>';
        }    
    }
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Product</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li class="active">Product</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <!-- .row -->
    <form action = "PageHandler/ProductsHandler.php" method = "post" enctype="multipart/form-data" onsubmit="return check()">
        <?php if ($note != null) { echo $note;} ?>
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="white-box">
                    <div class="row text-center">
                        <img id = "ImageProduct" Class = "visible-lg-inline img-responsive" src = "#" alt = "Not found">
                    </div>
                    <br />
                    <div class="row text-bold">Upload new image</div>
                    <div class="row">
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <div class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">Name</label>
                            <lable id = "error-nameProduct" style = "color:red;display:none;margin-left:14px;"></lable>
                            <div class="col-md-12">
                                <input type ="text" Class="form-control form-control-line" name = "nameProduct" id = "nameProduct">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Category</label>
                            <div class="col-md-12">
                                <select Class="form-control form-control-line" name = "nameCategory">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Producer</label>
                            <div class="col-md-12">
                                <select Class="form-control form-control-line" name = "nameProducer">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea class="form-control" rows="2" name = "description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Price </label>
                            <lable id = "error-price" style = "color:red;display;margin-left:14px;"></lable>
                            <div class="col-md-12">
                                <input type ="text" Class="form-control form-control-line" name = "price" id = "price">    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Quantity</label>
                            <lable id = "error-quantity" style = "color:red;display:none;margin-left:14px;"></lable>
                            <div class="col-md-12">
                                <input type ="text" Class="form-control form-control-line" name = "quantity" id = "quantity">    
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12">Start Offer Datetime</label>
                            <div class="col-md-12">
                                <input type="date" name="dateCreated" Class="form-control form-control-line" value=<?=$d ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type = "submit" name = "submit" value = "Save" Class="btn btn-success"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </form>
    
    <!-- /.row -->
</div>
<script type = "text/javascript">

    function isInt(num) {
        if(parseInt(num) == num) {
            return true;
        }
        return false;
    }

    function check() {
        var nameProductEle = document.getElementById("nameProduct");
        var priceEle = document.getElementById("price");
        var quantityEle = document.getElementById("quantity");        
        var flag = true;

        if (nameProductEle.value == null || nameProductEle.value == "") {
            document.getElementById("error-nameProduct").innerHTML = "name product not empty";
            document.getElementById("error-nameProduct").style.display = "block";
            flag = false;
        }

        if ( priceEle.value  == null || priceEle.value == "") {
            document.getElementById("error-price").innerHTML = "Price not empty";
            document.getElementById("error-price").style.display = "block";            
            flag = false;
        } else {
            if (isInt(priceEle.value) == false) {
                document.getElementById("error-price").innerHTML = "Price must interger";
                document.getElementById("error-price").style.display = "block";
                flag = false;
            }
        }

        if ( quantityEle.value  == null || quantityEle.value == "") {
            document.getElementById("error-quantity").innerHTML = "Quantity not empty";
            document.getElementById("error-quantity").style.display = "block";            
            flag = false;
        } else {
            if (isInt(quantityEle.value) == false) {
                document.getElementById("error-quantity").innerHTML = "Quantity must interger";
                document.getElementById("error-quantity").style.display = "block";
                flag = false;
            }
        }
        return flag;
    }
</script>