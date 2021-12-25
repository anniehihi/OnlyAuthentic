<?php include('./partials/header.php'); ?>
            <?php   
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['failed-remove'])){
                    echo $_SESSION['failed-remove'];
                    unset($_SESSION['failed-remove']);
                }
                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['remove'])){
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }
            ?> 
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Quản lý sản phẩm</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>

                <div class="ibox">
                <div class="ibox-head">
                    <a href="<?php echo SITEURL; ?>admin/add-products.php"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Thêm mới"><i class="fa fa-plus font-14"></i></button></a>
                </div>
                    <div class="ibox-body">
                        <table class="table" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Miêu tả</th>
                                    <th>Giá tiền</th>
                                    <th>Hình ảnh</th>
                                    <th>Đặc sắc</th>
                                    <th>Trạng thái</th>
                                    <th>Hoạt động</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    // câu truy vấn để lấy dữ liệu 
                                    $sql = "SELECT * FROM tbl_products"; 

                                    // thực thi câu truy vấn
                                    $res = mysqli_query($conn, $sql); 

                                    // kiểm tra xem có dữ liệu hay không 
                                    $count = mysqli_num_rows($res); 

                                    $sn = 1; 

                                    if($count > 0){
                                        while($row = mysqli_fetch_assoc($res)){
                                            // var_dump($row); 
                                            // die();
                                            $id = $row['id']; 
                                            $title = $row['title']; 
                                            $price = $row['price']; 
                                            $description = $row['description'];
                                            $image_name = $row['image_name']; 
                                            // $image_name_detail = $row['image_name_detail'];
                                            $featured = $row['featured']; 
                                            $active = $row['active'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $sn++; ?></td>
                                                    <td><?php echo $title; ?></td>
                                                    <td width="300px"><?php echo $description; ?></td>
                                                    <td><?php echo number_format($price); ?></td>
                                                    <td>
                                                        <?php
                                                            if($image_name != ""){
                                                                ?>
                                                                    <img src="<?php echo SITEURL; ?>img/product/<?php echo $image_name; ?>"
                                                                    width = "150px">
                                                                <?php
                                                            }else{
                                                                echo "<p class='text-success'>Lỗi thêm mới ảnh.</p>";
                                                            }
                                                        ?>
                                                    </td>
                                                    
                                                    <!-- <td>
                                                        <?php
                                                            if($image_name_detail != ""){
                                                                ?>
                                                                    <img src="<?php echo SITEURL; ?>img/product_detail/<?php echo $image_name_detail; ?>"
                                                                    width = "150px">
                                                                <?php
                                                            }else{
                                                                echo "<p class='text-success'>Lỗi thêm mới ảnh.</p>";
                                                            }
                                                        ?>
                                                    </td> -->


                                                    <td><?php echo $featured; ?></td>
                                                    <td><?php echo $active; ?></td>
                                                    <td>
                                                        <a href="<?php echo SITEURL; ?>admin/update-products.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>"><button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Update"><i class="fa fa-pencil font-14"></i></button></a> 
                                                        <a href="<?php echo SITEURL; ?>admin/delete-products.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button></a> 
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <tr>
                                                <td>
                                                    <div class='text-success'>Chưa có sản phẩm.</div>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- END PAGE CONTENT-->
        </div>



    <!-- BEGIN THEME CONFIG PANEL-->

    <?php include('./partials/footer.php') ?>