<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php'; ?>
<style>
    .top-band {
        background-color: #f5f5f5;
        padding-top: 17px;
        border-bottom: 1px solid #e5e5e5;
    }

    .status-circle {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
    }

    .status-circle-green {
        background-color: #28a745;
    }

    .status-circle-suspended {
        background-color: #dc3545;
    }

    .status-circle-pending {
        background-color: #ffc107;
    }

    .status-circle-hold {
        background-color: #6c757d;
    }
</style>
<!-- Page Content  -->
<section class="home-section">
    <div class="home-content">
        <div class="container-fluid">
            <div class="row top-band">
                <div class="col-auto">
                    <i class='bx bx-menu'></i>
                </div>
                <div class="col-auto">
                    <span class="text">Raw Files</span>
                </div>
                <div class="col-auto">
                    <!-- add project modal button -->
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProjectModal"><i class='bx bx-plus'></i></button> -->
                </div>
                <div class="col d-flex justify-content-end">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-outline-primary"><i class='bx bx-search'></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-outline-primary"><i class='bx bx-note'></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-outline-primary"><i class='bx bx-plus'></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-outline-primary"><i class='bx bx-bell'></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-outline-primary"><i class='bx bx-log-out'></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <form class="form-horizontal" action="../aws/upload.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">File:</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="email" placeholder="Enter email" name="ftp">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
                <!-- Download uploaded file from s3-->
                <a href="http://https://beegle-bucket.s3.amazonaws.com/test_example/php563B.tmp" target="_blank" rel="noopener noreferrer"></a>


            </div>
        </div>
    </div>
</section>
<?php
include('./include/footer.php');
?>