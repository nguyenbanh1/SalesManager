<script>
    function ClickEye() {

        if (document.getElementById("detailsOrder").style.display == "") {
            document.getElementById("detailsOrder").style.display = "none";
        } else {
            document.getElementById("detailsOrder").style.display = "";
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
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"> <?=1 ?> </td>
                                <td><?="Nguyen" ?></td>
                                <td><?="06/06/2018 3:28:03" ?> </td>
                                <td class="text-right text-bold"><?=100 ?></td>
                                <td class="text-center">
                                    <a href="#"<i class="fa fa-eye" onclick = "ClickEye()">

                                    </i></a>
                                </td>
                                <td class="text-center"> <!--Xu ly cho nay -->
                                   <select class="btn btn-primary" style = "height:33px;font-size=10px;">
                                       <option value = "delivering">Delivering</option>
                                       <option value = "delivered" selected >Delivered</option>
                                   </select>
                                </td>
                            </tr>
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


