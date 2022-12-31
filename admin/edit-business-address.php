<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php'; 

if (isset($_REQUEST['save'])) {
      // Assigning User Values to Variable
    $id = $_REQUEST['id'];
    $location= $_REQUEST['location'];
    $address = $_REQUEST['address'];
    $taxName = $_REQUEST['taxName'];

    $sql = "UPDATE `business_address` SET `location`='$location',`address`='$address',`tax_name`='$taxName' WHERE `id`='$id'";
      
      if ($conn->query($sql) == TRUE) {
        // below msg display on form submit success
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Work Assigned Successfully </div>';
      } else {
        // below msg display on form submit failed
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Assign Work </div>';
      }
    }

?>

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
                    <span class="text">Edit Project</span>
                </div>
                <div class="col-auto">
                    <!-- save and close button -->
                    <a type="button" class="btn btn-primary"><i class='bx bx-save'></i>Save</a>
                    <a type="button" class="btn btn-outline-primary" href="./business-address.php">
                        <i class='bx bx-undo'></i>Close</a>
                    
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
            <!-- edit Project -->
            <div class="row my-5">
                <div class="container">
                    <form action="" method="POST">
                        <div class="row">
                            <?php
                            if (isset($_REQUEST['id'])) {
                                $id = $_REQUEST['id'];
                                $sql = "SELECT * FROM `business_address` WHERE `id` = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                            }
                            ?>
                            <!-- location -->
                            <div class="col-6 mb-4">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" value="<?php if (isset($row['location'])) {
                                                                                                                    echo $row['location'];
                                                                                                                } ?>" placeholder="Enter Location">
                                </div>
                            </div>
                            <!-- tax name -->
                            <div class="col-6 mb-4">
                                <div class="form-group">
                                    <label for="tax_name">Tax Name</label>
                                    <input type="text" class="form-control" id="tax_name" name="tax_name" value="<?php if (isset($row['tax_name'])) {
                                        echo $row['tax_name'];
                                    } ?>" placeholder="Enter Tax Name">
                                </div>
                            </div>
                            <!-- address -->
                            <div class="col-12  mb-4">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="3"><?php if (isset($row['address'])) {
                                                                                                            echo $row['address'];
                                                                                                        } ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Close and save button -->
                        <div class="row">
                            <div class="col-auto">
                                <!-- anchor button -->
                                <button type="submit" class="btn btn-primary" name="save">Save</button>
                            </div>
                            <div class="col-auto">
                                <!-- anchor button -->
                                <a href="business-address.php" class="btn btn-primary">Close</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('./include/footer.php');
?>