<?php include('./partials/header.php'); ?>

            <?php
                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['no-category-found'])){
                    echo $_SESSION['no-category-found'];
                    unset($_SESSION['no-category-found']);
                }

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                
                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
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
                <h1 class="page-title">Quản lý danh mục sản phẩm</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>


            <div class="page-content fade-in-up">
                <div class="ibox">
                <div class="ibox-head">
                    <a href="add-category.php"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Thêm"><i class="fa fa-plus font-14"></i></button></a>  
                </div>
                    <div class="ibox-body">
                        <table class="table" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên danh mục</th>
                                    <th>Hình ảnh</th>
                                    <th>Đặc Sắc</th>
                                    <th>Trạng thái</th>
                                    <th>Hoạt động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql3 = "SELECT * FROM tbl_category";

                                    $res3 = mysqli_query($conn, $sql3); 
                                    $count3 = mysqli_num_rows($res3); 
                                    $sn = 1; 

                                    if($count3 > 0){
                                        while($row = mysqli_fetch_assoc($res3)){
                                            $id = $row['id']; 
                                            $title = $row['title']; 
                                            $image_name = $row['image_name']; 
                                            $featured = $row['featured']; 
                                            $active = $row['active'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $sn++; ?></td>
                                                    <td><?php echo $title; ?></td>
                                                    <td>
                                                        <?php
                                                            if($image_name != ""){
                                                                ?>
                                                                    <img src="<?php echo SITEURL; ?>img/category/<?php echo $image_name; ?>"
                                                                    width = "150px">
                                                                <?php
                                                            }else{
                                                                echo "<p class='text-success'>Image Not Added</p>";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $featured; ?></td>
                                                    <td><?php echo $active; ?></td>
                                                    <td>
                                                        <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id;?>"><button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Update"><i class="fa fa-pencil font-14"></i></button></a> 
                                                        <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button></a> 
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <tr>
                                                <td>
                                                    <div class='text-success'>Không có sản phẩm</div>
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
    </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="example-table_info" role="status" aria-live="polite"></div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
        



    <!-- BEGIN THEME CONFIG PANEL-->

    <?php include('./partials/footer.php') ?>