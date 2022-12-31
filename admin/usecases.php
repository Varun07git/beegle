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
                    <span class="text">Use Cases</span>
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
            <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addServiceModalLabel">Add Expense</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-5 py-5 ">
                            <form>
                                <!-- account details -->
                                <h5 class="mb-3">Expense Details</h5>
                                    <div class="row mb-4">
                                        <!-- Item Name -->
                                        <div class="col-4 mb-3">
                                            <label for="itemName" class="form-label">Item Name</label>
                                            <input type="text" class="form-control" id="itemName" aria-describedby="itemName">
                                        </div>
                                        <!-- currency -->
                                        <div class="col-4 mb-3">
                                            <label for="currency" class="form-label">Currency</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>--</option>
                                                <option value="1">USD</option>
                                                <option value="2">EUR</option>
                                                <option value="3">GBP</option>
                                                <option value="4">AUD</option>
                                                <option value="5">CAD</option>
                                                <option value="6">CHF</option>
                                            </select>
                                        </div>
                                        <!-- price -->
                                        <div class="col-4 mb-3">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="text" class="form-control" id="price" aria-describedby="price">
                                        </div>

                                        <!-- purchase date -->
                                        <div class="col-4 mb-3">
                                            <label for="purchaseDate" class="form-label">Purchase Date</label>
                                            <input type="date" class="form-control" id="purchaseDate" aria-describedby="purchaseDate">
                                        </div>
                                        <!-- employee -->
                                        <div class="col-4 mb-3">
                                            <label for="employee" class="form-label">Employee</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>--</option>
                                                <option value="1">Employee 1</option>
                                                <option value="2">Employee 2</option>
                                                <option value="3">Employee 3</option>
                                                <option value="4">Employee 4</option>
                                                <option value="5">Employee 5</option>
                                                <option value="6">Employee 6</option>
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
                                        <!-- Expense Category -->
                                        <div class="col-6 mb-3">
                                            <label for="expenseCategory" class="form-label">Expense Category</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>--</option>
                                                <option value="1">Category 1</option>
                                                <option value="2">Category 2</option>
                                                <option value="3">Category 3</option>
                                                <option value="4">Category 4</option>
                                                <option value="5">Category 5</option>
                                                <option value="6">Category 6</option>
                                            </select>
                                        </div>
                                        <!-- Purchased From -->
                                        <div class="col-6 mb-3">
                                            <label for="purchasedFrom" class="form-label">Purchased From</label>
                                            <!-- input -->
                                            <input type="text" class="form-control" id="purchasedFrom" aria-describedby="purchasedFrom">
                                        </div>
                                        <!-- bill -->
                                        <div class="col-6 mb-3">
                                            <label for="bill" class="form-label">Bill</label>
                                            <!-- input -->
                                            <input type="file" class="form-control" id="bill" aria-describedby="bill">
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
                                <td><b>Item Name</b></td>
                                <td><b>Price</b></td>
                                <td><b>Employee</b></td>
                                <td><b>Purchased From</b></td>
                                <td><b>purchase Date</b></td>
                                <td><b>Status</b></td>
                                <td><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Item 1</td>
                                <td>100</td>
                                <td>Employee 1</td>
                                <td>Supplier 1</td>
                                <td>2021-01-01</td>
                                <td>
                                    <span class="badge bg-success">Approved</span>
                                </td>
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