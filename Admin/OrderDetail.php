
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
                            $sql1 = "select d.idProduct,p.nameProduct,d.quantity,d.price,d.totalCost from detailorder d,product p ".
                            "where d.idOrder = ".$row["idOrder"]." and p.idProduct = d.idProduct";
                            $rs1 = DataProvider::excuteQuery($sql1);
                            $count1 = 0;
                            while ($row1 = mysqli_fetch_array($rs1)) {
                                $count1++;
                                echo '<tr>';
                                echo '<td>'.$count1.'</td>';
                                echo '<td class = "text-center">'.$row1["nameProduct"].'</td>';
                                echo '<td class = "text-center">'.$row1["price"].'</td>';
                                echo '<td class = "text-center">'.$row1["quantity"].'</td>';
                                echo '<td class = "text-center">'.$row1["totalCost"].'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</td>
