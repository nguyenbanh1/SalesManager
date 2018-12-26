
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
                                $offsetCurrent = 0;
                                if (isset($_GET["offset"])) {
                                    $offsetCurrent = $_GET["offset"];
                                }
                                include_once ("../DBMySQL/DataProvider.php");
                                $sql = "select idProduct, nameProduct, price, quantity from product limit 4 offset ".$offsetCurrent;
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

                    <?php
                        $sql = "select count(*) as 'count' from product";
                        $rs = DataProvider::excuteQuery($sql);
                        $row = mysqli_fetch_array($rs);
                        $count = $row["count"];
                        DataProvider::close();
                    ?>
                    <nav class="numbering">
                        <div class="fixPagination">

                            <a href="NewProducts.php?offset=0">&laquo;</a>
                            <a href="NewProducts.php?offset=<?php if($offsetCurrent <= 0) { echo 0;} else { echo ($offsetCurrent - 4); } ?>"><</a>
                            <?php
                                if ($count / 4 < 5) { //Xuất tối đa page khi page nhỏ hơn 5
                                    for ($i = 0 ;$i < $count/4 ; $i++) {
                                        $active = "";
                                        if ($offsetCurrent == ($i*4)) {
                                            $active = 'class = "active"';
                                        }
                                        echo '<a '.$active.' href="NewProducts.php?offset='.($i*4).'">'.($i + 1).'</a>';
                                    }
                                } else {
                                    if ($offsetCurrent / 4 < 4) { //nho hơn 4
                                        for ($i = 0 ;$i < 5 ; $i++) {
                                            $active = "";
                                            if ($offsetCurrent == ($i*4)) {
                                                $active = 'class = "active"';
                                            }
                                            echo '<a '.$active.' href="NewProducts.php?offset='.($i*4).'">'.($i + 1).'</a>';
                                        }
                                    } else {
                                        if ($offsetCurrent / 4 < $count/4 - 3) {
                                            $page = $offsetCurrent / 4;
                                            for ($i = $page - 2; $i <= $page + 2 ; $i++) {
                                                $active = "";
                                                if ($offsetCurrent == ($i*4)) {
                                                    $active = 'class = "active"';
                                                }
                                                echo '<a '.$active.' href="NewProducts.php?offset='.($i*4).'">'.($i + 1).'</a>';
                                            }
                                        } else {
                                            
                                            $page = (int)($count/4) - 2;
                                            for ($i = $page; $i <= $page + 2 ; $i++) {
                                                $active = "";
                                                if ($offsetCurrent == ($i*4)) {
                                                    $active = 'class = "active"';
                                                }
                                                echo '<a '.$active.' href="NewProducts.php?offset='.($i*4).'">'.($i + 1).'</a>';
                                            }
                                        }
                                    }
                                }
                                
                                
                            ?>
                            <a href="NewProducts.php?offset=<?php 
                                                                if ($count <= 4) { // Amount of product less than 4
                                                                    echo 0;
                                                                } else {
                                                                    if ($offsetCurrent >= ($count - ($count % 4))) { // handle position of page
                                                                        echo ($count - ($count % 4));
                                                                    } else {
                                                                        echo $offsetCurrent + 4;
                                                                    }
                                                                }
                                                            
                                                            ?>">></a>

                            <a href="NewProducts.php?offset=<?php if ($count > 3 ) { echo ($count - ($count % 4));} else { echo 0;}?>">&raquo;</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<script src = "js"></script>
