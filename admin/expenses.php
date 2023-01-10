<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php';
if (isset($_REQUEST['addExpenses'])) {
    // Assigning User Values to Variable
    $ItemName = $_REQUEST['item_name'];
    $Currency = $_REQUEST['currency'];
    $Price = $_REQUEST['price'];
    $PurchaseDate = $_REQUEST['purchase_date'];
    $Project = $_REQUEST['project'];
    $ExpenseCategory = $_REQUEST['expense_category'];
    $PurchasedFrom = $_REQUEST['purchased_from'];
    $file = $_FILES['bill'];
    $fileName = $_FILES['bill']['name'];
    $fileTmpName = $_FILES['bill']['tmp_name'];
    $fileSize = $_FILES['bill']['size'];
    $fileError = $_FILES['bill']['error'];
    $fileType = $_FILES['bill']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', false) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $Bill = $fileDestination;
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }

    $sql = "INSERT INTO expenses (item_name, currency, price, purchase_date, project, expense_category, purchased_from, bill) VALUES ('$ItemName', '$Currency', '$Price', '$PurchaseDate', '$Project', '$ExpenseCategory', '$PurchasedFrom', '$Bill')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Expenses Added Successfully!')</script>";
    } else {
        echo "<script>alert('Expenses Not Added!')</script>";
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

    .modal:nth-of-type(even) {
        z-index: 1052 !important;
    }

    .modal-backdrop.show:nth-of-type(even) {
        z-index: 1051 !important;
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
                    <span class="text">Expenses</span>
                </div>
                <div class="col-auto">
                    <!-- add payment modal button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExpensesModal">
                        <i class="bx bx-plus"></i>Add Expense
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
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="editExpensesModalLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editExpensesModalLabel">Edit Category Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- account details -->
                            <div class="row px-3">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM expense_category";
                                        $result = mysqli_query($conn, $sql);
                                        $sno = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $sno = $sno + 1;
                                            echo "<tr>
                                            <th scope='row'>" . $sno . "</th>
                                            <td>" . $row['category_name'] . "</td>
                                            <td><button class='btn btn-sm btn-danger delete' id=d" . $row['id'] . ">Delete</button></td>
                                        </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <?php
                                if (isset($_REQUEST['save'])) {
                                    $category = $_REQUEST['category'];
                                    $sql = "INSERT INTO `expense_category` (`category_name`) VALUES ('$category')";
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>Success!</strong> Your category has been added.
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                      </div>";
                                    }
                                }
                                ?>
                                <!-- input for category -->
                                <form action="">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="category">Category Name</label>
                                            <input type="text" class="form-control mt-2" id="category" name="category" placeholder="Enter Category Name">
                                        </div>
                                    </div>

                                    <!-- save anchor tag -->

                                    <a href="#" class="btn btn-outline-primary my-2 mx-2 col-auto" name="close">Close</a>
                                    <button type="submit" class="btn btn-primary" name="save">Save</button>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addExpensesModal" aria-labelledby="addExpensesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addExpensesModalLabel">Add Expense</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-5 py-5 ">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <!-- account details -->
                                <h5 class="mb-3">Expense Details</h5>
                                <div class="row mb-4">
                                    <!-- Item Name -->
                                    <div class="col-4 mb-3">
                                        <label for="itemName" class="form-label">Item Name</label>
                                        <input type="text" class="form-control" id="itemName" aria-describedby="itemName" name="item_name">
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
                                    <!-- price -->
                                    <div class="col-4 mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="price" aria-describedby="price" name="price">
                                    </div>

                                    <!-- purchase date -->
                                    <div class="col-4 mb-3">
                                        <label for="purchaseDate" class="form-label">Purchase Date</label>
                                        <input type="date" class="form-control" id="purchaseDate" aria-describedby="purchaseDate" name="purchase_date">
                                    </div>

                                    <!-- project -->
                                    <div class="col-4 mb-3">
                                        <label for="project" class="form-label">Project</label>
                                        <select class="form-select" name="project" aria-label="Default select example">
                                            <option selected>--</option>
                                            <?php
                                            $project = "SELECT * FROM `projects`";
                                            $project_result = mysqli_query($conn, $project);
                                            while ($project_data = mysqli_fetch_assoc($project_result)) {
                                                echo "<option value='" . $project_data['project_name'] . "'>" . $project_data['project_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Expense Category -->
                                    <div class="col-6 mb-3">
                                        <label for="expenseCategory" class="form-label">Expense Category</label>
                                        <div class="input-group">
                                            <select class="form-select" name="expense_category" aria-label="Default select example">
                                                <option selected>--</option>
                                                <?php
                                                $category = "SELECT * FROM `expense_category`";
                                                $category_result = mysqli_query($conn, $category);
                                                while ($category_data = mysqli_fetch_assoc($category_result)) {
                                                    echo "<option value='" . $category_data['category_name'] . "'>" . $category_data['category_name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <a href="#staticBackdrop" data-bs-toggle="modal" class="btn btn-outline-secondary">Add</a>
                                            <!-- <button class="btn btn-outline-secondary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add</button> -->
                                        </div>

                                    </div>
                                    <!-- Purchased From -->
                                    <div class="col-6 mb-3">
                                        <label for="purchasedFrom" class="form-label">Purchased From</label>
                                        <!-- input -->
                                        <input type="text" class="form-control" id="purchasedFrom" aria-describedby="purchasedFrom" name="purchased_from">
                                    </div>
                                    <!-- bill -->
                                    <div class="col-6 mb-3">
                                        <label for="bill" class="form-label">Bill</label>
                                        <!-- input -->
                                        <input type="file" class="form-control" id="bill" aria-describedby="bill" name="bill" value="">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="addExpenses">Submit</button>
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
                                <td><b>Purchased From</b></td>
                                <td><b>purchase Date</b></td>
                                <td><b>Status</b></td>
                                <td><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $expenses = "SELECT * FROM `expenses`";
                            $expenses_result = mysqli_query($conn, $expenses);
                            while ($expenses_data = mysqli_fetch_assoc($expenses_result)) {
                                echo "<tr>
                                <td>" . $expenses_data['id'] . "</td>
                                <td>" . $expenses_data['item_name'] . "</td>
                                <td>" . $expenses_data['price'] . "</td>
                                <td>" . $expenses_data['purchased_from'] . "</td>
                                <td>" . $expenses_data['purchase_date'] . "</td>
                                ";
                                if ($expenses_data['status'] == 'pending') {
                                    echo "<td><span class='badge bg-warning'>Pending</span></td>";
                                } elseif ($expenses_data['status'] == 'inactive') {
                                    echo "<td><span class='badge bg-danger'>Inactive</span></td>";
                                } else {
                                    echo "<td><span class='badge bg-success'>Active</span></td>";
                                }
                                echo
                                "
                                
                                <td>
                                <div class='dropdown'>
                                        <button class='btn btn-light dropdown-toggle' type='button' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-expanded='false'>
                                                <img src='./img/3.png' alt='' width='20px' height='20px' style='background-color: #0f7dff;'>
                                        </button>
                                        <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                            <li><a href='edit-expenses.php?id=" . $expenses_data['id'] . "' class='dropdown-item'>Edit</a></li>
                                            <li><a class='dropdown-item' href='edit-expenses.php?id=" . $expenses_data['id'] . "'>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>";
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