<?php include('./partials/header.php'); ?>
            <!-- START PAGE CONTENT-->

            <div class="page-heading">
                <h1 class="page-title">Manage Products</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>

            <div class="ibox">
                <div class="ibox-head">
                    <a href="add-products.php"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Add"><i class="fa fa-plus font-14"></i></button></a>
                </div>
                <div class="ibox-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Featured</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>iphone case</td>
                                    <td>$1200</td>
                                    <td>33%</td>
                                    <td>02/08/2017</td>
                                    <td>
                                        <button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></button>
                                        <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Car covers</td>
                                    <td>$3280</td>
                                    <td>42%</td>
                                    <td>08/10/2017</td>
                                    <td>
                                        <a href="add-products.php"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Add"><i class="fa fa-plus font-14"></i></button></a>
                                        <button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></button>
                                        <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Compressors</td>
                                    <td>$7400</td>
                                    <td>56%</td>
                                    <td>14/11/2017</td>
                                    <td>
                                        <a href="add-products.php"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Add"><i class="fa fa-plus font-14"></i></button></a>
                                        <button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></button>
                                        <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- END PAGE CONTENT-->
        </div>



    <!-- BEGIN THEME CONFIG PANEL-->

    <?php include('./partials/footer.php') ?>