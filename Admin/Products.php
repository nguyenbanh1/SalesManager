
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Products</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Products Management</li>
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
                        <a href = "NewProductForm.php" style = "color:white" Class="btn btn-sm btn-primary pull-right">Add New Product</a>
                    </h3>

                    <div id="table-users" class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include_once ("../DBMySQL/DataProvider.php");
                                    $sql = "select idProduct, nameProduct, price, quantity from product";
                                    $rs = DataProvider::excuteQuery($sql);
                                    
                                    $count = 0; 
                                    while ($row = mysqli_fetch_array($rs)) {
                                        $count++;
                                        echo '<tr class=  "fix-rd">';
                                        echo    '<td >'.$count.'</td>';
                                        echo    '<td>'.$row["nameProduct"].'</td>';
                                        echo    '<td>'.$row["price"].'</td>';
                                        echo    '<td>'.$row["quantity"].'</td>';
                                        echo    '<td >';
                                        echo        '<a class="fa fa-pencil" href= "NewProductForm.php?idProduct='.$row["idProduct"].'"></a>';
                                        echo    '</td>';
                                        echo    '<td>';                                       
                                        echo        '<a class="fa fa-trash" href= "PageHandler/DeleteProductHandler.php?idProduct='.$row["idProduct"].'" id = "trash" OnClick="return confirm('.'Are you sure to delete this product?'.');"></a>';                                     
                                        echo    '</td>';
                                        echo '</tr>';                                    
                                    }
                                    DataProvider::close();
                                ?>                                
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
