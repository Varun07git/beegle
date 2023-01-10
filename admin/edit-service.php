<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php';

if (isset($_REQUEST['save'])) {
    // Assigning User Values to Variable
    $id = $_REQUEST['id'];
    $ServiceName = $_REQUEST['service_name'];
    $ServicePrice = $_REQUEST['service_price'];
    $ServiceCategory = $_REQUEST['service_category'];
    $ServiceSubCategory = $_REQUEST['service_sub_category'];
    $tax = $_REQUEST['tax'];
    $hsnSac = $_REQUEST['hsn_sac'];
    $clientCanPurchase = $_REQUEST['client_can_purchase'];
    $downloadable = $_REQUEST['downloadable'];
    $description = $_REQUEST['description'];
    // file upload only if new file is selected
    if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('pdf');
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = 'logo.' . $fileActualExt;
                    $dir = "uploads/".$ServiceName;
                    if (!is_dir($dir)) {
                        mkdir($dir, 0777, true);
                    }
                    $fileDestination = $dir . '/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    echo "<script>alert('Your file is too big!');</script>";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "You cannot upload files of this type!";
        }
    } else {
        // if no new file is selected, use the existing file
        $fileDestination = $_REQUEST['existingfile'];
    }
    // update query
    $sql = "UPDATE `products` SET `product_name` = '$ServiceName', `product_price` = '$ServicePrice', `product_category` = '$ServiceCategory', `product_sub_category` = '$ServiceSubCategory', `tax` = '$tax', `hsn` = '$hsnSac', `can_purchase` = '$clientCanPurchase', `can_download` = '$downloadable', `product_description` = '$description', `product_file` = '$fileDestination' WHERE `id` = $id";
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
                    <span class="text">Edit Service/Product</span>
                </div>
                <div class="col-auto">
                    <!-- save and close button -->
                    <a type="button" class="btn btn-outline-primary" href="./services.php">
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
                    <form>
                        <!-- account details -->
                        <h5 class="mb-3">Service/Product Details</h5>
                        <div class="row mb-4">
                        <?php
                            if (isset($_REQUEST['id'])) {
                                $id = $_REQUEST['id'];
                                $sql = "SELECT * FROM `products` WHERE `ID` = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                            }
                            ?>
                            <!-- hidden input for id -->
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <!-- service name -->
                            <div class="col-4 mb-3">
                                <label for="serviceName" class="form-label">Service Name</label>
                                <input type="text" class="form-control" id="serviceName" aria-describedby="serviceName" name="service_name" value="<?php echo $row['product_name'];?>">
                            </div>
                            <!-- service price -->
                            <div class="col-4 mb-3">
                                <label for="servicePrice" class="form-label">Service Price</label>
                                <input type="text" class="form-control" id="servicePrice" aria-describedby="servicePrice" name="service_price" value="<?php echo $row['product_price'];?>">
                            </div>
                            <!-- service category -->
                            <div class="col-4 mb-3">
                                <label for="serviceCategory" class="form-label">Service Category</label>
                                <select class="form-select" name="service_category" aria-label="Default select example">
                                    <option selected>--</option>
                                </select>
                            </div>
                            <!-- service sub category -->
                            <div class="col-4 mb-3">
                                <label for="serviceSubCategory" class="form-label">Service Sub Category</label>
                                <select class="form-select" name="service_sub_category" aria-label="Default select example">
                                    <option selected>--</option>
                                </select>
                            </div>
                            <!-- tax -->
                            <div class="col-4 mb-3">
                                <label for="tax" class="form-label">Tax</label>
                                <select class="form-select" name="tax" aria-label="Default select example">
                                    <option selected><?php echo $row['tax'];?>%</option>
                                    <?php
                                    $tax = "SELECT * FROM tax";
                                    $tax_result = mysqli_query($conn, $tax);
                                    while ($tax_row = mysqli_fetch_assoc($tax_result)) {
                                        echo "<option value=" . $tax_row['rate'] . ">" . $tax_row['tax_name'] . " " . $tax_row['rate'] . "%</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- Hsn/Sac -->
                            <div class="col-4 mb-3">
                                <label for="hsnSac" class="form-label">HSN/SAC</label>
                                <input type="text" class="form-control" name="hsn_sac" id="hsnSac" aria-describedby="hsnSac" value="<?php echo $row['hsn'];?>">
                            </div>
                            <!-- Client can purchase -->
                            <div class="col-4 mb-3">
                                <label for="clientCanPurchase" class="form-label">Client can purchase</label>
                                <select class="form-select" name="client_can_purchase" aria-label="Default select example">
                                    <option selected><?php echo $row['can_purchase'];?></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <!-- Downloadable -->
                            <div class="col-4 mb-3">
                                <label for="downloadable" class="form-label">Downloadable</label>
                                <select class="form-select" name="downloadable" aria-label="Default select example">
                                    <option selected><?php echo $row['can_download'];?></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <!-- Description -->
                            <div class="col-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3"><?php echo $row['product_description'];?></textarea>
                            </div>
                            <!-- Add logo files -->
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="ProjectFile" class="form-label">Report PDF File</label>
                                    <input type="file" class="form-control" id="ProjectFile" name="file" aria-describedby="ProjectFile" value="">
                                </div>
                                <!--existing file  -->
                                <div class="col-6 mb-3">
                                    <label for="ProjectExistingFile" class="form-label">Existing File</label>
                                    <input type="hidden" class="form-control" id="ProjectExistingFile" name="existingfile" aria-describedby="ProjectExistingFile" value="<?php echo $row['product_file'];?>">
                                    <?php
                                    
                                    if ($row['product_file'] != "") {
                                        echo "<div class='row-auto'><a href=" . $row['product_file'] . " target='_blank' class=' btn btn-primary'>View File</a></div>";
                                    } else {
                                        echo "No file uploaded";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="save">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('./include/footer.php');
?>