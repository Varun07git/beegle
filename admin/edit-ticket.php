<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php';

if (isset($_REQUEST['editTicket'])) {
    $id = $_REQUEST['id'];
    // $requester = $_REQUEST['requester'];
    $client = $_REQUEST['client'];
    $status = $_REQUEST['status'];
    $priority = $_REQUEST['priority'];
    $assignedTo = $_REQUEST['assignedTo'];
    $subject = $_REQUEST['subject'];
    $description = $_REQUEST['description'];
    

    $sql = "UPDATE ticket SET `requester_name` = '$client', `status` = '$status', priority = '$priority', assigned_to = '$assignedTo', `subject` = '$subject', description = '$description' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Ticket Updated Successfully!')</script>";
    } else {
        echo "<script>alert('Ticket Not Updated!')</script>";
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
                    <span class="text">Edit Ticket</span>
                </div>
                <div class="col-auto">
                    <!-- save and close button -->
                    <a type="button" class="btn btn-outline-primary" href="./tickets.php">
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
                        <h5 class="mb-3">Ticket Details</h5>
                        <div class="row mb-4">
                            <?php
                            if (isset($_REQUEST['id'])) {
                                $id = $_REQUEST['id'];
                                $sql2 = "SELECT * FROM ticket WHERE id = '$id'";
                                $result2 = mysqli_query($conn, $sql2);
                                $row2= mysqli_fetch_assoc($result2);
                            }
                            ?>
                            <!-- hidden input for id -->
                            <input type="hidden" name="id" value="<?php echo $row2['id']; ?>">
                            <!-- requester client or employee  -->
                            <div class="col-auto mb-3">
                                <label for="requester" class="form-label">Requester</label>
                                <!-- checkbox of two options -->
                                <div class="row">
                                    <div class="col form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="requester" id="requesterClient" value="client">
                                        <label class="form-check label" for="requesterClient">Client</label>
                                    </div>
                                    <div class="col form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="requester" id="requesterEmployee" value="employee">
                                        <label class="form-check label" for="requesterEmployee">Employee</label>
                                    </div>
                                </div>
                            </div>
                            <!-- requester -->
                            <div class="col-4 mb-3">
                                <label for="requester" class="form-label">Requester</label>
                                <select class="form-select" name="client" aria-label="Default select example">
                                    <option selected><?php echo $row2['requester_name'];?></option>
                                    <?php
                                    $sql = "SELECT * FROM clients";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['client_name'] . "'>" . $row['client_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- status -->
                            <div class="col-auto mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option selected><?php echo $row2['status'];?></option>
                                    <option value="open">Open</option>
                                    <option value="pending">Pending</option>
                                    <option value="suspended">Suspended</option>
                                    <option value="hold">Resolved</option>
                                    <option value="closed">Closed</option>
                                </select>
                            </div>
                            <!-- priority -->
                            <div class="col-auto mb-3">
                                <label for="priority" class="form-label">Priority</label>
                                <select class="form-select" name="priority" aria-label="Default select example">
                                    <option selected><?php echo $row2['priority'];?></option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                            <!-- Assigned to -->
                            <div class="col-4 mb-3">
                                <label for="assignedTo" class="form-label">Assigned To</label>
                                <select class="form-select" name="assignedTo" aria-label="Default select example">
                                    <option selected><?php echo $row2['assigned_to'];?></option>
                                    <?php
                                   # $sql = "SELECT * FROM employees";
                                   # $result = mysqli_query($conn, $sql);
                                   # while ($row = mysqli_fetch_assoc($result)) {
                                   #     echo "<option value='" . $row['employee_name'] . "'>" . $row['employee_name'] . "</option>";
                                    #}
                                    ?>
                                </select>
                            </div>
                            <!-- Ticket subject -->
                            <div class="col-12 mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject" value="<?php echo $row2['subject'];?>">
                            </div>
                            <!-- Ticket description -->
                            <div class="col-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"><?php echo $row2['description'];?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="editTicket">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('./include/footer.php');
?>