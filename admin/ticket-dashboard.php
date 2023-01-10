<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php'; ?>
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
                    <span class="text">Finance Dashboard</span>
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
            <?php include('./include/dash_nav.php'); ?>
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <a href="tickets.php">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="card-title">Total Tickets</h6>
                                    <p class="card-text">
                                        <?php
                                        $sql = "SELECT * FROM ticket";
                                        $result = mysqli_query($conn, $sql);
                                        $totalTicket = mysqli_num_rows($result);
                                        echo $totalTicket;
                                        ?>
                                    </p>
                                </div>
                                <div class="col-4 px-3 py-4">
                                    <!-- fontawsome ticket icon -->
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <a href="tickets.php">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="card-title">Total Pending Tickets</h6>
                                    <p class="card-text">
                                        <?php
                                        $sql = "SELECT * FROM ticket WHERE status = 'pending'";
                                        $result = mysqli_query($conn, $sql);
                                        $totalPendingTicket = mysqli_num_rows($result);
                                        echo $totalPendingTicket;
                                        ?>
                                    </p>
                                </div>
                                <div class="col-4 px-3 py-4">
                                    <!-- fontawsome ticket icon -->
                                    <i class="fas fa-ticket-alt"></i>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="card-title">High Priority Tickets</h6>
                                    <p class="card-text">
                                        <?php
                                        $sql = "SELECT * FROM ticket WHERE priority = 'high'";
                                        $result = mysqli_query($conn, $sql);
                                        $highPriorityTicket = mysqli_num_rows($result);
                                        echo $highPriorityTicket;
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
            <div class="row my-5">
                <!-- show message "To be added" -->
                <p>Other things on this page will be added soon</p>
            </div>
        </div>
    </div>
</section>
<?php
include('./include/footer.php');
?>