<?php include('./partials/header.php'); ?>

            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if(isset($_SESSION['update-stt'])){
                    echo $_SESSION['update-stt'];
                    unset($_SESSION['update-stt']);
                }

                if(isset($_SESSION['user-not-found'])){
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }

                if(isset($_SESSION['pwd-not-match'])){
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }

                if(isset($_SESSION['change-pwd'])){
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }
            ?>

            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Quản lý hoá đơn</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                <div class="ibox-head">
                    <form action="excel.php" method="POST">
                        <a href="excel.php"><button type="submit" name="export_exel"  class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Xuất excel"><i class="fa fa-file-excel-o font-14"></i></button></a>  
                    </form>
                </div>             
                    <div class="ibox-body">
                        <table class="table" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ</th>
                                    <th>Tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Chi tiết</th>
                                    <th>Hoạt động</th>
                                </tr>
                            </thead>

                            <?php
                                // câu truy vấn để nhận giá trị của tất cả admin
                                $sql = "SELECT * FROM tbl_order"; 

                                // thực thi truy vấn 
                                $res = mysqli_query($conn, $sql); 

                                // kiểm tra xem truy vấn có thực hiện không
                                if($res == TRUE){
                                    // đếm xem có dữ liệu trong cơ sở dữ liệu hay không 
                                    $rows = mysqli_num_rows($res); // hàm lấy tất cả dữ liệu trong database

                                    $sn = 1;

                                    // kiểm tra số hàng
                                    if($rows > 0){
                                        // có cơ sở dữ liệu trong dữ liệu
                                        while($rows = mysqli_fetch_assoc($res)){
                                            // sử dụng vòng lặp while để lấy tất cả dữ liệu từ cơ sở dữ liệu 
                                            // vòng lặp while chạy khi chúng ta có dữ liệu trong cơ sở dữ liệu

                                            // lấy dữ liệu 
                                            $id = $rows['order_id']; 
                                            $status = $rows['status']; 
                                            $first_name=$rows['first_name']; 
                                            $last_name=$rows['last_name']; 
                                            $contact = $rows['contact'];
                                            $price_total = $rows['total'];

                                            // hiển thị giá trị trong bảng 
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $sn++; ?></td>
                                                    <td><?php echo $first_name; ?></td>
                                                    <td><?php echo $last_name; ?></td>
                                                    <td><?php echo $contact; ?></td>
                                                    <td><?php echo number_format($price_total) ; ?></td>
                                                    <td>
                                                        <?php
                                                            if($status=="Chờ xác nhận"){
                                                                echo "<label>$status</label>"; 
                                                            }elseif($status=="Xác nhận"){
                                                                echo "<label style='color: #FFC300'>$status</label>"; 
                                                            }elseif($status=="Đang giao hàng"){
                                                                echo "<label style='color: orange'>$status</label>"; 
                                                            }elseif($status=="Đã giao hàng"){
                                                                echo "<label style='color: green'>$status</label>"; 
                                                            }elseif($status=="Đã huỷ"){
                                                                echo "<label style='color: red'>$status</label>"; 
                                                            }                                                                 
                                                        ?>&ensp;
                                                        <a href="<?php echo SITEURL; ?>admin/update-status.php?id=<?php echo $id;?>"><button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Cập nhật"><i class="fa fa-pencil font-14"></i></button></a> 
                                                    </td>

                                                    <td><a href="manage-order-detail.php?id=<?php echo $id; ?>">Xem chi tiết</a></td>
                                                    <td>
                                                        <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id;?>"><button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Cập nhật"><i class="fa fa-pencil font-14"></i></button></a> 
                                                        <a href="<?php echo SITEURL; ?>admin/delete-order.php?id=<?php echo $id;?>"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Xoá"><i class="fa fa-trash font-14"></i></button></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
<?php include('./partials/footer.php') ?>