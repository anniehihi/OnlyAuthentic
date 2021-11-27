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
                <h1 class="page-title">Manage Category</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>
            <div class="ibox">
                <div class="ibox-head">
                    <a href="add-category.php"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Add"><i class="fa fa-plus font-14"></i></button></a>
                </div>
                <div class="ibox-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Featured</th>
                                    <th>Active</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // câu truy vấn để lấy dữ liệu 
                                    $sql = "SELECT * FROM tbl_category"; 

                                    // thực thi câu truy vấn
                                    $res = mysqli_query($conn, $sql); 

                                    // kiểm tra xem có dữ liệu hay không 
                                    $count = mysqli_num_rows($res); 

                                    $sn = 1; 

                                    if($count > 0){
                                        while($row = mysqli_fetch_assoc($res)){
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
                                                                    width = "200px">
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
                                                    <div class='text-success'>Image Not Added</div>
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