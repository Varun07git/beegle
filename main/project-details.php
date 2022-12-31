<?php include_once './include/header.php'; 
include_once './include/dbconnect.php';
?>
<?php include_once './include/sidebar.php'; ?>
<!-- Project DetailsTable -->
<style type="text/css" media="print">
    div.no_print {
        display: none;
    }
</style>

<style>
    /* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

    #content {
        width: 100%;
        padding: 10px;
        min-height: 100vh;
        transition: all 0.3s;
    }

    #content.active {
        width: calc(100% - 300px);
    }

    .dash-nav {
        display: flex;
        align-items: center;
        padding: 20px 10px;
        background-color: #0f7dff;
        color: #fff;
        border-radius: 15px;
    }

    .dash-icon img {
        width: 60px;
        height: 50px;
    }

    .dash-tabs p {
        font-size: .9rem;
        text-align: center;
        font-weight: 400;
        margin-bottom: 0px;
    }

    .project-header h3 {
        padding: 0px 10px 0px 10px;
        font-size: 1.5rem;
        font-weight: bold;
        color: #0f7dff;
    }

    .project-content-box {
        background-color: #0f7dff;
        height: 2rem;
        padding-top: 2px;
        color: #fff;
    }

    .dot {
        height: 8px;
        width: 8px;
        background-color: #0f7dff;
        border-radius: 50%;
        display: inline-block;
    }

    /* report Section */

    .enlarger-icon {
        width: fit-content;
    }

    .enlarger-icon img {
        width: 30px;
        height: 30px;
        background-color: #0f7dff;
        position: absolute;
        bottom: 0%;
        left: 90%;
    }

    .card {
        border: none;
        width: 15rem;
        height: 12rem;
    }

    .card-title {
        margin: 0px;
    }

    .card-img {
        padding-top: 8px;
        padding-left: 12px;
        width: 15rem;
        height: 8rem;
        object-fit: cover;
        background-color: #cfcfcf;
    }

    .card-img img {
        width: 13.5rem;
        height: 7rem;
    }

    .card-body {
        padding-bottom: 2px !important;
    }

    .status-circle {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
    }

    .status-circle-green {
        background-color: #01a459;
    }

    .status-circle-red {
        background-color: #ff0000;
    }

    .status-circle-yellow {
        background-color: #ffbf00;
    }

    .status-circle-blue {
        background-color: #0f7dff;
    }

    .status-circle-gray {
        background-color: #808080;
    }
</style>
<!-- Page Content  -->
<div id="content">
    <div>
        <ul class="nav justify-content-end">
            <li class="nav-item px-2">
                <a class="nav-link active" aria-current="page" href="#">Services</a>
            </li>
            <li class="nav-item px-2">
                <a class="nav-link" href="#">Use Case</a>
            </li>
            <li class="nav-item px-2">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item px-2">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item px-3">
                <img src="./img/14-rmbg.png" alt="" width="90px" height="50px">
            </li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row pt-2 mb-2">
            <div class="d-flex justify-content-end">
                <div class="col-auto me-3"><a href=""><img src="./img/notification-rmbg.png" alt="" width="30px" height="30px"></a></div>
                <div class="col-auto me-3"><a href=""><img src="./img/settings-rmbg.png" alt="" width="30px" height="30px"></a></div>
            </div>
        </div>
        <div class="row dash-nav">
            <div class="col-8 d-flex justify-content-end">
                <div class="row">
                    <div class="col-auto dash-tabs">
                        <a href="">
                            <div class="row">
                                <div class="col-auto dash-icon">
                                    <img src="./img/5.png" alt="">
                                </div>
                            </div>
                            <div class="row-auto">
                                <p>Dashboard</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-auto dash-tabs">
                        <a href="./projects.php">
                            <div class="row">
                                <div class="col-auto dash-icon">
                                    <img src="./img/6.png" alt="">
                                </div>
                            </div>
                            <div class="row-auto">
                                <p>Projects</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-auto dash-tabs">
                        <a href="./our-services.php">
                            <div class="row">
                                <div class="col-auto dash-icon">
                                    <img src="./img/7.png" alt="">
                                </div>
                            </div>
                            <div class="row-auto">
                                <p>Services</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-auto dash-tabs">
                        <a href="./use-cases.php">
                            <div class="row">
                                <div class="col-auto dash-icon">
                                    <img src="./img/8.png" alt="">
                                </div>
                            </div>
                            <div class="row-auto">
                                <p>Use Case</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-auto dash-tabs">
                        <a href="">
                            <div class="row">
                                <div class="col-auto dash-icon">
                                    <img src="./img/9.png" alt="">
                                </div>
                            </div>
                            <div class="row-auto">
                                <p>Others</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <!-- search bar -->
                <div class="row d-flex justify-content-center">
                    <div class="col-auto">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-light" type="button" id="button-addon2"><img src="./img/search-icon-png-18.png" alt="" width="20px" height="20px"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row project-section">
            <div class="row project-header mt-2">
                <h3>Project Details</h3>
            </div>
            <?php
            // select project data from database
            $sql2 = "SELECT * FROM `projects`";
            $result2 = mysqli_query($conn, $sql2);
            $num = mysqli_num_rows($result2);
            if ($num > 0) {
            ?>
            <div class="row">
                <div class="no_print">
                    <p>
                        <!-- <input type="button" value="Add cell" onclick="addRow ('mytable')" style="background-color: #0f7dff; border:none; border-radius:10px; color:#fff;padding:.4rem;"> -->
                        <input class="button" type="submit" value="Print" onclick="print_()" style="background-color: #0f7dff; border:none; border-radius:10px; color:#fff;padding:.4rem 2rem;"></input>
                </div>
                <table id="mytable" class="display project-table" style="width: 100%;">
                    <thead>
                        <tr>
                            <!-- table check box -->
                            <td><b>id</b></td>
                            <td><b>Project Name</b></td>
                            <td><b>Members</b></td>
                            <td><b>Deadline</b></td>
                            <td><b>Client</b></td>
                            <td><b>Progress</b></td>
                            <td><b>Status</b></td>
                            <td><b>Action</b></td>
                        </tr>
                    </thead>
                    <?php
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $id = $row2['ID'];
                            $name = $row2['project_name'];
                            $members = $row2['project_member'];
                            $deadline = $row2['project_end_date'];
                            $client = $row2['project_client'];
                            $progress = $row2['progress'];
                            $status = $row2['status'];
                            echo
                            '<tr>
                                <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td>' . $members . '</td>
                                <td>' . $deadline . '</td>
                                <td>' . $client . '</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width:' . $progress . '%;" aria-valuenow="' . $progress . '" aria-valuemin="0" aria-valuemax="100">' . $progress . '%</div>
                                    </div>
                                </td>
                                <td>' . $status . '</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="./img/3.png" alt="" width="20px" height="20px" style="background-color: #0f7dff;">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a href="" class="dropdown-item">View</a></li>
                                            <li><a class="dropdown-item" href="#">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>';
                        }
                    } ?>
                   
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include('./include/footer.php');
?>