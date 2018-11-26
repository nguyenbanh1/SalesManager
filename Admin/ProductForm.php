<script>
    function ValidateDatetime(e, args) {
        args.IsValid = false;

        if (new Date(args.Value) != 'Invalid Date') {
            args.IsValid = true;
        }
    }

    function ValidateFileUpload(e, args) {
        args.IsValid = true;

        if (HiddenFieldCurrentImage.value == "" && FileUploadImage.value == "") {
            args.IsValid = false;
        }
    }
</script>

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
                        <div class="col-md-12">
                            <input type ="text" Class="form-control form-control-line" name = "nameProduct">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Category</label>
                        <div class="col-md-12">
                            <select Class="form-control form-control-line">
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
                            <select Class="form-control form-control-line">
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
                            <textarea class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Price</label>
                        <div class="col-md-12">
                            <input type ="text" Class="form-control form-control-line" name = "price" value = "111">    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Quanlity</label>
                        <div class="col-md-12">
                            <input type ="text" Class="form-control form-control-line" name = "quanlity" value = "111">    
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-12">Start Offer Datetime</label>
                        <div class="col-md-12">
                            <input type="date" name="dateCreated" Class="form-control form-control-line" value="2017-09-10">
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
    <!-- /.row -->
</div>