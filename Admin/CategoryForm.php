<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Category</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li class="active">New Category</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <!-- .row -->
    <form method = "post" action = "PageHandler/CategoryFormHandler.php" onsubmit = "return check()">
        <div class="row" style = "padding-left:200px;">
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <div class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">Name</label>
                            <div class="col-md-12">
                                <input type ="text" Class="form-control form-control-line" name = "nameCategory" id = "nameCategory">
                                <lable id = "error-nameCategory" style = "color:red;display;margin-left:14px;"></lable>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type = "submit" value = "Save" Class="btn btn-success"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /.row -->
</div>
<script>
    function check() {
        var nameProducerEle = document.getElementById("nameCategory");       
        var flag = true;

        if (nameProducerEle.value == null || nameProducerEle.value == "") {
            document.getElementById("error-nameCategory").innerHTML = "name category not empty";
            document.getElementById("error-nameCategory").style.display = "block";
            flag = false;
        }
        return flag;
    }

</script>