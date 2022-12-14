<?php include_once './include/dbconnect.php'; ?>
<?php include_once './include/header.php'; ?>
<?php include_once './include/sidebar.php'; ?>
<?php
if (isset($_REQUEST['addTicket'])){
    $requester = $_REQUEST['requester'];
    $client = $_REQUEST['client'];
    $subject = $_REQUEST['subject'];
    $description = $_REQUEST['description'];
    
    $sql = "INSERT INTO `ticket`(`requester`, `requester_name`, `requested_on`,`subject`, `description`) VALUES ('$requester', '$client', NOW(),'$subject', '$description')";
    $result = mysqli_query($conn, $sql);
    if ($result){
        echo "<script>alert('Ticket added successfully');</script>";
    }else{
        echo "<script>alert('Ticket not added');</script>";
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
                    <span class="text">Tickets</span>
                </div>
                <div class="col-auto">
                    <!-- add Services modal button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTicketModal">
                        <i class="bx bx-plus"></i>Create Ticket
                    </button>
                    <!-- Ticket form outline button -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createTicketModal">
                        <i class="bx bx-plus"></i>Ticket Form
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
            <div class="modal fade" id="createTicketModal" tabindex="-1" aria-labelledby="createTicketModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createTicketModalLabel">Create Ticket</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-5 py-5 ">
                            <form>
                                <!-- account details -->
                                <h5 class="mb-3">Ticket Details</h5>
                                <div class="row mb-4">
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
                                            <option selected>--</option>
                                            <?php
                                            $sql = "SELECT * FROM clients";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)){
                                                echo "<option value='".$row['client_name']."'>".$row['client_name']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Ticket subject -->
                                    <div class="col-12 mb-3">
                                        <label for="subject" class="form-label">Subject</label>
                                        <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
                                    </div>
                                    <!-- Ticket description -->
                                    <div class="col-12 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="addTicket">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of modal -->
            <div class="row my-4 mx-3">
                <!-- ticket dashboard total, open, closed, pending, resolved tickets -->
                <!-- total ticket -->
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="card-title">Total Tickets</h6>
                                    <p class="card-text">
                                        <?php
                                        $sql = "SELECT * FROM ticket";
                                        $result = mysqli_query($conn, $sql);
                                        $totalTickets = mysqli_num_rows($result);
                                        echo $totalTickets;
                                        ?>
                                    </p>
                                </div>
                                <div class="col-4 px-3 py-4">
                                    <!-- fontawsome ticket icon -->
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- open tickets -->
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="card-title">Open Tickets</h6>
                                    <p class="card-text">
                                        <?php
                                        $sql = "SELECT * FROM ticket WHERE `status` = 'open'";
                                        $result = mysqli_query($conn, $sql);
                                        $openTickets = mysqli_num_rows($result);
                                        echo $openTickets;
                                        ?>
                                    </p>
                                </div>
                                <div class="col-4 px-3 py-4">
                                    <!-- fontawsome ticket icon -->
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- closed tickets -->
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="card-title">Closed Tickets</h6>
                                    <p class="card-text">
                                        <?php
                                        $sql = "SELECT * FROM ticket WHERE `status` = 'closed'";
                                        $result = mysqli_query($conn, $sql);
                                        $closedTickets = mysqli_num_rows($result);
                                        echo $closedTickets;
                                        ?>
                                    </p>
                                </div>
                                <div class="col-4 px-3 py-4">
                                    <!-- fontawsome ticket icon -->
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pending tickets -->
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="card-title">Pending Tickets</h6>
                                    <p class="card-text">
                                        <?php
                                        $sql = "SELECT * FROM ticket WHERE `status` = 'pending'";
                                        $result = mysqli_query($conn, $sql);
                                        $pendingTickets = mysqli_num_rows($result);
                                        echo $pendingTickets;
                                        ?>
                                    </p>
                                </div>
                                <div class="col-4 px-3 py-4">
                                    <!-- fontawsome ticket icon -->
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- resolved tickets -->
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="card-title">Resolved Tickets</h6>
                                    <p class="card-text">
                                        <?php
                                        $sql = "SELECT * FROM ticket WHERE `status` = 'resolved'";
                                        $result = mysqli_query($conn, $sql);
                                        $resolvedTickets = mysqli_num_rows($result);
                                        echo $resolvedTickets;
                                        ?>
                                    </p>
                                </div>
                                <div class="col-4 px-3 py-4">
                                    <!-- fontawsome ticket icon -->
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                            </div>
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
                                <td><b>Ticket</b></td>
                                <td><b>Ticket Subject</b></td>
                                <td><b>Requester Name</b></td>
                                <td><b>Request On</b></td>
                                <td><b>Status</b></td>
                                <td><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM ticket";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)){
                                $ticket_id = $row['id'];
                                $ticket_subject = $row['subject'];
                                $requester_name = $row['requester_name'];
                                $request_on = $row['requested_on'];
                                $status = $row['status'];
                                echo "<tr>
                                <td>".$ticket_id."</td>
                                <td>".$ticket_subject."</td>
                                <td>".$requester_name."</td>
                                <td>".$request_on."</td>
                                <td>";
                                if ($status == 'open') {
                                    echo "<span class='badge bg-success'>".$status."</span>";
                                }elseif ($status == 'closed') {
                                    echo "<span class='badge bg-danger'>".$status."</span>";
                                }elseif ($status == 'pending') {
                                    echo "<span class='badge bg-warning'>".$status."</span>";
                                }elseif ($status == 'resolved') {
                                    echo "<span class='badge bg-info'>".$status."</span>";
                                }
                                else {
                                    echo "<span class='badge bg-secondary'>".$status."</span>";
                                }
                                echo
                                "</td>
                                <td>
                                <div class='dropdown'>
                                        <button class='btn btn-light dropdown-toggle' type='button' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-expanded='false'>
                                                <img src='./img/3.png' alt='' width='20px' height='20px' style='background-color: #0f7dff;'>
                                        </button>
                                        <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                            <li><a href='edit-ticket.php?id=".$ticket_id."' class='dropdown-item'>Edit</a></li>
                                            <li><a class='dropdown-item' href='edit-expenses.php?id='>Delete</a></li>
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