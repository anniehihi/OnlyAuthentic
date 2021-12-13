<?php include('./partials/header.php'); ?>

<div class="page-heading">
                <h1 class="page-title">Chi tiết hoá đơn</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox invoice">
                    <div class="invoice-header">
                        <div class="row">
                            <div class="col-6">
                                <div class="invoice-logo">
                                    <?php
                                        if(isset($_GET['id'])){
                                            $id = $_GET['id'];

                                            $sql = "SELECT * FROM tbl_order_detail WHERE order_id = $id";

                                            // thực thi truy vấn
                                            $res = mysqli_query($conn, $sql);

                                            // kiểm tra xem có dữ liệu hay không 
                                            $count = mysqli_num_rows($res); 

                                            if($count==1){
                                                $row = mysqli_fetch_assoc($res); 

                                                $product_name = $row['product_name'];
                                                $qty = $row['qty']; 
                                                $price = $row['price'];
                                                $image_name = $row['image_name'];
                                            }
                                        }
                                    ?>
                                </div>
                                <div>
                                    <div class="m-b-5 font-bold">Được gửi từ</div>
                                    <div>Minishop</div>
                                    <ul class="list-unstyled m-t-10">
                                        <li class="m-b-5">
                                            <span class="font-strong">A:</span> 235 Hoàng Quốc Việt, Hà Nội</li>
                                        <li class="m-b-5">
                                            <span class="font-strong">W:</span> minishop@gmail.com</li>
                                        <li>
                                            <span class="font-strong">P:</span> 0899999999</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <div class="clf" style="margin-bottom:30px;">
                                    <dl class="row pull-right" style="width:250px;"><dt class="col-sm-6">Invoice Date</dt>
                                        <dd class="col-sm-6">10 April 2017</dd><dt class="col-sm-6">Issue Date</dt>
                                        <dd class="col-sm-6">30 April 2017</dd><dt class="col-sm-6">Account No.</dt>
                                        <dd class="col-sm-6">1450012</dd>
                                    </dl>
                                </div>
                                <div>
                                    <div class="m-b-5 font-bold">Gửi đến</div>
                                    <div>Emma Johnson</div>
                                    <ul class="list-unstyled m-t-10">
                                        <li class="m-b-5">San Francisco, 548 Market St.</li>
                                        <li class="m-b-5">emma.johnson@exmail.com</li>
                                        <li>(123) 279-4058</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped no-margin table-invoice">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá tiền một sản phẩm</th>
                                <th class="text-right">Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div><strong><?php echo $product_name; ?></strong></div></td>
                                <td>
                                    <?php
                                        if($image_name != ""){
                                            ?>
                                                <img src="<?php echo SITEURL; ?>img/product/<?php echo $image_name; ?>"
                                                width = "150px">
                                            <?php
                                        }else{
                                            echo "<p class='text-success'>Image Not Added</p>";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo number_format($price); ?> VND</td>
                                <td><?php echo number_format($qty * $price);?> VND</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table no-border">
                        <thead>
                            <tr>
                                <th></th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-right">
                                <td class="font-bold font-18">TỔNG:</td>
                                <td class="font-bold font-18"><?php echo number_format($qty * $price);?> VND</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-right">
                        <button class="btn btn-info" type="button" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</button>
                    </div>
                </div>
                <style>
                    .invoice {
                        padding: 20px
                    }

                    .invoice-header {
                        margin-bottom: 50px
                    }

                    .invoice-logo {
                        margin-bottom: 50px;
                    }

                    .table-invoice tr td:last-child {
                        text-align: right;
                    }
                </style>
            </div>
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
<?php include('./partials/footer.php') ?>