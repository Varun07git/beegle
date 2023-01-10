<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php';
if (isset($_REQUEST['addservice'])) {
    // Assigning User Values to Variable
    $ServiceName = $_REQUEST['service_name'];
    $ServicePrice = $_REQUEST['service_price'];
    $ServiceCategory = $_REQUEST['service_category'];
    $ServiceSubCategory = $_REQUEST['service_sub_category'];
    $tax = $_REQUEST['tax'];
    $hsnSac = $_REQUEST['hsn_sac'];
    $clientCanPurchase = $_REQUEST['client_can_purchase'];
    $downloadable = $_REQUEST['downloadable'];
    $description = $_REQUEST['description'];
    // image file upload 
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
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
            echo "<script>alert('There was an error uploading your file!');</script>";
        }
    } else {
        echo "<script>alert('You cannot upload files of this type!');</script>";
    }

    // insert query 
    $query = "INSERT INTO `products`( `product_name`, `product_price`, `product_category`, `product_sub_category`, `tax`, `hsn`, `can_purchase`, `can_download`, `product_description`, `product_file`) VALUES ('$ServiceName','$ServicePrice','$ServiceCategory','$ServiceSubCategory','$tax','$hsnSac','$clientCanPurchase','$downloadable','$description','$fileDestination')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('Service Added Successfully');</script>";
    } else {
        echo "<script>alert('Service Not Added');</script>";
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
                    <span class="text">Services/Products</span>
                </div>
                <div class="col-auto">
                    <!-- add Services modal button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServicesModal">
                        <i class="bx bx-plus"></i>Add Service
                    </button>
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
            <!-- Add CRM client Modal to client account and company details -->
            <div class="modal fade" id="addServicesModal" tabindex="-1" aria-labelledby="addServicesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addServicesModalLabel">Add Service/Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-5 py-5 ">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <!-- account details -->
                                <h5 class="mb-3">Service/Product Details</h5>
                                <div class="row mb-4">
                                    <!-- service name -->
                                    <div class="col-4 mb-3">
                                        <label for="serviceName" class="form-label">Service Name</label>
                                        <input type="text" class="form-control" id="serviceName" aria-describedby="serviceName" name="service_name">
                                    </div>
                                    <!-- service price -->
                                    <div class="col-4 mb-3">
                                        <label for="servicePrice" class="form-label">Service Price</label>
                                        <input type="text" class="form-control" id="servicePrice" aria-describedby="servicePrice" name="service_price">
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
                                            <option selected>--</option>
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
                                        <input type="text" class="form-control" name="hsn_sac" id="hsnSac" aria-describedby="hsnSac">
                                    </div>
                                    <!-- Client can purchase -->
                                    <div class="col-4 mb-3">
                                        <label for="clientCanPurchase" class="form-label">Client can purchase</label>
                                        <select class="form-select" name="client_can_purchase" aria-label="Default select example">
                                            <option selected>--</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <!-- Downloadable -->
                                    <div class="col-4 mb-3">
                                        <label for="downloadable" class="form-label">Downloadable</label>
                                        <select class="form-select" name="downloadable" aria-label="Default select example">
                                            <option selected>--</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <!-- Description -->
                                    <div class="col-12 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                    </div>
                                    <!-- Add logo files -->
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="ProjectFile" class="form-label">Report PDF File</label>
                                            <input type="file" class="form-control" id="ProjectFile" name="file" aria-describedby="ProjectFile" value="">
                                        </div>
                                        <!--existing file  -->
                                        <div class="col-6 mb-3">
                                            <!-- <label for="ProjectExistingFile" class="form-label">Existing File</label> -->
                                            <input type="hidden" class="form-control" id="ProjectExistingFile" name="existingfile" aria-describedby="ProjectExistingFile">
                                            <?php
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="addservice">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- task box stars -->
            <div class="row mt-3">
                <div class="col-12">
                    <table id="mytable" class="display project-table" style="width: 100%;">
                        <thead>
                            <tr>
                                <td><b>Id</b></td>
                                <!-- logo -->
                                <td><b>Product image</b></td>
                                <td><b>Product Name</b></td>
                                <td><b>Product Description</b></td>
                                <td><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM products";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td><img src=". $row['product_file']. " alt='logo' width='40px' height='40px'></td>";
                                echo "<td>" . $row['product_name'] . "</td>";
                                echo "<td>" . $row['product_description'] . "</td>";
                                echo "
                                <td>
                                <div class='dropdown'>
                                        <button class='btn btn-light dropdown-toggle' type='button' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-expanded='false'>
                                                <img src='./img/3.png' alt='' width='20px' height='20px' style='background-color: #0f7dff;'>
                                        </button>
                                        <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                            <li><a href='edit-service.php?id=" . $row['id'] . "' class='dropdown-item'>Edit</a></li>
                                            <li><a class='dropdown-item' href='edit-service.php?id=" . $row['id'] . "'>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('./include/footer.php');
?>