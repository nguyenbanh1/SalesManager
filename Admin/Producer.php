<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Producers</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li class="active">Producers Management</li>
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
                    <a href = "NewProducerForm.php" style = "color:white" Class="btn btn-sm btn-primary pull-right">Add New Producer</a>
                </h3>

                <div id="table-users" class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Producer Name</th>
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
                                $sql = "select * from Producer limit 4 offset ".$offsetCurrent;
                                $rs = DataProvider::excuteQuery($sql);                                
                                $count = 0; 
                                while ($row = mysqli_fetch_array($rs)) {
                                    $count++;
                                    echo '<tr class=  "fix-rd">';
                                    echo    '<td >'.$count.'</td>';
                                    echo    '<td>'.$row["nameProducer"].'</td>';
                                    echo    '<td >';
                                    echo        '<a class="fa fa-pencil" href= "NewProducerForm.php?idProducer='.$row["idProducer"].'"></a>';
                                    echo    '</td>';
                                    echo    '<td>';                                       
                                    echo        '<a class="fa fa-trash" href= "PageHandler/DeleteProducerHandler.php?idProducer='.$row["idProducer"].'" id = "trash" OnClick="return confirm('.'Are you sure to delete this producer?'.');"></a>';                                     
                                    echo    '</td>';
                                    echo '</tr>';                                    
                                }
                                DataProvider::close();
                            ?>

                        </tbody>
                    </table>
                    <?php
                        $sql = "select count(*) as 'count' from producer";
                        $rs = DataProvider::excuteQuery($sql);
                        $row = mysqli_fetch_array($rs);
                        $count = $row["count"];
                        DataProvider::close();
                    ?>
                    <nav class="numbering">
                        <div class="fixPagination">

                            
                            <a href="NewProducer.php?offset=0">&laquo;</a>
                            <a href="NewProducer.php?offset=<?php if($offsetCurrent <= 0) { echo 0;} else { echo ($offsetCurrent - 4); } ?>"><</a>
                            <?php
                                for ($i = 0 ;$i < $count/4 ; $i++) {
                                    echo '<a href="NewProducer.php?offset='.($i*4).'">'.($i + 1).'</a>';
                                }
                            ?>
                            <a href="NewProducer.php?offset=<?php if($offsetCurrent >= ($count-3)) { echo ($count - 3);} else { echo ($offsetCurrent - 4); } ?>">></a>
                            <a href="NewProducer.php?offset=<?= (int)($count-3)?>">&raquo;</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<script src = "js"></script>
