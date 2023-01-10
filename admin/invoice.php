<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php';

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
                    <span class="text">Invoices</span>
                </div>
                <div class="col-auto">
                    <!-- create quotation modal button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createInvoiceModal">
                        Create Invoice
                    </button>
                </div>
                <!-- Recurring Invoice outline button -->
                <div class="col-auto">
                    <button type="button" class="btn btn-outline-primary">
                        <i class='bx bx-redo'></i>Recurring Invoice
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
            <div class="modal fade" id="createInvoiceModal" tabindex="-1" aria-labelledby="createInvoiceModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createInvoiceModalLabel">Invoice Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-5 py-5 ">
                            <form>
                                <!-- account details -->
                                <div class="row mb-4">
                                    <!-- Invoice Number -->
                                    <div class="col-3 mb-3">
                                        <label for="invoiceNumber" class="form-label">Invoice Number</label>
                                        <input type="text" class="form-control" id="invoiceNumber" aria-describedby="invoiceNumber">
                                    </div>
                                    <!-- Invoice Date -->
                                    <div class="col-3 mb-3">
                                        <label for="invoiceDate" class="form-label">Invoice Date</label>
                                        <input type="date" class="form-control" id="invoiceDate" aria-describedby="invoiceDate">
                                    </div>
                                    <!-- Due Date -->
                                    <div class="col-3 mb-3">
                                        <label for="dueDate" class="form-label">Due Date</label>
                                        <input type="date" class="form-control" id="dueDate" aria-describedby="dueDate">
                                    </div>
                                    <!-- currency -->
                                    <div class="col-3 mb-3">
                                        <label for="currency" class="form-label">Currency</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>--</option>
                                            <option value="1">USD</option>
                                            <option value="2">EUR</option>
                                            <option value="3">GBP</option>
                                            <option value="4">INR</option>
                                            <option value="5">AUD</option>
                                            <option value="6">CAD</option>
                                        </select>
                                    </div>
                                    <!-- client -->
                                    <div class="col-4 mb-3">
                                        <label for="client" class="form-label">Client</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>--</option>
                                            <option value="1">Client 1</option>
                                            <option value="2">Client 2</option>
                                            <option value="3">Client 3</option>
                                            <option value="4">Client 4</option>
                                            <option value="5">Client 5</option>
                                            <option value="6">Client 6</option>
                                        </select>
                                    </div>
                                    <!-- project -->
                                    <div class="col-4 mb-3">
                                        <label for="project" class="form-label">Project</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>--</option>
                                            <option value="1">Project 1</option>
                                            <option value="2">Project 2</option>
                                            <option value="3">Project 3</option>
                                            <option value="4">Project 4</option>
                                            <option value="5">Project 5</option>
                                            <option value="6">Project 6</option>
                                        </select>
                                    </div>
                                    <!-- calculate Tax -->
                                    <div class="col-4 mb-3">
                                        <label for="calculateTax" class="form-label">Calculate Tax</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>--</option>
                                            <option value="1">After Tax</option>
                                            <option value="2">Before Tax</option>
                                        </select>
                                    </div>
                                    <!-- Billing address -->
                                    <div class="col-6 mb-3">
                                        <label for="billingAddress" class="form-label">Billing Address</label>
                                        <textarea class="form-control" id="billingAddress" rows="3"></textarea>
                                    </div>
                                    <!-- Shipping address -->
                                    <div class="col-6 mb-3">
                                        <label for="shippingAddress" class="form-label">Shipping Address</label>
                                        <textarea class="form-control" id="shippingAddress" rows="3"></textarea>
                                    </div>
                                    <!-- Generated By -->
                                    <div class="col-6 mb-3">
                                        <label for="generatedBy" class="form-label">Generated By</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>--</option>
                                            <option value="1">User 1</option>
                                            <option value="2">User 2</option>
                                            <option value="3">User 3</option>
                                            <option value="4">User 4</option>
                                            <option value="5">User 5</option>
                                            <option value="6">User 6</option>
                                        </select>
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
                                                            <option value="1">Product 1</option>
                                                            <option value="2">Product 2</option>
                                                            <option value="3">Product 3</option>
                                                            <option value="4">Product 4</option>
                                                            <option value="5">Product 5</option>
                                                            <option value="6">Product 6</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control" id="description" rows="3"></textarea>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="quantity" aria-describedby="quantity">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="rate" aria-describedby="rate">
                                                    </td>
                                                    <td>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>--</option>
                                                            <option value="1">Tax 1</option>
                                                            <option value="2">Tax 2</option>
                                                            <option value="3">Tax 3</option>
                                                            <option value="4">Tax 4</option>
                                                            <option value="5">Tax 5</option>
                                                            <option value="6">Tax 6</option>
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
                                    <!-- total amount -->
                                    <div class="col-12 mb-3">
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
                                <button type="submit" class="btn btn-primary">Submit</button>
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
                                <td><b>Code</b></td>
                                <td><b>Invoice</b></td>
                                <td><b>Project</b></td>
                                <td><b>Client</b></td>
                                <td><b>Created</b></td>
                                <td><b>Total</b></td>
                                <td><b>Invoice Date</b></td>
                                <td><b>Status</b></td>
                                <td><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>INV-0001</td>
                                <td>Invoice 1</td>
                                <td>Project 1</td>
                                <td>Client 1</td>
                                <td>12/12/2020</td>
                                <td>1000</td>
                                <td>12/12/2020</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>
                                    <div class='dropdown'>
                                        <button class='btn btn-light dropdown-toggle' type='button' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-expanded='false'>
                                            <img src='./img/3.png' alt='' width='20px' height='20px' style='background-color: #0f7dff;'>
                                        </button>
                                        <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                            <li><a href="edit-expenses.php?id=" class='dropdown-item'>Edit</a></li>
                                            <li><a class='dropdown-item' href="edit-expenses.php?id=">Delete</a></li>
                                        </ul>
                                    </div>
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