<?php include_once './include/dbconnect.php'; ?>
<?php include_once './include/header.php'; ?>
<?php include_once './include/sidebar.php'; ?>
<style>
    .top-band {
        background-color: #f5f5f5;
        padding-top: 17px;
        border-bottom: 1px solid #e5e5e5;
    }

    /* status circle */
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

    /* setting sidebar css */
    @media screen and (max-width: 992px) {

        .row-offcanvas {
            position: relative;
            -webkit-transition: all 0.25s ease-out;
            -moz-transition: all 0.25s ease-out;
            transition: all 0.25s ease-out;
        }

        .row-offcanvas-left .sidebar-offcanvas {
            left: -33%;
        }

        .row-offcanvas-left.active {
            left: 33%;
            margin-left: -6px;
        }

        .sidebar-offcanvas {
            position: absolute;
            top: 0;
            width: 33%;
            height: 100%;
            overflow: auto;
        }
    }

    /*
* Off Canvas wider at sm breakpoint
* --------------------------------------------------
*/
    @media screen and (max-width: 34em) {
        .row-offcanvas-left .sidebar-offcanvas {
            left: -45%;
        }

        .row-offcanvas-left.active {
            left: 45%;
            margin-left: -6px;
        }

        .sidebar-offcanvas {
            width: 45%;
        }
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
                    <span class="text">Company Settings</span>
                </div>
                <?php include_once './settings_sidebar.php'; ?>
                <!-- company setting form -->
                <?php
                if (isset($_REQUEST['save']))  {
                        // Assigning User Values to Variable
                        $id = '1';
                        $company_name = $_REQUEST['company_name'];
                        $company_address = $_REQUEST['company_address'];
                        $company_email = $_REQUEST['company_email'];
                        $company_phone = $_REQUEST['company_phone'];
                        $company_website = $_REQUEST['company_website'];
                        // create table query
                        $sql = "UPDATE `company` SET `company_id`='$id',`company_name`='$company_name',`company_email`='$company_email',`company_phone`='$company_phone',`company_website`='$company_website',`company_address`='$company_address' WHERE 1";
                        if ($conn->query($sql) == TRUE) {
                            // below msg display on form submit success
                            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Work Assigned Successfully </div>';
                        } else {
                            // below msg display on form submit failed
                            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Assign Work </div>';
                        }
                    }
                $sql = "SELECT * FROM `company` WHERE `company_id` = '1'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <!-- form header -->
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="card-title">Company Settings</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pt-4">
                                    <div class="form-group col-6 mb-4">
                                        <label for="company_name">Company Name</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name" value="<?php echo $row['company_name']; ?>">
                                    </div>
                                    <div class="form-group col-6 mb-4">
                                        <label for="company_email">Company Email</label>
                                        <input type="email" class="form-control" id="company_email" name="company_email" placeholder="Enter Company Email" value="<?php echo $row['company_email']; ?>">
                                    </div>
                                    <div class="form-group col-6 mb-4">
                                        <label for="company_phone">Company Phone</label>
                                        <input type="text" class="form-control" id="company_phone" name="company_phone" placeholder="Enter Company Phone" value="<?php echo $row['company_phone']; ?>">
                                    </div>
                                    <div class="form-group col-6 mb-4">
                                        <label for="company_website">Company Website</label>
                                        <input type="text" class="form-control" id="company_website" name="company_website" placeholder="Enter Company Website" value="<?php echo $row['company_website']; ?>">
                                    </div>
                                    <div class="form-group col-12 mb-4">
                                        <label for="company_address">Company Address</label>
                                        <textarea class="form-control" id="company_address" name="company_address" rows="3"><?php echo $row['company_address']; ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-outline-primary">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                </main>
                <!--/main col-->
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<?php
include('./include/footer.php');
?>