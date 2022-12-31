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
                            <form>
                                <!-- account details -->
                                <h5 class="mb-3">Service/Product Details</h5>
                                    <div class="row mb-4">
                                        <!-- service name -->
                                        <div class="col-4 mb-3">
                                            <label for="serviceName" class="form-label">Service Name</label>
                                            <input type="text" class="form-control" id="serviceName" aria-describedby="serviceName">
                                        </div>
                                        <!-- service price -->
                                        <div class="col-4 mb-3">
                                            <label for="servicePrice" class="form-label">Service Price</label>
                                            <input type="text" class="form-control" id="servicePrice" aria-describedby="servicePrice">
                                        </div>
                                        <!-- service category -->
                                        <div class="col-4 mb-3">
                                            <label for="serviceCategory" class="form-label">Service Category</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>--</option>
                                                <option value="1">Hosting</option>
                                                <option value="2">Domain</option>
                                                <option value="3">SSL</option>
                                                <option value="4">Email</option>
                                                <option value="5">VPN</option>
                                                <option value="6">Server</option>
                                                <option value="7">Software</option>
                                                <option value="8">Other</option>
                                            </select>
                                        </div>
                                        <!-- service sub category -->
                                        <div class="col-4 mb-3">
                                            <label for="serviceSubCategory" class="form-label">Service Sub Category</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>--</option>
                                                <option value="1">Shared Hosting</option>
                                                <option value="2">Reseller Hosting</option>
                                                <option value="3">VPS Hosting</option>
                                                <option value="4">Dedicated Hosting</option>
                                                <option value="5">Cloud Hosting</option>
                                                <option value="6">WordPress Hosting</option>
                                                <option value="7">Other</option>
                                            </select>
                                        </div>
                                        <!-- tax -->
                                        <div class="col-4 mb-3">
                                            <label for="tax" class="form-label">Tax</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>--</option>
                                                <option value="1">GST: 0%</option>
                                                <option value="2">GST: 5%</option>
                                                <option value="3">GST: 12%</option>
                                                <option value="4">GST: 18%</option>
                                                <option value="4">IGST: 18%</option>
                                            </select>
                                        </div>
                                        <!-- Hsn/Sac -->
                                        <div class="col-4 mb-3">
                                            <label for="hsnSac" class="form-label">HSN/SAC</label>
                                            <input type="text" class="form-control" id="hsnSac" aria-describedby="hsnSac">
                                        </div>
                                        <!-- Client can purchase -->
                                        <div class="col-4 mb-3">
                                            <label for="clientCanPurchase" class="form-label">Client can purchase</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>--</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <!-- Downloadable -->
                                        <div class="col-4 mb-3">
                                            <label for="downloadable" class="form-label">Downloadable</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>--</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <!-- Description -->
                                        <div class="col-12 mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" rows="3"></textarea>
                                        </div>
                                        <!-- Add files -->
                                        <div class="col-12 mb-3">
                                            <label for="addFiles" class="form-label">Add Files</label>
                                            <input class="form-control" type="file" id="addFiles">
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
                                <!-- logo -->
                                <td><b>Product image</b></td>
                                <td><b>Product Name</b></td>
                                <td><b>Product Description</b></td>
                                <td><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img src="../admin/img/27.png" alt="" class="img-fluid" style="width: 50px;"></td>
                                <td>Product 1</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><img src="../admin/img/28.png" alt="" class="img-fluid" style="width: 50px;"></td>
                                <td>Product 2</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><img src="../admin/img/30.png" alt="" class="img-fluid" style="width: 50px;"></td>
                                <td>Product 3</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><img src="../admin/img/31.png" alt="" class="img-fluid" style="width: 50px;"></td>
                                <td>Product 4</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
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