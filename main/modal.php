<?php include_once './include/header.php';
include('./include/dbconnect.php');
?>
<?php include_once './include/sidebar.php'; ?>
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

    .btn-services {
        background-color: #0f7dff;
        color: #fff;
        padding: 10px 40px;
        border-radius: 30px;
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
        <?php
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $sql = "SELECT * FROM `projects` WHERE `ID` = '$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        }
        ?>
        <div class="row project-section">
            <div class="row mb-5">
                <div class="col-6">
                    <div class="project-header mt-2">
                        <h3>Project Profile</h3>
                    </div>
                    <div class="Project-Profile-content px-4">
                        <div class="row ms-3 mb-2">
                            <div class="col-3 me-1 project-content-box">Project</div>
                            <div class="col-7 ms-1 project-content-box"><?php echo $row['project_name']; ?></div>
                        </div>
                        <div class="row ms-3 mb-2">
                            <div class="col-3 me-1 project-content-box">Place</div>
                            <div class="col-7 ms-1 project-content-box"><?php echo $row['place']; ?></div>
                        </div>
                        <div class="row ms-3 mb-2">
                            <div class="col-3 me-1 project-content-box">Area</div>
                            <div class="col-7 ms-1">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-5 project-content-box"><?php echo $row['area']; ?></div>
                                    <div class="col-6 project-content-box">Acres</div>
                                </div>
                            </div>
                        </div>
                        <div class="row ms-3">
                            <div class="col-3 me-1 project-content-box">Status</div>
                            <div class="col-7 ms-1 project-content-box"><?php echo $row['status']; ?></div>
                        </div>
                        <div class="row ms-3">
                            <a class="col-10 px-0 d-flex justify-content-end" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                    <div class="dot"></div>
                                </div>
                            </a>
                            <div class="collapse col-10 px-0" id="collapseExample">
                                <div class="collapsed-content">
                                    <pre><b>GPS Coordinates :</b> <?php echo $row['gps_coordinates']; ?>  (Lat, Long)
<b>Total Area in Ha :</b> <?php echo ($row['area'] / 2.471); ?> Ha
<b>Total Area in Acre :</b> <?php echo ($row['area']); ?> Acre
<b>Village Perimeter :</b> 11.6Km
<b>Crop area estimation for :</b> <?php echo ($row['crop_estimation']); ?>

<b>Major crops in village :</b> <?php echo ($row['major_crop']); ?>

<b>Image Size:</b> <?php echo ($row['image_size']); ?> Megapixel
<b>Image Overlapping :</b> <?php echo ($row['image_overlapping']); ?>%
<b>Flight height :</b> <?php echo ($row['flight_height']); ?>mtr (Majorly)
<b>Images Collected :</b> <?php echo ($row['images_collected']); ?>+ ( 60+ GB )
<b>Date of Scanning :</b> <?php echo ($row['date_scanning_start_date']); ?> to <?php echo ($row['date_scanning_end_date']); ?>

<b>Data of Processing :</b> <?php echo ($row['date_processing_start_date']); ?> to <?php echo ($row['date_processing_end_date']); ?>

<b>Date of Project Delivery :</b> <?php echo ($row['date_of_delivery']); ?>
                                    </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- report section -->
                <div class="col-6">
                    <div class="row" style="position: relative;">
                        <div class="enlarger-icon">
                            <a class="col-10 px-0 d-flex justify-content-end" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                                <img src="./img/97.png" alt="">
                            </a>
                        </div>
                        <div class="project-header mt-2 d-flex justify-content-center">
                            <h3>Report</h3>
                        </div>
                        <!-- embed pdf -->
                        <div class="col-12">
                            <embed src="../admin/<?php echo $row['report_file']; ?>#toolbar=0" type="application/pdf" width="100%" height="400px" />
                        </div>
                        <!-- pie chart js -->
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    <?php echo $row['pie_chart_values'];?>
                                ]);
                                var options = {
                                    title: 'My Daily Activities'
                                };
                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                chart.draw(data, options);
                            }
                        </script>
                        <div class="collapse mx-0 px-0" id="collapseExample2">
                            <div class="collapsed-content">
                                    <div id="piechart" style="width: 100%; height: 200px !important;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- download section -->
            <div class="row d-flex justify-content-evenly mt-5">
                <div class="card px-0">
                    <div class="card-img">
                        <img src="./img/45.png" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body px-0 py-1">
                        <div class="row">
                            <div class="col-8 mx-0 ms-2 px-0">
                                <h5 class="card-title">Orthomozaic Map</h5>
                            </div>
                            <div class="col-3"><img src="./img/91.png" alt="" style="height: 30px;width: 30px;"></div>
                        </div>
                    </div>
                </div>
                <div class="card px-0">
                    <div class="card-img">
                        <img src="./img/44.png" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body px-0 py-1">
                        <div class="row">
                            <div class="col-8 mx-0 ms-2 px-0">
                                <h5 class="card-title">Villap Map</h5>
                            </div>
                            <div class="col-3"><img src="./img/91.png" alt="" style="height: 30px;width: 30px;"></div>
                        </div>
                    </div>
                </div>
                <div class="card px-0">
                    <div class="card-img">
                        <img src="./img/43.png" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body px-0 py-1">
                        <div class="row">
                            <div class="col-8 mx-0 ms-2 px-0">
                                <h5 class="card-title">Shape File</h5>
                            </div>
                            <div class="col-3"><img src="./img/91.png" alt="" style="height: 30px;width: 30px;"></div>
                        </div>
                    </div>
                </div>
                <div class="card px-0">
                    <div class="card-img">
                        <img src="./img/45.png" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body px-0 py-1">
                        <div class="row">
                            <div class="col-8 mx-0 ms-2 px-0">
                                <h5 class="card-title">Final Report</h5>
                            </div>
                            <div class="col-3"><img src="./img/91.png" alt="" style="height: 30px;width: 30px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('./include/footer.php');
?>