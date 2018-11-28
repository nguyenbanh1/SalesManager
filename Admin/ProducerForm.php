<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Producer</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li class="active">New Producer</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <!-- .row -->
    <form method = "post" action = "pageHandler/EditProducerHandler.php" onsubmit = "return check()">
        <div class="row" style = "padding-left:200px;">
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <div class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">Name</label>
                            <lable id = "error-nameProducer" style = "color:red;display;margin-left:14px;"></lable>
                            <div class="col-md-12">
                                <?php 
                                    if (isset($_GET["idProducer"])) {
                                        echo '<input type ="hidden" name = "idProducer" value = '.$_GET["idProducer"].'>';
                                    }
                                ?>
                                <input type ="text" Class="form-control form-control-line" name = "nameProducer" id = "nameProducer">
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
        var nameProducerEle = document.getElementById("nameProducer");       
        var flag = true;

        if (nameProducerEle.value == null || nameProducerEle.value == "") {
            document.getElementById("error-nameProducer").innerHTML = "name producer not empty";
            document.getElementById("error-nameProducer").style.display = "block";
            flag = false;
        }
        return flag;
    }

</script>