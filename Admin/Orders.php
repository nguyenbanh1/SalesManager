<script>
    function ClickEye(id) {

        if (document.getElementById(id).style.display == "") {
            document.getElementById(id).style.display = "none";
        } else {
            document.getElementById(id).style.display = "";
        }      
    }
</script>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Orders</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li class="active">Orders Management</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Orders</h3>

                <div id="table-orders" class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Customer</th>
                                <th>Order Datetime</th>
                                <th>Total Cost</th>
                                <th>View Details</th>
                                <th class = "text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $offsetCurrent = 0;
                                if (isset($_GET["offset"])) {
                                    $offsetCurrent = $_GET["offset"];
                                } 
                                require_once("../DBMySql/DataProvider.php");
                                $sql = "select o.idOrder, o.dateCreated, o.status, o.amount, u.idUser, u.username".
                                " from orders o, user u ".
                                "where o.idUser = u.idUser order by o.dateCreated desc limit 4 offset ".$offsetCurrent;
                                $rs = DataProvider::excuteQuery($sql);
                                $count = 0;
                                while ($row = mysqli_fetch_array($rs)) {
                                    $count++;
                                    echo '<tr>';
                                    echo '<td class="text-center">'.$count.'</td>';
                                    echo '<td class = "text-center">'.$row["username"].'</td>';
                                    echo '<td class = "text-center">'.$row["dateCreated"].'</td>';
                                    echo '<td class = "text-center">'.$row["amount"].'</td>';
                                    echo '<td class="text-center">';
                                    echo    '<div class="fa fa-eye" onclick = "ClickEye('.$row["idOrder"].')"></div>';
                                    echo '</td>';
                                    $status = $row["status"];
                                    if (isset($_GET["status"])) {
                                            $status = $_GET["status"];
                                    }
                                    $color = "btn btn-primary";
                                    if ($status == "delivering") {
                                        $color = "btn btn-warning";
                                    }
                                    echo '<td class="text-left">';
                                    echo '<div class="dropdown">';    
                                    echo    '<button class="'.$color.'"  type="button" data-toggle="dropdown">'.$status.'<span class="caret"></span></button>';
                                    echo    '<ul class="dropdown-menu">';
                                    echo    '<li><a href="PageHandler/UpdateOrderHandler.php?idOrder='.$row["idOrder"].'&status=delivering">delivering</a></li>';
                                    echo    '<li><a href="PageHandler/UpdateOrderHandler.php?idOrder='.$row["idOrder"].'&status=delivered">delivered</a></li>';
                                    echo    '</ul>';
                                    echo '</div>';
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '<tr style = "display:none;" id = "'.$row["idOrder"].'">';
                                       require "OrderDetail.php";
                                    echo '</tr>';
                                }
                                DataProvider::close();
                            ?>
                        </tbody>
                    </table>
                    <?php
                        $sql = "select count(*) as 'count' from orders";
                        $rs = DataProvider::excuteQuery($sql);
                        $row = mysqli_fetch_array($rs);
                        $count = $row["count"];
                        DataProvider::close();
                    ?>

                    <nav class="numbering">
                        <div class="fixPagination">
                            <a href="NewOrders.php?offset=0">&laquo;</a>
                            <a href="NewOrders.php?offset=<?php if($offsetCurrent <= 0) { echo 0;} else { echo ($offsetCurrent - 4); } ?>"><</a>
                            <?php
                                if ($count / 4 < 5) {
                                    for ($i = 0 ;$i < $count/4 ; $i++) {
                                        $active = "";
                                        if ($offsetCurrent == ($i*4)) {
                                            $active = 'class = "active"';
                                        }
                                        echo '<a '.$active.' href="NewOrders.php?offset='.($i*4).'">'.($i + 1).'</a>';
                                    }
                                }
                                else {
                                    if ($offsetCurrent / 4 < 5) {
                                        for ($i = 0 ;$i < 5 ; $i++) {
                                            $active = "";
                                            if ($offsetCurrent == ($i*4)) {
                                                $active = 'class = "active"';
                                            }
                                            echo '<a '.$active.' href="NewOrders.php?offset='.($i*4).'">'.($i + 1).'</a>';
                                        }
                                    } else {
                                        if ($offsetCurrent / 4 < $count/4 - 3) {
                                            $page = $offsetCurrent / 4;
                                            for ($i = $page - 2; $i <= $page + 2 ; $i++) {
                                                $active = "";
                                                if ($offsetCurrent == ($i*4)) {
                                                    $active = 'class = "active"';
                                                }
                                                echo '<a '.$active.' href="NewOrders.php?offset='.($i*4).'">'.($i + 1).'</a>';
                                            }
                                        } else {
                                            
                                            $page = (int)($count/4) - 2;
                                            for ($i = $page; $i <= $page + 2 ; $i++) {
                                                $active = "";
                                                if ($offsetCurrent == ($i*4)) {
                                                    $active = 'class = "active"';
                                                }
                                                echo '<a '.$active.' href="NewOrders.php?offset='.($i*4).'">'.($i + 1).'</a>';
                                            }
                                        }
                                    }
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