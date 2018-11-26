
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Categorys</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Categorys Management</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">
                        Products                        
                        <a href = "NewCategoryForm.php" style = "color:white" Class="btn btn-sm btn-primary pull-right">Add New Category</a>
                    </h3>

                    <div id="table-users" class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class=  "fix-rd">
                                    <td ><?php echo "1" ?></td>
                                    <td><?php echo "Iphone" ?></td>
                                    <td >
                                        <a class="fa fa-pencil" href= "NewCategoryForm.php"></a>
                                    </td>
                                    <td>                                        
                                        <a class="fa fa-trash" href= "#" id = "trash" OnClick="return confirm('Are you sure to delete this category?');"></a>                                       
                                    </td>
                                </tr>                                
                            </tbody>
                        </table>

                        <nav class="numbering">
                            <div class="fixPagination">
                                <a href="#">&laquo;</a>
                                <a href="#">1</a>
                                <a href="#" class = <?="active"?> >2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#">5</a>
                                <a href="#">6</a>
                                <a href="#">&raquo;</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <script src = "js"></script>
