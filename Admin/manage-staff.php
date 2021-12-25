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
                <h1 class="page-title">Quản lý nhân viên</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>

            <div class="ibox">
                <div class="ibox-head">
                    <a href="add-staff.php"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Add"><i class="fa fa-plus font-14"></i></button></a>
                </div>
                    <div class="ibox-body">
                        <table class="table" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ</th>
                                    <th>Tên</th>
                                    <th>Tuổi</th>
                                    <th>Địa chỉ</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Ảnh nhân viên</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // câu truy vấn để lấy dữ liệu 
                                    $sql = "SELECT * FROM tbl_staff"; 

                                    // thực thi câu truy vấn
                                    $res = mysqli_query($conn, $sql); 

                                    // kiểm tra xem có dữ liệu hay không 
                                    $count = mysqli_num_rows($res); 

                                    $sn = 1; 

                                    if($count > 0){
                                        while($row = mysqli_fetch_assoc($res)){
                                            $id = $row['id']; 
                                            $first_name = $row['first_name'];
                                            $last_name = $row['last_name']; 
                                            $age = $row['age']; 
                                            $address = $row['address']; 
                                            $email = $row['email'];
                                            $contact = $row['contact'];
                                            $image_name = $row['image_name'];

                                            ?>
                                                <tr>
                                                    <td><?php echo $sn++; ?></td>
                                                    <td><?php echo $first_name; ?></td>
                                                    <td><?php echo $last_name; ?></td>
                                                    <td><?php echo $age; ?></td>
                                                    <td><?php echo $address; ?></td>
                                                    <td><?php echo $email; ?></td>
                                                    <td><?php echo $contact; ?></td>
                                                    <td>
                                                        <?php
                                                            if($image_name != ""){
                                                                ?>
                                                                    <img src="<?php echo SITEURL; ?>img/staff/<?php echo $image_name; ?>"
                                                                    width = "100px">
                                                                <?php
                                                            }else{
                                                                echo "<p class='text-success'>Image Not Added</p>";
                                                            }
                                                        ?>
                                                    </td>
                                            
                                                    <td>
                                                        <a href="<?php echo SITEURL; ?>admin/update-staff.php?id=<?php echo $id;?>"><button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Update"><i class="fa fa-pencil font-14"></i></button></a> 
                                                        <a href="<?php echo SITEURL; ?>admin/delete-staff.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button></a> 
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