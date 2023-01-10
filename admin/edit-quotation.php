<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php';

if (isset($_REQUEST['save'])) {
    // Assigning User Values to Variable
    $id = $_REQUEST['id'];
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

    // update quotation
    $update_quotation = "UPDATE `quotation` SET `estimate_number`='$EstimateNumber',`valid_till`='$ValidTill',`currency`='$Currency',`client`='$Client',`calculate_tax`='$CalculateTax',`quotation_description`='$quotation_description',`product`='$product',`description`='$description',`quantity`='$quantity',`rate`='$rate',`tax`='$tax',`amount`='$amount',`sub_total`='$subTotal',`discount`='$discount',`total`='$Total',`note`='$note',`terms`='$terms' WHERE `id`='$id'";
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
                    <span class="text">Edit Task</span>
                </div>
                <div class="col-auto">
                    <!-- save and close button -->
                    <a type="button" class="btn btn-outline-primary" href="./tasks.php">
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
                                                <select class="form-select" name="product" aria-label="Default select example">
                                                    <option selected>--</option>
                                                    <!-- Fetch product from database -->
                                                    <?php
                                                    $product = "SELECT * FROM products";
                                                    $product_result = mysqli_query($conn, $product);
                                                    while ($product_row = mysqli_fetch_assoc($product_result)) {
                                                        $product_name = $product_row['product_name'];
                                                        echo "<option value='$product_name'>$product_name</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <textarea class="form-control" id="description" name="desc" rows="3"></textarea>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="quantity" aria-describedby="quantity" name="quantity">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="rate" aria-describedby="rate" name="rate">
                                            </td>
                                            <td>
                                                <select class="form-select" name="tax" aria-label="Default select example">
                                                    <option selected></option>
                                                    <?php
                                                    $tax = "SELECT * FROM tax";
                                                    $tax_result = mysqli_query($conn, $tax);
                                                    while ($tax_row = mysqli_fetch_assoc($tax_result)) {
                                                        echo "<option value=" . $tax_row['rate'] . ">" . $tax_row['tax_name'] . "" . $tax_row['rate'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="amount" aria-describedby="amount" name="amount">
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
                                                    <input type="text" class="form-control" id="subTotal" aria-describedby="subTotal" name="sub_total">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="tax" aria-describedby="tax" name="tax">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="discount" aria-describedby="discount" name="discount">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="total" aria-describedby="total" name="total">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Note for recipient -->
                            <div class="col-6 mb-3">
                                <label for="note" class="form-label">Note for Recipient</label>
                                <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                            </div>
                            <!-- Term and Conditions with palceholder -->
                            <div class="col-6 mb-3">
                                <label for="terms" class="form-label">Terms and Conditions</label>
                                <textarea class="form-control" name="terms" id="terms" rows="3"></textarea>
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