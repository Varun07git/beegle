<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php';

if (isset($_REQUEST['save'])) {
    // Assigning User Values to Variable
    $id = $_REQUEST['id'];
    $ItemName = $_REQUEST['item_name'];
    $Currency = $_REQUEST['currency'];
    $Price = $_REQUEST['price'];
    $PurchaseDate = $_REQUEST['purchase_date'];
    $Project = $_REQUEST['project'];
    $ExpenseCategory = $_REQUEST['expense_category'];
    $PurchasedFrom = $_REQUEST['purchased_from'];
    $Status = $_REQUEST['status'];
    // upload bill only if selected 
    if ($_FILES['bill']['name'] != "") {
        $Bill = $_FILES['bill']['name'];
        $Bill_tmp = $_FILES['bill']['tmp_name'];
        move_uploaded_file($Bill_tmp, "./assets/img/bills/$Bill");
        // update query
        $sql = "UPDATE `expenses` SET `item_name` = '$ItemName', `currency` = '$Currency', `price` = '$Price', `purchase_date` = '$PurchaseDate', `project` = '$Project', `expense_category` = '$ExpenseCategory', `purchased_from` = '$PurchasedFrom', `bill` = '$Bill', `status` = '$Status' WHERE `id` = '$id'";
    } else {
        // update query
        $sql = "UPDATE `expenses` SET `item_name` = '$ItemName', `currency` = '$Currency', `price` = '$Price', `purchase_date` = '$PurchaseDate', `project` = '$Project', `expense_category` = '$ExpenseCategory', `purchased_from` = '$PurchasedFrom', `status` = '$Status' WHERE `id` = '$id'";
    }
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Expense Updated Successfully!')</script>";
    } else {
        echo "<script>alert('Something Went Wrong!')</script>";
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
                    <span class="text">Edit Task</span>
                </div>
                <div class="col-auto">
                    <!-- save and close button -->
                    <a type="button" class="btn btn-outline-primary" href="./expenses.php">
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        <!-- account details -->
                        <h5 class="mb-3">Expense Details</h5>
                        <div class="row mb-4">
                            <?php
                            if (isset($_REQUEST['id'])) {
                                $id = $_REQUEST['id'];
                                $sql = "SELECT * FROM `expenses` WHERE `id` = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $data = mysqli_fetch_assoc($result);
                            }
                            ?>
                            <!-- Item Name -->
                            <div class="col-4 mb-3">
                                <label for="itemName" class="form-label">Item Name</label>
                                <input type="text" class="form-control" id="itemName" aria-describedby="itemName" name="item_name" value="<?php echo $data['item_name'];?>">
                            </div>
                            <!-- currency -->
                            <div class="col-4 mb-3">
                                <label for="currency" class="form-label">Currency</label>
                                <select class="form-select" name="currency" aria-label="Default select example">
                                    <option selected><?php echo $data['currency'];?></option>
                                    <?php
                                    $currency = "SELECT * FROM `currency`";
                                    $currency_result = mysqli_query($conn, $currency);
                                    while ($currency_data = mysqli_fetch_assoc($currency_result)) {
                                        echo "<option value='" . $currency_data['currency_name'] . "'>" . $currency_data['currency_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- price -->
                            <div class="col-4 mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" aria-describedby="price" name="price" value="<?php echo $data['price'];?>">
                            </div>

                            <!-- purchase date -->
                            <div class="col-4 mb-3">
                                <label for="purchaseDate" class="form-label">Purchase Date</label>
                                <input type="date" class="form-control" id="purchaseDate" aria-describedby="purchaseDate" name="purchase_date" value="<?php echo $data['purchase_date'];?>">
                            </div>
                            
                            <!-- project -->
                            <div class="col-4 mb-3">
                                <label for="project" class="form-label">Project</label>
                                <select class="form-select" name="project" aria-label="Default select example">
                                    <option selected><?php echo $data['project'];?></option>
                                    <?php
                                    $project = "SELECT * FROM `projects`";
                                    $project_result = mysqli_query($conn, $project);
                                    while ($project_data = mysqli_fetch_assoc($project_result)) {
                                        echo "<option value='" . $project_data['project_name'] . "'>" . $project_data['project_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- status -->
                            <div class="col-4 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option selected><?php echo $data['status'] ; ?></option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                            <!-- Expense Category -->
                            <div class="col-6 mb-3">
                                <label for="expenseCategory" class="form-label">Expense Category</label>
                                <select class="form-select" name="expense_category" aria-label="Default select example">
                                    <option selected><?php echo $data['expense_category'];?></option>
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
                                <input type="text" class="form-control" id="purchasedFrom" aria-describedby="purchasedFrom" name="purchased_from" value="<?php echo $data['purchased_from'];?>">
                            </div>
                            <!-- bill -->
                            <div class="col-6 mb-3">
                                <label for="bill" class="form-label">Bill</label>
                                <!-- input -->
                                <input type="file" class="form-control" id="bill" aria-describedby="bill" name="bill" value=" value="<?php echo $data['bill'];?>>
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