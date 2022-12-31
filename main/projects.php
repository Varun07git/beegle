<?php
include('./include/dbconnect.php');
include('./include/header.php');
include('./include/sidebar.php');
?>
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


    /* project-section css */

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

    .project-header h3 {
        padding: 0px 10px 0px 10px;
        font-size: 1.5rem;
        font-weight: bold;
        color: #0f7dff;
    }

    .services {
        margin-left: 2rem;
        margin-right: 2rem;
    }

    .services img {
        width: 10rem;
        height: 10rem;
        object-fit: cover;
        border-radius: 10px;
    }

    .services h5 {
        font-size: .9rem;
        font-weight: bold;
        text-align: center;
        margin-top: 0px;
        max-width: 9rem;
    }

    /* percentage of completed project circle css */
    .percentage {
        position: absolute;
        margin-bottom: 0px;
        right: 0;
        width: fit-content;
    }

    .circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: #0f7dff;
        margin: 0 auto;
        position: relative;
    }

    .inner-circle {
        width: 50px;
        height: 50px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        background-color: #f0ede2;
        margin: 0 auto;
    }

    .inner-circle p {
        /* algin in center */
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 1.2rem;
        font-weight: bold;
        color: #0f7dff;
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
        <div class="row project-section mt-2">
            <div class="project-header">
                <h3>On Going projects</h3>
            </div>
            <div class="row mt-1">
                <?php

                $sql = "SELECT * FROM projects where progress != 100 limit 4";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                            <div class="col-auto">
                            <div class="card px-0">
                            <!-- percentage of completed project circle-->
                            <div class="row percentage">
                                <div class="col-auto">
                                    <div class="circle">
                                        <div class="inner-circle">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="percentage">' . $row['progress'] . '%</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="./modal.php?id='.$row['ID'].'">
                            <div class="card-img">
                                <img src="../admin/' . trim($row['project_thumbnail']) . '" class="card-img-top" alt="No Image to Show">
                            </div>
                            <div class="card-body pt-1">
                                <h5 class="card-title">' . $row['project_name'] . '</h5>
                                <p class="card-text">' . $row['place'] . '</p>
                            </div>
                            </a>
                        </div>
                        </div>
                            ';
                    }
                };
                ?>

            </div>
            <div class="project-header">
                <h3>Completed projects</h3>
            </div>
            <div class="row mt-1">
            <?php
                $sql = "SELECT * FROM projects where progress = 100 limit 4";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                            <div class="col-auto">
                            <div class="card px-0">
                            <!-- percentage of completed project circle-->
                            <div class="row percentage">
                                <div class="col-auto">
                                    <div class="circle">
                                        <div class="inner-circle">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="percentage">' . $row['progress'] . '%</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="./modal.php?id='.$row['ID'].'">
                            <div class="card-img">
                                <img src="../admin/' . trim($row['project_thumbnail']) . '" class="card-img-top" alt="No Image to Show">
                            </div>
                            <div class="card-body pt-1">
                                <h5 class="card-title">' . $row['project_name'] . '</h5>
                                <p class="card-text">' . $row['place'] . '</p>
                            </div>
                            </a>
                        </div>
                        </div>
                            ';
                    }
                }
                else{
                    echo '<h6>No Projects are Completed</h6>';
                }
                ;
                ?>

            </div>
        </div>
    </div>
</div>
<?php include './include/footer.php'; ?>