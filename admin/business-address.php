<?php include_once './include/dbconnect.php' ?>
<?php include_once './include/header.php'; ?>
<?php include_once './include/sidebar.php'; ?>
<?php
if (isset($_POST['submit'])) {
    $location = $_POST['location'];
    $address = $_POST['address'];
    $taxName = $_POST['taxName'];
    $sql = "INSERT INTO `business_address` (`location`, `address`, `tax_name`) VALUES ('$location', '$address', '$taxName')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Address Added Successfully")</script>';
        echo '<script>window.location.href = "business-address.php"</script>';
    } else {
        echo '<script>alert("Address Not Added")</script>';
        echo '<script>window.location.href = "business-address.php"</script>';
    }
}
?>
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
                    <span class="text">Business Address</span>
                </div>
                <?php include_once './settings_sidebar.php'; ?>
                <!-- company setting form -->
                <div class="col">
                    <!-- add new address button -->
                    <div class="row">
                        <div class="col-12 mb-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewAddressModal">
                                <i class='bx bx-plus'></i>Add New Address</button>
                        </div>
                    </div>
                    <!-- add new address modal -->
                    <div class="modal fade" id="addNewAddressModal" tabindex="-1" aria-labelledby="addNewAddressModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addNewAddressLabel">Add New Address</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body px-5 py-4">
                                <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                                        </div>
                                        <div class="form-group">
                                            <label for="taxName">Tax Name</label>
                                            <input type="text" class="form-control" id="taxName" name="taxName" placeholder="Enter Tax Name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <!-- form header -->
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Business Address</h5>
                                </div>
                            </div>
                            <hr>
                            <?php
                            // select project data from database
                            $sql2 = "SELECT * FROM `business_address`";
                            $result2 = mysqli_query($conn, $sql2);
                            $num = mysqli_num_rows($result2);
                            if ($num > 0) {
                            ?>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <table id="mytable" class="display project-table" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <!-- table check box -->
                                                    <td><b>id</b></td>
                                                    <td><b>Location</b></td>
                                                    <td><b>Address</b></td>
                                                    <td><b>Tax Name</b></td>
                                                    <td><b>Default</b></td>
                                                    <td><b>Action</b></td>
                                                </tr>
                                            </thead>
                                        <?php
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            $id = $row2['id'];
                                            $code = $row2['location'];
                                            $address = $row2['address'];
                                            $taxName = $row2['tax_name'];
                                            echo '
                                        <tr>
                                            <td>' . $id . '</td>
                                            <td>' . $code . '</td>
                                            <td>' . $address . '</td>
                                            <td>' . $taxName . '</td>
                                            <!-- default checkbox -->
                                            <td><input type="checkbox" class="form-check-input" id="exampleCheck1">Default</td>
                                            <td><a href="edit-business-address.php?id=' . $id . '" class="btn btn-outline-secondary">Edit</a></td>
                                        </tr>';
                                        }
                                    }
                                        ?>
                                        </table>
                                    </div>
                                </div>
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