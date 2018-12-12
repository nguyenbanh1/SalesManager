<div class="container-fluid">
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Orders</h3>
                <div id="table-orders" class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class = "text-center" >No.</th>
                                <th class = "text-center" >Order Datetime</th>
                                <th class = "text-center" >Total Cost</th>
                                <th class = "text-center">View Details</th>
                                <th class = "text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $offsetCurrent = 0;
                                if (isset($_GET["offset"])) {
                                    $offsetCurrent = $_GET["offset"];
                                } 
                                require_once("../DBMySql/DataProvider.php");
                                $sql = "select o.idOrder, o.dateCreated, o.status, o.amount".
                                " from orders o".
                                " where o.idUser = ".$idUser." limit 4 offset ".$offsetCurrent;
                                $rs = DataProvider::excuteQuery($sql);
                                $count = 0;
                                $listIdOrder = array();
                                while ($row = mysqli_fetch_array($rs)) {
                                    $count++;
                                    $listIdOrder[$count] = $row["idOrder"];
                                    echo '<div onclick = "ClickEye()"';
                                    echo '<tr>';
                                    echo '<td class = "text-center">'.$count.'</td>';
                                    echo '<td class = "text-center">'.$row["dateCreated"].'</td>';
                                    echo '<td class = "text-center">'.$row["amount"].'</td>';
                                    echo '</div>';
                                    echo '<td class = "text-center">';
                                    echo    '<a href="#" class="glyphicon glyphicon-expand" onclick = "ClickEye()"></a>';
                                    echo '</td>';
                                    if ($row["status"] == "delivered") {
                                        echo '<td class="text-center" style = "color:blue;">'.$row["status"].'</td>';
                                    } else {
                                        echo '<td class="text-center" style = "color:red;">'.$row["status"].'</td>';
                                    }
                                    
                                }
                                DataProvider::close();
                            ?>
                            <tr style = "display:none;"id = "detailsOrder">
                                <td colspan="7" class="padding-fix text-center">
                                    <div class="panel-body">
                                        <div class="items">
                                            <div>
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Product</th>
                                                            <th>Unit Price</th>
                                                            <th>Quantity</th>
                                                            <th>Total Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            
                                                            foreach($listIdOrder as $key => $value) {
                                                                $sql = "select d.idProduct,p.nameProduct,d.quantity,d.price,d.totalCost from detailorder d,product p ".
                                                                "where d.idOrder = ".$value." and p.idProduct = d.idProduct";
                                                                $rs = DataProvider::excuteQuery($sql);
                                                                $count = 0;
                                                                while ($row = mysqli_fetch_array($rs)) {
                                                                    $count++;
                                                                    echo '<tr>';
                                                                    echo '<td>'.$count.'</td>';
                                                                    echo '<td class = "text-center">'.$row["nameProduct"].'</td>';
                                                                    echo '<td class = "text-center">'.$row["price"].'</td>';
                                                                    echo '<td class = "text-center">'.$row["quantity"].'</td>';
                                                                    echo '<td class = "text-center">'.$row["totalCost"].'</td>';
                                                                    echo '</tr>';
                                                                }
                                                                DataProvider::close();
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <nav class="numbering">
                        <div class="fixPagination">
                            <a href="NewOrders.php?offset=0">&laquo;</a>
                            <a href="NewOrders.php?offset=<?php if($offsetCurrent <= 0) { echo 0;} else { echo ($offsetCurrent - 4); } ?>"><</a>
                            <?php
                                
                                for ($i = 0 ;$i < $count/4 ; $i++) {
                                    $active = "";
                                    if ($offsetCurrent == ($i*4)) {
                                        $active = 'class = "active"';
                                    }
                                    echo '<a '.$active.' href="NewOrders.php?offset='.($i*4).'">'.($i + 1).'</a>';
                                }
                            ?>
                            <a href="NewOrders.php?offset=<?php 
                                                                if ($count <= 4) {
                                                                    echo 0;
                                                                } else {
                                                                    if ($offsetCurrent >= ($count - ($count % 4))) {
                                                                        echo ($count - ($count % 4));
                                                                    } else {
                                                                        echo $offsetCurrent + 4;
                                                                    }
                                                                }
                                                            
                                                            ?>">></a>

                            <a href="NewOrders.php?offset=<?php if ($count > 3 ) { echo ($count - ($count % 4));} else { echo 0;}?>">&raquo;</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>