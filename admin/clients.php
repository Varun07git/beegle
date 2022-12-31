<?php include_once './include/dbconnect.php'; ?>
<?php include_once './include/header.php'; ?>
<?php include_once './include/sidebar.php'; ?>
<?php
if (isset($_REQUEST['addclient'])) {
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
    $sql = "INSERT INTO `clients`(`salutation`, `client_name`, `client_email`, `client_password`, `created`, `country`, `client_phone`, `gender`, `client_category`, `client_sub_category`, `company_name`, `company_website`, `gst`, `company_phone`, `company_city`, `company_state`, `postal_code`, `company_address`, `shipping_address`, `notes`) VALUES ('$client_salulation','$client_name','$client_email','$client_password',NOW(),'$client_country','$client_phone', '$client_gender', '$client_category', '$client_sub_category', '$client_company_name', '$client_company_website', '$client_gst', '$client_office_phone','$client_city', '$client_state', '$client_postal', '$client_address', '$client_shipping', '$client_notes')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Client Added Successfully');</script>";
    } else {
        echo "<script>alert('Client Not Added');</script>";
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
                    <span class="text">Clients</span>
                </div>
                <div class="col-auto">
                    <!-- add client modal button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClientModal">
                        <i class='bx bx-plus'></i>Add Client</button>
                </div>

                <!-- import export button outline with icon
                <div class="col-auto">
                    <button class="btn btn-outline-primary"><i class='bx bx-import'></i>Import</button>
                </div>
                <div class="col-auto">
                    <button class="btn btn-outline-primary"><i class='bx bx-export'></i>Export</button>
                </div> -->
                <!-- Ul at end search, sticky notes,create new, notification, logout icon -->
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
            <div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addClientModalLabel">Add Client</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-5 py-5 ">
                            <form>
                                <!-- account details -->
                                <div class="row">
                                    <h5 class="mb-3">Account Details</h5>
                                    <div class="row mb-4">
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-4 mb-3">
                                                    <label for="clientSalutation" class="form-label">Salutation</label>
                                                    <select class="form-select" aria-label="Default select example" name="client_salulation">
                                                        <option selected>--</option>
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
                                                    <input type="text" class="form-control" id="clientName" aria-describedby="clientName" name="client_name">
                                                </div>
                                                <div class="col-4 mb-3">
                                                    <label for="clientEmail" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="Email" aria-describedby="Email" name="client_email">
                                                </div>
                                                <div class="col-4 mb-3">
                                                    <label for="clientPassword" class="form-label">Password</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" id="clientPassword" aria-describedby="clientPassword" name="client_password">
                                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class='bx bx-show'></i></button>
                                                    </div>
                                                </div>
                                                <!-- country -->
                                                <div class="col-4 mb-3">
                                                    <label for="clientCountry" class="form-label">Country</label>
                                                    <select class="form-select" aria-label="Default select example" name="client_country">
                                                        <option selected>--</option>
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
                                                    <input type="text" class="form-control" id="clientPhone" aria-describedby="clientPhone" name="client_phone">
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
                                                <option selected>--</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="clientStatus" class="form-label">Client Category</label>
                                            <select class="form-select" aria-label="Default select example" name="client_category">
                                                <option selected>--</option>

                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="clientStatus" class="form-label">Client Sub Category</label>
                                            <select class="form-select" aria-label="Default select example" name="client_sub_category">
                                                <option selected>--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-2">
                                        <h5>Company Details</h5>
                                        <div class="col-4 mb-3">
                                            <label for="clientCompany" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" id="clientCompany" aria-describedby="clientCompany" name="client_company_name">
                                        </div>
                                        <!-- official website -->
                                        <div class="col-4 mb-3">
                                            <label for="clientWebsite" class="form-label">Official Website</label>
                                            <input type="text" class="form-control" id="clientWebsite" aria-describedby="clientWebsite" name="client_company_website">
                                        </div>
                                        <!-- GST/VAT Number -->
                                        <div class="col-4 mb-3">
                                            <label for="clientGST" class="form-label">GST/VAT Number</label>
                                            <input type="text" class="form-control" id="clientGST" aria-describedby="clientGST" name="client_gst">
                                        </div>
                                        <!-- Office Number -->
                                        <div class="col-3 mb-3">
                                            <label for="clientOffice" class="form-label">Office Phone Number</label>
                                            <input type="text" class="form-control" id="clientOffice" aria-describedby="clientOffice" name="client_office">
                                        </div>
                                        <!-- city -->
                                        <div class="col-3 mb-3">
                                            <label for="clientCity" class="form-label">City</label>
                                            <input type="text" class="form-control" id="clientCity" aria-describedby="clientCity" name="client_city">
                                        </div>
                                        <!-- state -->
                                        <div class="col-3 mb-3">
                                            <label for="clientState" class="form-label">State</label>
                                            <input type="text" class="form-control" id="clientState" aria-describedby="clientState" name="client_state">
                                        </div>
                                        <!-- postal code -->
                                        <div class="col-3 mb-3">
                                            <label for="clientPostal" class="form-label">Postal Code</label>
                                            <input type="text" class="form-control" id="clientPostal" aria-describedby="clientPostal" name="client_postal">
                                        </div>
                                        <!-- company address -->
                                        <div class="col-6 mb-3">
                                            <label for="clientAddress" class="form-label">Company Address</label>
                                            <textarea class="form-control" id="clientAddress" rows="3" name="client_address"></textarea>
                                        </div>
                                        <!-- Shipping address -->
                                        <div class="col-6 mb-3">
                                            <label for="clientShipping" class="form-label">Shipping Address</label>
                                            <textarea class="form-control" id="clientShipping" rows="3" name="client_shipping"></textarea>
                                        </div>
                                        <!-- Note text editor -->
                                        <div class="col-12 mb-3">
                                            <label for="clientNote" class="form-label">Note</label>
                                            <textarea class="form-control" id="clientNote" rows="3" name="client_note"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="addclient">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            // select project data from database
            $sql2 = "SELECT * FROM `clients`";
            $result2 = mysqli_query($conn, $sql2);
            $num = mysqli_num_rows($result2);
            if ($num > 0) {
            ?>
                <!-- task box stars -->
                <div class="row mt-3">
                    <div class="col-12">
                        <table id="mytable" class="display project-table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <!-- table check box -->
                                    <td><b>id</b></td>
                                    <td><b>Name</b></td>
                                    <td><b>Email</b></td>
                                    <td><b>Created</b></td>
                                    <td><b>Status</b></td>
                                    <td><b>Action</b></td>
                                </tr>
                            </thead>
                        <?php
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $id = $row2['id'];
                            $client_name = $row2['client_name'];
                            $client_email = $row2['client_email'];
                            $created = $row2['created'];
                            $status = $row2['client_status'];
                            echo
                            '
                        <tr>
                            <!-- check box -->
                            <td>' . $id . '</td>
                            <td>' . $client_name . '</td>
                            <td>' . $client_email . '</td>
                            <td>' . $created . '</td>
                            <td>' . $status . '</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="./img/3.png" alt="" width="20px" height="20px" style="background-color: #0f7dff;">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="edit-client.php?id=' . $id . '">Edit</a></li>
                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        ';
                        }
                    } ?>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</section>
<?php
include('./include/footer.php');
?>