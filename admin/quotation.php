<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php';
if (isset($_REQUEST['addQuotation'])) {
    $EstimateNumber = $_REQUEST['estimate_number'];
    $ValidTill = $_REQUEST['valid_till'];
    $Currency = $_REQUEST['currency'];
    $Client = $_REQUEST['client'];
    $CalculateTax = $_REQUEST['calculate_tax'];
    $quotation_description = $_REQUEST['quotation_description'];
    $product = $_REQUEST['product'];
    $description = $_REQUEST['desc'];
    $quantity = $_REQUEST['quantity'];
    $rate = $_REQUEST['rate'];
    $tax = $_REQUEST['tax'];
    $amount = $_REQUEST['amount'];
    $subTotal = $_REQUEST['sub_total'];
    $discount = $_REQUEST['discount'];
    $Total = $_REQUEST['total'];
    $note = $_REQUEST['note'];
    $terms = $_REQUEST['terms'];

    $sql = "INSERT INTO `quotation`(`estimate_number`, `valid_till`, `currency`, `client`, `calculate_tax`, `quotation_description`, `product`, `description`, `quantity`, `rate`, `tax`, `amount`, `sub_total`, `discount`, `total`, `note`, `terms`) VALUES ('$EstimateNumber','$ValidTill','$Currency','$Client','$CalculateTax','$quotation_description','$product','$description','$quantity','$rate','$tax','$amount','$subTotal','$discount','$Total','$note','$terms')";
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
                    <span class="text">Quotation</span>
                </div>
                <div class="col-auto">
                    <!-- create quotation modal button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createQuotationModal">
                        Create Quotation
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
            <div class="modal fade" id="createQuotationModal" tabindex="-1" aria-labelledby="createQuotationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createQuotationModalLabel">Quotation Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-5 py-5 ">
                            <form>
                                <!-- account details -->
                                <div class="row mb-4">
                                    <!-- Estimate Number -->
                                    <div class="col-4 mb-3">
                                        <label for="estimateNumber" class="form-label">Estimate Number</label>
                                        <input type="text" class="form-control" id="estimateNumber" name="estimate_number" aria-describedby="estimateNumber">
                                    </div>
                                    <!-- valid till -->
                                    <div class="col-4 mb-3">
                                        <label for="validTill" class="form-label">Valid Till</label>
                                        <input type="date" class="form-control" id="validTill" name="valid_till" aria-describedby="validTill">
                                    </div>
                                    <!-- currency -->
                                    <div class="col-4 mb-3">
                                        <label for="currency" class="form-label">Currency</label>
                                        <select class="form-select" name="currency" aria-label="Default select example">
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
                                    <!-- client -->
                                    <div class="col-4 mb-3">
                                        <label for="client" class="form-label">Client</label>
                                        <select class="form-select" name="client" aria-label="Default select example">
                                            <option selected>--</option>
                                            <?php
                                            $client = "SELECT * FROM `clients`";
                                            $client_result = mysqli_query($conn, $client);
                                            while ($client_data = mysqli_fetch_assoc($client_result)) {
                                                echo "<option value='" . $client_data['client_name'] . "'>" . $client_data['client_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- calculate tax -->
                                    <div class="col-4 mb-3">
                                        <label for="calculateTax" class="form-label"></label>
                                        <select class="form-select" name="calculate_tax" aria-label="Default select example">
                                            <option selected>--</option>
                                            <option value="1">After Discount</option>
                                            <option value="2">Before Discount</option>
                                        </select>
                                    </div>
                                    <!-- description textarea -->
                                    <div class="col-12 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="quotation_description" id="description" rows="3"></textarea>
                                    </div>
                                    <!-- Description table with input fields -->
                                    <div class="col-12 mb-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Qty/Hrs</th>
                                                    <th scope="col">Unit Price</th>
                                                    <th scope="col">Tax</th>
                                                    <th scope="col">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>--</option>
                                                            <?php 
                                                            $product = "SELECT * FROM `products`";
                                                            $product_result = mysqli_query($conn, $product);
                                                            while ($product_data = mysqli_fetch_assoc($product_result)) {
                                                                echo "<option value='" . $product_data['product_name'] . "'>" . $product_data['product_name'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control" id="description" rows="3"></textarea>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="quantity" aria-describedby="quantity">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="rate" name="rate" aria-describedby="rate">
                                                    </td>
                                                    <td>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>--</option>
                                                            <?php
                                                            $tax = "SELECT * FROM tax";
                                                            $tax_result = mysqli_query($conn, $tax);
                                                            while ($tax_row = mysqli_fetch_assoc($tax_result)) {
                                                                echo "<option value=" . $tax_row['rate'] . ">" . $tax_row['tax_name'] . " " . $tax_row['rate'] . "%</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="amount" aria-describedby="amount">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- add row button -->
                                    <div class="col-12 mb-3">
                                        <button type="button" class="btn btn-primary">Add Row</button>
                                    </div>
                                    <!-- total amount inline inputs-->

                                    <div class="row justify-content-end">
                                        <div class="col-6 mb-3">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Sub Total</th>
                                                        <th scope="col">Tax</th>
                                                        <th scope="col">Discount</th>
                                                        <th scope="col">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control" id="subTotal" aria-describedby="subTotal">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" id="tax" aria-describedby="tax">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" id="discount" aria-describedby="discount">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" id="total" aria-describedby="total">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Note for recipient -->
                                    <div class="col-6 mb-3">
                                        <label for="note" class="form-label">Note for Recipient</label>
                                        <textarea class="form-control" id="note" rows="3"></textarea>
                                    </div>
                                    <!-- Term and Conditions with palceholder -->
                                    <div class="col-6 mb-3">
                                        <label for="terms" class="form-label">Terms and Conditions</label>
                                        <textarea class="form-control" id="terms" rows="3"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="addQuotation">Submit</button>
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
                                <td><b>Quotation</b></td>
                                <td><b>Client</b></td>
                                <td><b>Total</b></td>
                                <td><b>Valid till</b></td>
                                <td><b>Created</b></td>
                                <td><b>Status</b></td>
                                <td><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Quotation 1</td>
                                <td>Client 1</td>
                                <td>1000</td>
                                <td>2021-01-01</td>
                                <td>2021-01-01</td>
                                <td>Open</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">View</a>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-primary btn-sm">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Quotation 2</td>
                                <td>Client 2</td>
                                <td>2000</td>
                                <td>2021-01-01</td>
                                <td>2021-01-01</td>
                                <td>Open</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">View</a>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-primary btn-sm">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Quotation 3</td>
                                <td>Client 3</td>
                                <td>3000</td>
                                <td>2021-01-01</td>
                                <td>2021-01-01</td>
                                <td>Open</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">View</a>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-primary btn-sm">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Quotation 4</td>
                                <td>Client 4</td>
                                <td>4000</td>
                                <td>2021-01-01</td>
                                <td>2021-01-01</td>
                                <td>Open</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">View</a>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-primary btn-sm">Delete</a>
                                </td>
                            </tr>
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