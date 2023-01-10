<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php';

if (isset($_REQUEST['addpayment'])) {
    $project = $_REQUEST['project'];
    $invoice = $_REQUEST['invoice'];
    $paidOn = $_REQUEST['paidOn'];
    $amount = $_REQUEST['amount'];
    $currency = $_REQUEST['currency'];
    $transectionId = $_REQUEST['transection_id'];
    $paymentGateway = $_REQUEST['payment_gateway'];
    $remark = $_REQUEST['remark'];
    // file upload

    $sql = "INSERT INTO `payments`(`project`, `invoice`, `paid_on`, `amount`, `currency`, `transection_id`, `payment_gateway`, `remark`) VALUES ('$project','$invoice','$paidOn','$amount','$currency','$transectionId','$paymentGateway','$remark')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Payment Added Successfully');</script>";
    } else {
        echo "<script>alert('Payment Not Added');</script>";
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
                    <span class="text">Payments</span>
                </div>
                <div class="col-auto">
                    <!-- add payment modal button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
                        <i class="bx bx-plus"></i> Add Payment
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
            <div class="modal fade" id="addPaymentModal" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPaymentModalLabel">Add Payment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-5 py-5 ">
                            <form>
                                <!-- account details -->
                                <h5 class="mb-3">Payment Details</h5>
                                <div class="row mb-4">
                                    <!-- project -->
                                    <div class="col-4 mb-3">
                                        <label for="project" class="form-label">Project</label>
                                        <select class="form-select" aria-label="Default select example" name="project">
                                            <option selected>--</option>
                                            <?php $project = "SELECT * FROM `projects`";
                                            $project_result = mysqli_query($conn, $project);
                                            while ($projects_data = mysqli_fetch_assoc($project_result)) {
                                                echo "<option value='" . $projects_data['project_name'] . "'>" . $projects_data['project_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Invoice -->
                                    <div class="col-4 mb-3">
                                        <label for="invoice" class="form-label">Invoice</label>
                                        <select class="form-select" aria-label="Default select example" name="invoice">
                                            <option selected>--</option>
                                            <option value="1">Invoice 1</option>
                                            <option value="2">Invoice 2</option>
                                            <option value="3">Invoice 3</option>
                                            <option value="4">Invoice 4</option>
                                            <option value="5">Invoice 5</option>
                                            <option value="6">Invoice 6</option>
                                        </select>
                                    </div>
                                    <!-- paid on -->
                                    <div class="col-4 mb-3">
                                        <label for="paidOn" class="form-label">Paid On</label>
                                        <input type="date" class="form-control" id="paidOn" aria-describedby="paidOn" name="paidOn">
                                    </div>
                                    <!-- amount -->
                                    <div class="col-3 mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="text" class="form-control" id="amount" aria-describedby="amount" name="amount">
                                    </div>
                                    <!-- currency -->
                                    <div class="col-3 mb-3">
                                        <label for="currency" class="form-label">Currency</label>
                                        <select class="form-select" aria-label="Default select example" name="currency">
                                            <option selected>--</option>
                                            <?php
                                            $currency = "SELECT * FROM `currency`";
                                            $currency_result = mysqli_query($conn, $currency);
                                            while ($currency_data = mysqli_fetch_assoc($currency_result)) {
                                                echo "<option value='" . $currency_data['currency_name'] . "'>" . $currency_data['currency_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Transection Id -->
                                    <div class="col-3 mb-3">
                                        <label for="transectionId" class="form-label">Transection Id</label>
                                        <input type="text" class="form-control" id="transectionId" aria-describedby="transectionId" name="transection_id">
                                    </div>
                                    <!-- Payment gateway -->
                                    <div class="col-3 mb-3">
                                        <label for="paymentGateway" class="form-label">Payment Gateway</label>
                                        <select class="form-select" aria-label="Default select example" name="payment_gateway">
                                            <option selected>--</option>
                                            <option value="1">Paypal</option>
                                            <option value="2">Stripe</option>
                                            <option value="3">Paystack</option>
                                            <option value="4">Flutterwave</option>
                                            <option value="5">Rave</option>
                                            <option value="6">Payoneer</option>
                                        </select>
                                    </div>

                                    <!-- input for receipt file -->
                                    <div class="col-6 mb-3">
                                        <label for="receipt" class="form-label">Receipt</label>
                                        <input class="form-control" type="file" id="receipt" name="file">
                                    </div>

                                    <!-- Remark textarea -->
                                    <div class="col-12 mb-3">
                                        <label for="remark" class="form-label">Remark</label>
                                        <textarea class="form-control" id="remark" rows="3" name="remark"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="addpayment">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $sql2 = "SELECT * FROM `payments`";
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
                                    <td><b>Id</b></td>
                                    <td><b>Project</b></td>
                                    <td><b>Invoice</b></td>
                                    <td><b>Amount</b></td>
                                    <td><b>Paid On</b></td>
                                    <td><b>Status</b></td>
                                    <td><b>Action</b></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result2)) {
                                echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['project'] . "</td>
                                <td>" . $row['invoice'] . "</td>
                                <td>" . $row['amount'] . "</td>
                                <td>" . $row['paid_on'] . "</td>";
                                if ($row['payment_status'] == 'paid') {
                                    echo "<td><span class='badge bg-success'>Paid</span></td>";
                                } elseif ($row['payment_status'] == 'partial') {
                                    echo "<td><span class='badge bg-warning'>Partial</span></td>";
                                } else {
                                    echo "<td><span class='badge bg-danger'>Unpaid</span></td>";
                                }
                                echo "
                                <td>
                                <div class='dropdown'>
                                <button class='btn btn-light dropdown-toggle' type='button' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-expanded='false'>
                                        <img src='./img/3.png' alt='' width='20px' height='20px' style='background-color: #0f7dff;'>
                                </button>
                                <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                    
                                <li><a href='edit-payment.php?id=" . $row['id'] . "' class='dropdown-item'>Edit</a></li>
                                <li><a class='dropdown-item' href='edit-payment.php?id=" . $row['id'] . "'>Delete</a></li>
                                <li><a href='' class='dropdown-item'>View</a></li>
                                </ul>
                                </div>
                                </td>
                            </tr>";
                            }
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