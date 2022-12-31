<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php';

if (isset($_REQUEST['save'])) {
    // Assigning User Values to Variable
    $id = $_REQUEST['id'];
    $client_salulation = $_REQUEST['client_salulation'];
    $client_name = $_REQUEST['client_name'];
    $client_email = $_REQUEST['client_email'];
    $client_password = $_REQUEST['client_password'];
    $client_country = $_REQUEST['client_country'];
    $client_phone = $_REQUEST['client_phone'];
    $client_profile = $_REQUEST['client_profile'];
    $client_gender = $_REQUEST['client_gender'];
    $client_category = $_REQUEST['client_category'];
    $client_sub_category = $_REQUEST['client_sub_category'];
    $client_company_name = $_REQUEST['client_company_name'];
    $client_company_website = $_REQUEST['client_company_website'];
    $client_gst = $_REQUEST['client_gst'];
    $client_office_phone = $_REQUEST['client_office'];
    $client_city = $_REQUEST['client_city'];
    $client_state = $_REQUEST['client_state'];
    $client_postal = $_REQUEST['client_postal'];
    $client_address = $_REQUEST['client_address'];
    $client_shipping = $_REQUEST['client_shipping'];
    $client_notes = $_REQUEST['client_note'];
    $client_status = $_REQUEST['client_status'];

    // sql query to update data into database
    $sql = "UPDATE `clients` SET `salutation`='$client_salulation',`client_name`='$client_name',`client_email`='$client_email',`client_password`='$client_password',`country`='$client_country',`client_phone`='$client_phone',`gender`='$client_gender',`client_category`='$client_category',`client_sub_category`='$client_sub_category',`company_name`='$client_company_name',`company_website`='$client_company_website',`gst`='$client_gst',`company_phone`='$client_office_phone',`company_city`='$client_city',`company_state`='$client_state',`postal_code`='$client_postal',`company_address`='$client_address',`shipping_address`='$client_shipping',`notes`='$client_notes',`client_status`='$client_status' WHERE `id` = '$id'";
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
                    <span class="text">Edit Client</span>
                </div>
                <div class="col-auto">
                    <!-- save and close button -->
                    <a type="button" class="btn btn-outline-primary" href="./clients.php">
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
                            <!-- project short code -->
                            <?php
                            if (isset($_REQUEST['id'])) {
                                $id = $_REQUEST['id'];
                                $sql = "SELECT * FROM `clients` WHERE `id` = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                            }
                            ?>
                            <h5 class="mb-3">Account Details</h5>
                            <div class="row mb-4">
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-4 mb-3">
                                            <label for="clientSalutation" class="form-label">Salutation</label>
                                            <select class="form-select" aria-label="Default select example" name="client_salulation">
                                                <!-- echo feched data -->
                                                <option selected><?php echo $row['salutation']; ?></option>
                                                <option value="Mr">Mr</option>
                                                <option value="Mrs">Mrs</option>
                                                <option value="Sir">Sir</option>
                                                <option value="Miss">Miss</option>
                                                <option value="Dr">Dr</option>
                                                <option value="Madam">Madam</option>
                                            </select>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="clientName" class="form-label">Client Name</label>
                                            <input type="text" class="form-control" id="clientName" aria-describedby="clientName" name="client_name" value="<?php echo $row['client_name']; ?>">
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="clientEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="Email" aria-describedby="Email" name="client_email" value="<?php echo $row['client_email']; ?>">
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="clientPassword" class="form-label">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="clientPassword" aria-describedby="clientPassword" name="client_password" value="<?php echo $row['client_password']; ?>">
                                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class='bx bx-show'></i></button>
                                            </div>
                                        </div>
                                        <!-- country -->
                                        <div class="col-4 mb-3">
                                            <label for="clientCountry" class="form-label">Country</label>
                                            <select class="form-select" aria-label="Default select example" name="client_country">
                                                <option selected><?php echo $row['country']; ?></option>
                                                <option value="India">India</option>
                                                <option value="USA">USA</option>
                                                <option value="UK">UK</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Australia">Australia</option>
                                                <option value="New Zealand">New Zealand</option>
                                            </select>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="clientPhone" class="form-label">Client Phone</label>
                                            <input type="text" class="form-control" id="clientPhone" aria-describedby="clientPhone" name="client_phone" value="<?php echo $row['client_phone']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Profile Picture</label>
                                        <input class="form-control" type="file" id="formFile" name="client_profile">
                                    </div>
                                </div>
                                <!-- gender input field dropdown -->
                                <div class="col-3">
                                    <label for="clientStatus" class="form-label">Gender</label>
                                    <select class="form-select" aria-label="Default select example" name="client_gender">
                                        <option selected><?php echo $row['gender']; ?></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="clientStatus" class="form-label">Client Category</label>
                                    <select class="form-select" aria-label="Default select example" name="client_category">
                                        <option selected><?php echo $row['client_category']; ?></option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="clientStatus" class="form-label">Client Sub Category</label>
                                    <select class="form-select" aria-label="Default select example" name="client_sub_category">
                                        <option selected><?php echo $row['client_sub_category']; ?></option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="clientStatus" class="form-label">Client Status</label>
                                    <select class="form-select" aria-label="Default select example" name="client_status">
                                        <option selected><?php echo $row['client_status']; ?></option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-2">
                                <h5>Company Details</h5>
                                <div class="col-4 mb-3">
                                    <label for="clientCompany" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="clientCompany" aria-describedby="clientCompany" name="client_company_name" value="<?php echo $row['company_name']; ?>">
                                </div>
                                <!-- official website -->
                                <div class="col-4 mb-3">
                                    <label for="clientWebsite" class="form-label">Official Website</label>
                                    <input type="text" class="form-control" id="clientWebsite" aria-describedby="clientWebsite" name="client_company_website" value="<?php echo $row['company_website']; ?>">
                                </div>
                                <!-- GST/VAT Number -->
                                <div class="col-4 mb-3">
                                    <label for="clientGST" class="form-label">GST/VAT Number</label>
                                    <input type="text" class="form-control" id="clientGST" aria-describedby="clientGST" name="client_gst" value="<?php echo $row['gst']; ?>">
                                </div>
                                <!-- Office Number -->
                                <div class="col-3 mb-3">
                                    <label for="clientOffice" class="form-label">Office Phone Number</label>
                                    <input type="text" class="form-control" id="clientOffice" aria-describedby="clientOffice" name="client_office" value="<?php echo $row['company_phone']; ?>">
                                </div>
                                <!-- city -->
                                <div class="col-3 mb-3">
                                    <label for="clientCity" class="form-label">City</label>
                                    <input type="text" class="form-control" id="clientCity" aria-describedby="clientCity" name="client_city" value="<?php echo $row['company_city']; ?>">
                                </div>
                                <!-- state -->
                                <div class="col-3 mb-3">
                                    <label for="clientState" class="form-label">State</label>
                                    <input type="text" class="form-control" id="clientState" aria-describedby="clientState" name="client_state" value="<?php echo $row['company_state']; ?>">
                                </div>
                                <!-- postal code -->
                                <div class="col-3 mb-3">
                                    <label for="clientPostal" class="form-label">Postal Code</label>
                                    <input type="text" class="form-control" id="clientPostal" aria-describedby="clientPostal" name="client_postal" value="<?php echo $row['postal_code']; ?>">
                                </div>
                                <!-- company address -->
                                <div class="col-6 mb-3">
                                    <label for="clientAddress" class="form-label">Company Address</label>
                                    <textarea class="form-control" id="clientAddress" rows="3" name="client_address"><?php echo $row['company_address']; ?></textarea>
                                </div>
                                <!-- Shipping address -->
                                <div class="col-6 mb-3">
                                    <label for="clientShipping" class="form-label">Shipping Address</label>
                                    <textarea class="form-control" id="clientShipping" rows="3" name="client_shipping"><?php echo $row['shipping_address']; ?></textarea>
                                </div>
                                <!-- Note text editor -->
                                <div class="col-12 mb-3">
                                    <label for="clientNote" class="form-label">Note</label>
                                    <textarea class="form-control" id="clientNote" rows="3" name="client_note"><?php echo $row['notes']; ?></textarea>
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
                                <a href="clients.php" class="btn btn-primary">Close</a>
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