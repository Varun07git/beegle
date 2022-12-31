<?php include_once './include/header.php'; ?>
<?php include_once './include/sidebar.php'; ?>
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
                                        <!-- Invoice -->
                                        <div class="col-4 mb-3">
                                            <label for="invoice" class="form-label">Invoice</label>
                                            <select class="form-select" aria-label="Default select example">
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
                                            <input type="date" class="form-control" id="paidOn" aria-describedby="paidOn">
                                        </div>
                                        <!-- amount -->
                                        <div class="col-3 mb-3">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="text" class="form-control" id="amount" aria-describedby="amount">
                                        </div>
                                        <!-- currency -->
                                        <div class="col-3 mb-3">
                                            <label for="currency" class="form-label">Currency</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>--</option>
                                                <option value="1">USD</option>
                                                <option value="2">EUR</option>
                                                <option value="3">GBP</option>
                                                <option value="4">AUD</option>
                                                <option value="5">CAD</option>
                                                <option value="6">NZD</option>
                                            </select>
                                        </div>
                                        <!-- Transection Id -->
                                        <div class="col-3 mb-3">
                                            <label for="transectionId" class="form-label">Transection Id</label>
                                            <input type="text" class="form-control" id="transectionId" aria-describedby="transectionId">
                                        </div>
                                        <!-- Payment gateway -->
                                        <div class="col-3 mb-3">
                                            <label for="paymentGateway" class="form-label">Payment Gateway</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>--</option>
                                                <option value="1">Paypal</option>
                                                <option value="2">Stripe</option>
                                                <option value="3">Paystack</option>
                                                <option value="4">Flutterwave</option>
                                                <option value="5">Rave</option>
                                                <option value="6">Payoneer</option>
                                            </select>
                                        </div>
                                        <!-- receipt -->
                                        <div class="col-6 mb-3">
                                            <label for="receipt" class="form-label">Receipt</label>
                                            <input type="file" class="form-control" id="receipt" aria-describedby="receipt">
                                        </div>
                                        <!-- Remark textarea -->
                                        <div class="col-12 mb-3">
                                            <label for="remark" class="form-label">Remark</label>
                                            <textarea class="form-control" id="remark" rows="3"></textarea>
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
                                <td><b>Id</b></td>
                                <td><b>Code</b></td>
                                <td><b>Project</b></td>
                                <td><b>Invoice</b></td>
                                <td><b>Order</b></td>
                                <td><b>Amount</b></td>
                                <td><b>Paid On</b></td>
                                <td><b>Status</b></td>
                                <td><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>123456</td>
                                <td>Project 1</td>
                                <td>Invoice 1</td>
                                <td>Order 1</td>
                                <td>1000</td>
                                <td>2021-01-01</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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