<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php';

if (isset($_REQUEST['save'])) {
    $id = $_REQUEST['id'];
    $project = $_REQUEST['project'];
    $invoice = $_REQUEST['invoice'];
    $paidOn = $_REQUEST['paidOn'];
    $amount = $_REQUEST['amount'];
    $currency = $_REQUEST['currency'];
    $transectionId = $_REQUEST['transection_id'];
    $paymentGateway = $_REQUEST['payment_gateway'];
    $paymentStatus = $_REQUEST['payment_status'];
    $remark = $_REQUEST['remark'];
    
    $sql = "UPDATE `payments` SET `project` = '$project', `invoice` = '$invoice', `paid_on` = '$paidOn', `amount` = '$amount', `currency` = '$currency', `transection_id` = '$transectionId', `payment_gateway` = '$paymentGateway', `payment_status` = '$paymentStatus', `remark` = '$remark' WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Payment Updated Successfully!')</script>";
    } else {
        echo "<script>alert('Payment Not Updated!')</script>";
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
                    <span class="text">Edit Payment</span>
                </div>
                <div class="col-auto">
                    <!-- save and close button -->
                    <a type="button" class="btn btn-outline-primary" href="./payment.php">
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
                        <h5 class="mb-3">Payment Details</h5>
                        <div class="row mb-4">
                            <?php
                            if (isset($_REQUEST['id'])) {
                                $id = $_REQUEST['id'];
                                $sql = "SELECT * FROM `payments` WHERE `id` = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                            }
                            ?>
                            <!-- hidden input for id -->
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <!-- project -->
                            <div class="col-4 mb-3">
                                <label for="project" class="form-label">Project</label>
                                <select class="form-select" aria-label="Default select example" name="project">
                                    <option selected><?php echo $row['project']; ?></option>
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
                                    <option selected><?php echo $row['invoice']; ?></option>
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
                                <input type="date" class="form-control" id="paidOn" aria-describedby="paidOn" name="paidOn" value="<?php echo $row['paid_on']; ?>">
                            </div>
                            <!-- amount -->
                            <div class="col-3 mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="text" class="form-control" id="amount" aria-describedby="amount" name="amount" value="<?php echo $row['amount']; ?>">
                            </div>
                            <!-- currency -->
                            <div class="col-3 mb-3">
                                <label for="currency" class="form-label">Currency</label>
                                <select class="form-select" aria-label="Default select example" name="currency">
                                    <option selected><?php echo $row['currency']; ?></option>
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
                                <input type="text" class="form-control" id="transectionId" aria-describedby="transectionId" name="transection_id" value="<?php echo $row['transection_id']; ?>">
                            </div>
                            <!-- Payment gateway -->
                            <div class="col-3 mb-3">
                                <label for="paymentGateway" class="form-label">Payment Gateway</label>
                                <select class="form-select" aria-label="Default select example" name="payment_gateway">
                                    <option selected><?php echo $row['payment_gateway']; ?></option>
                                    <option value="Paypal">Paypal</option>
                                    <option value="Stripe">Stripe</option>
                                    <option value="Paystack">Paystack</option>
                                    <option value="Flutterwave">Flutterwave</option>
                                    <option value="Rave">Rave</option>
                                    <option value="Payoneer">Payoneer</option>
                                </select>
                            </div>
                            <!-- Payment status -->
                            <div class="col-3 mb-3">
                                <label for="paymentStatus" class="form-label">Payment Status</label>
                                <select class="form-select" aria-label="Default select example" name="payment_status">
                                    <option selected><?php echo $row['payment_status']; ?></option>
                                    <option value="paid">Paid</option>
                                    <option value="unpaid">Unpaid</option>
                                    <option value="partial">Partial</option>
                                </select>
                            </div>
                            <!-- input for receipt file -->
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="receipt" class="form-label">Receipt</label>
                                    <input class="form-control" type="file" id="receipt" name="file">
                                </div>
                            </div>

                            <!-- Remark textarea -->
                            <div class="col-12 mb-3">
                                <label for="remark" class="form-label">Remark</label>
                                <textarea class="form-control" id="remark" rows="3" name="remark"><?php echo $row['remark']; ?></textarea>
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