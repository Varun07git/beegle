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
    .box{
        width: 100%;
        height: 20rem;
        background: #fff;
        border-radius: 5px;
        padding: 15px;
        box-sizing: border-box;
        box-shadow: 0 5px 25px rgba(0,0,0,.05);
        transition: .3s;
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
                    <span class="text">Dashboard</span>
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
                        <a href="clients.php">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class="card-title">Total Clients</h6>
                                        <p class="card-text">
                                            <?php
                                            $sql = "SELECT * FROM clients";
                                            $result = mysqli_query($conn, $sql);
                                            $totalClients = mysqli_num_rows($result);
                                            echo $totalClients;
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-4 px-3 py-4">
                                        <!-- fontawsome user icon -->
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <a href="projects.php">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class="card-title">Total Projects</h6>
                                        <p class="card-text">
                                            <?php
                                            $sql = "SELECT * FROM projects";
                                            $result = mysqli_query($conn, $sql);
                                            $totalProjects = mysqli_num_rows($result);
                                            echo $totalProjects;
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-4 px-3 py-4">
                                        <!-- fontawsome ticket icon -->
                                        <i class="fas fa-project-diagram"></i>
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
                        </a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <a href="tasks.php">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class="card-title">Total Tasks</h6>
                                        <p class="card-text">
                                            <?php
                                            $sql = "SELECT * FROM task";
                                            $result = mysqli_query($conn, $sql);
                                            $totalTasks = mysqli_num_rows($result);
                                            echo $totalTasks;
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-4 px-3 py-4">
                                        <!-- fontawsome todo icon -->
                                        <i class="fas fa-tasks"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-3 mt-3">
                    <div class="card">
                        <a href="invoice.php">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class="card-title">Total Invoice</h6>
                                        <p class="card-text">
                                            <?php
                                            $sql = "SELECT * FROM quotation";
                                            $result = mysqli_query($conn, $sql);
                                            $totalInvoice = mysqli_num_rows($result);
                                            echo $totalInvoice;
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-4 px-3 py-4">
                                        <!-- fontawsome invoice icon -->
                                        <i class="fas fa-file-invoice"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col box mx-2">
                    <h4 class="ms-4 py-3">Earning</h4>
                    <!-- show message "not enough data to show" -->
                    <div class="text-center py-5">
                        <p class="text-muted">Not enough data to show</p>
                    </div>
                </div>
                <div class="col box mx-2">
                    <h4 class="ms-4 py-3">Time Logs</h4>
                    <div class="text-center py-5">
                        <p class="text-muted">Not enough data to show</p>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col box mx-2">
                    <h4 class="ms-4 py-3">Open Tickets</h4>
                    <!-- show message "not enough data to show" -->
                    <div class="text-center py-5">
                        <p class="text-muted">Not enough data to show</p>
                    </div>
                </div>
                <div class="col box mx-2">
                    <h4 class="ms-4 py-3">Pending Tickets</h4>
                    <div class="text-center py-5">
                        <p class="text-muted">Not enough data to show</p>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col box mx-2">
                    <h4 class="ms-4 py-3">Project Activity Timeline</h4>
                    <!-- show message "not enough data to show" -->
                    <div class="text-center py-5">
                        <p class="text-muted">Not enough data to show</p>
                    </div>
                </div>
                <div class="col box mx-2">
                    <h4 class="ms-4 py-3">Time Logs</h4>
                    <div class="text-center py-5">
                        <p class="text-muted">Not enough data to show</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('./include/footer.php');
?>