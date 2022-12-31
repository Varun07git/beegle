<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php';

if (isset($_REQUEST['save'])) {
    // Checking for project form Empty Fields
    if (($_REQUEST['ProjectShortCode'] == "") || ($_REQUEST['ProjectName'] == "") || ($_REQUEST['ProjectStartDate'] == "") || ($_REQUEST['ProjectEndDate'] == "")) {
        // msg displayed if required field missing
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
        // Assigning User Values to Variable
        $id = $_REQUEST['id'];
        $ProjectShortCode = $_REQUEST['ProjectShortCode'];
        $ProjectName = $_REQUEST['ProjectName'];
        $ProjectStartDate = $_REQUEST['ProjectStartDate'];
        $ProjectEndDate = $_REQUEST['ProjectEndDate'];
        $ProjectClient = $_REQUEST['ProjectClient'];
        $ProjectSummary = $_REQUEST['ProjectSummary'];
        $ProjectNotes = $_REQUEST['ProjectNotes'];
        $ProjectStatus = $_REQUEST['ProjectStatus'];
        $ProjectCompletionPercentage = $_REQUEST['ProjectCompletionPercentage'];
        $ProjectPlace = $_REQUEST['projectplace'];
        $ProjectArea = $_REQUEST['projectarea'];
        $ProjectGpsCoordinates = $_REQUEST['gpscoordinates'];
        $ProjectCropEstimation = $_REQUEST['cropareaestimationfor'];
        $ProjectMajorCrop = $_REQUEST['majorcropinvillage'];
        $ProjectImageSize = $_REQUEST['imagesize'];
        $ProjectImageOverlapping = $_REQUEST['imageoverlapping'];
        $ProjectFlightHeight = $_REQUEST['flightheight'];
        $ProjectImagesCollected = $_REQUEST['imagescollected'];
        $ProjectDateScanningStartDate = $_REQUEST['scanningstartdate'];
        $ProjectDateScanningEndDate = $_REQUEST['scanningenddate'];
        $ProjectDateProcessingStartDate = $_REQUEST['processingstartdate'];
        $ProjectDateProcessingEndDate = $_REQUEST['processingenddate'];
        $ProjectDateOfDelivery = $_REQUEST['dateofprojectdelivery'];
        $PieChartTitle = $_REQUEST['piecharttitle'];
        $PieChartValues = $_REQUEST['piechartvalues'];

        // file upload only if new file is selected
        if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {
            $file = $_FILES['file'];
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('pdf');
            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000000) {
                        $fileNameNew = uniqid('', false) . "." . $fileActualExt;
                        // check if directory exists with project shortcode
                        $dir = "uploads/" . $ProjectShortCode;
                        if (!file_exists($dir)) {
                            mkdir($dir, 0777, true);
                        }
                        $fileDestination = $dir . '/' . $fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        // delete existing file
                        $existingfile = $_REQUEST['existingfile'];
                    } else {
                        echo "Your file is too big!";
                    }
                } else {
                    echo "There was an error uploading your file!";
                }
            } else {
                echo "You cannot upload files of this type!";
            }
        } else {
            // if no new file is selected, use the existing file
            $fileDestination = $_REQUEST['existingfile'];
        }
        // thumbnail upload only if new file is selected
        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0) {
            $file2 = $_FILES['thumbnail'];
            $fileName2 = $_FILES['thumbnail']['name'];
            $fileTmpName2 = $_FILES['thumbnail']['tmp_name'];
            $fileSize2 = $_FILES['thumbnail']['size'];
            $fileError2 = $_FILES['thumbnail']['error'];
            $fileType2 = $_FILES['thumbnail']['type'];
            $fileExt2 = explode('.', $fileName2);
            $fileActualExt2 = strtolower(end($fileExt2));
            $allowed2 = array('jpg', 'jpeg', 'png', 'pdf');
            if (in_array($fileActualExt2, $allowed2)) {
                if ($fileError2 === 0) {
                    if ($fileSize2 < 1000000) {
                        $fileNameNew2 = uniqid('', false) . "." . $fileActualExt2;
                        // check if directory exists with project shortcode
                        $dir2 = "uploads/" . $ProjectShortCode;
                        if (!file_exists($dir2)) {
                            mkdir($dir2, 0777, true);
                        }
                        $fileDestination2 = $dir2 . '/' . $fileNameNew2;
                        move_uploaded_file($fileTmpName2, $fileDestination2);
                        // delete existing file with permission
                        $existingthumbnail = $_REQUEST['existingthumbnail'];
                    } else {
                        echo "Your file is too big!";
                    }
                } else {
                    echo "There was an error uploading your file!";
                }
            } else {
                echo "You cannot upload files of this type!";
            }
        } else {
            // if no new file is selected, use the existing file
            $fileDestination2 = $_REQUEST['existingthumbnail'];
        }

        // orthomozaic map upload only if new file is selected
        if (isset($_FILES['orthomozaicmap']) && $_FILES['orthomozaicmap']['size'] > 0) {
            $file3 = $_FILES['orthomozaicmap'];
            $fileName3 = $_FILES['orthomozaicmap']['name'];
            $fileTmpName3 = $_FILES['orthomozaicmap']['tmp_name'];
            $fileSize3 = $_FILES['orthomozaicmap']['size'];
            $fileError3 = $_FILES['orthomozaicmap']['error'];
            $fileType3 = $_FILES['orthomozaicmap']['type'];
            $fileExt3 = explode('.', $fileName3);
            $fileActualExt3 = strtolower(end($fileExt3));
            $allowed3 = array('jpg', 'jpeg', 'png', 'pdf');
            if (in_array($fileActualExt3, $allowed3)) {
                if ($fileError3 === 0) {
                    if ($fileSize3 < 1000000) {
                        $fileNameNew3 = uniqid('', false) . "." . $fileActualExt3;
                        // check if directory exists with project shortcode
                        $dir3 = "uploads/" . $ProjectShortCode;
                        if (!file_exists($dir3)) {
                            mkdir($dir3, 0777, true);
                        }
                        $fileDestination3 = $dir3 . '/' . $fileNameNew3;
                        move_uploaded_file($fileTmpName3, $fileDestination3);
                        // delete existing file with permission
                        $existingorthomozaicmap = $_REQUEST['existingorthomozaicmap'];
                    } else {
                        echo "Your file is too big!";
                    }
                } else {
                    echo "There was an error uploading your file!";
                }
            } else {
                echo "You cannot upload files of this type!";
            }
        } else {
            // if no new file is selected, use the existing file
            $fileDestination3 = $_REQUEST['existingorthomozaicmap'];
        }

        // villap map upload only if new file is selected
        if (isset($_FILES['villapmap']) && $_FILES['villapmap']['size'] > 0) {
            $file4 = $_FILES['villapmap'];
            $fileName4 = $_FILES['villapmap']['name'];
            $fileTmpName4 = $_FILES['villapmap']['tmp_name'];
            $fileSize4 = $_FILES['villapmap']['size'];
            $fileError4 = $_FILES['villapmap']['error'];
            $fileType4 = $_FILES['villapmap']['type'];
            $fileExt4 = explode('.', $fileName4);
            $fileActualExt4 = strtolower(end($fileExt4));
            $allowed4 = array('jpg', 'jpeg', 'png', 'pdf');
            if (in_array($fileActualExt4, $allowed4)) {
                if ($fileError4 === 0) {
                    if ($fileSize4 < 1000000) {
                        $fileNameNew4 = uniqid('', false) . "." . $fileActualExt4;
                        // check if directory exists with project shortcode
                        $dir4 = "uploads/" . $ProjectShortCode;
                        if (!file_exists($dir4)) {
                            mkdir($dir4, 0777, true);
                        }
                        $fileDestination4 = $dir4 . '/' . $fileNameNew4;
                        move_uploaded_file($fileTmpName4, $fileDestination4);
                        // delete existing file with permission
                        $existingvillapmap = $_REQUEST['existingvillapmap'];
                    } else {
                        echo "Your file is too big!";
                    }
                } else {
                    echo "There was an error uploading your file!";
                }
            } else {
                echo "You cannot upload files of this type!";
            }
        } else {
            // if no new file is selected, use the existing file
            $fileDestination4 = $_REQUEST['existingvillapmap'];
        }

        // shape file upload only if new file is selected
        if (isset($_FILES['shapefile']) && $_FILES['shapefile']['size'] > 0) {
            $file5 = $_FILES['shapefile'];
            $fileName5 = $_FILES['shapefile']['name'];
            $fileTmpName5 = $_FILES['shapefile']['tmp_name'];
            $fileSize5 = $_FILES['shapefile']['size'];
            $fileError5 = $_FILES['shapefile']['error'];
            $fileType5 = $_FILES['shapefile']['type'];
            $fileExt5 = explode('.', $fileName5);
            $fileActualExt5 = strtolower(end($fileExt5));
            $allowed5 = array('jpg', 'jpeg', 'png', 'pdf');
            if (in_array($fileActualExt5, $allowed5)) {
                if ($fileError5 === 0) {
                    if ($fileSize5 < 1000000) {
                        $fileNameNew5 = uniqid('', false) . "." . $fileActualExt5;
                        // check if directory exists with project shortcode
                        $dir5 = "uploads/" . $ProjectShortCode;
                        if (!file_exists($dir5)) {
                            mkdir($dir5, 0777, true);
                        }
                        $fileDestination5 = $dir5 . '/' . $fileNameNew5;
                        move_uploaded_file($fileTmpName5, $fileDestination5);
                        // delete existing file with permission
                        $existingshapefile = $_REQUEST['existingshapefile'];
                    } else {
                        echo "Your file is too big!";
                    }
                } else {
                    echo "There was an error uploading your file!";
                }
            } else {
                echo "You cannot upload files of this type!";
            }
        } else {
            // if no new file is selected, use the existing file
            $fileDestination5 = $_REQUEST['existingshapefile'];
        }

        // final report upload only if new file is selected
        if (isset($_FILES['finalreport']) && $_FILES['finalreport']['size'] > 0) {
            $file6 = $_FILES['finalreport'];
            $fileName6 = $_FILES['finalreport']['name'];
            $fileTmpName6 = $_FILES['finalreport']['tmp_name'];
            $fileSize6 = $_FILES['finalreport']['size'];
            $fileError6 = $_FILES['finalreport']['error'];
            $fileType6 = $_FILES['finalreport']['type'];
            $fileExt6 = explode('.', $fileName6);
            $fileActualExt6 = strtolower(end($fileExt6));
            $allowed6 = array('jpg', 'jpeg', 'png', 'pdf');
            if (in_array($fileActualExt6, $allowed6)) {
                if ($fileError6 === 0) {
                    if ($fileSize6 < 1000000) {
                        $fileNameNew6 = uniqid('', false) . "." . $fileActualExt6;
                        // check if directory exists with project shortcode
                        $dir6 = "uploads/" . $ProjectShortCode;
                        if (!file_exists($dir6)) {
                            mkdir($dir6, 0777, true);
                        }
                        $fileDestination6 = $dir6 . '/' . $fileNameNew6;
                        move_uploaded_file($fileTmpName6, $fileDestination6);
                        // delete existing file with permission
                        $existingfinalreport = $_REQUEST['existingfinalreport'];
                    } else {
                        echo "Your file is too big!";
                    }
                } else {
                    echo "There was an error uploading your file!";
                }
            } else {
                echo "You cannot upload files of this type!";
            }
        } else {
            // if no new file is selected, use the existing file
            $fileDestination6 = $_REQUEST['existingfinalreport'];
        }



        // update project details only if pie chart values are different from existing values
        if ($PieChartValues != $_REQUEST['existingpiechartvalues']) {
            // update project details
            $sql = "UPDATE projects SET Projectshortcode = '$ProjectShortCode', 
            project_name = '$ProjectName', project_start_date = '$ProjectStartDate', 
            project_end_date = '$ProjectEndDate', 
            project_client = '$ProjectClient', project_summary = '$ProjectSummary', 
            project_notes = '$ProjectNotes', 
            progress = '$ProjectCompletionPercentage', 
            `status`='$ProjectStatus', 
            `place`='$ProjectPlace', 
            `area`='$ProjectArea',
            `gps_coordinates`='$ProjectGpsCoordinates',
            `crop_estimation`='$ProjectCropEstimation',
            `major_crop`='$ProjectMajorCrop',
            `image_size`='$ProjectImageSize',
            `image_overlapping`='$ProjectImageOverlapping',
            `flight_height`='$ProjectFlightHeight',
            `images_collected`='$ProjectImagesCollected',
            `date_scanning_start_date`='$ProjectDateScanningStartDate',
            `date_scanning_end_date`='$ProjectDateScanningEndDate',
            `date_processing_start_date`='$ProjectDateProcessingStartDate',
            `date_processing_end_date`='$ProjectDateProcessingEndDate',
            `date_of_delivery`='$ProjectDateOfDelivery',
            `pie_chart_title`='$PieChartTitle',
            `pie_chart_values`='$PieChartValues',
            `report_file`='$fileDestination',
            `project_thumbnail`='$fileDestination2',
            `orthomozaic_map`='$fileDestination3',
            `villap_map`='$fileDestination4',
            `shape_file`='$fileDestination5',
            `final_report`='$fileDestination6'
             WHERE id = '$id'";
            if ($conn->query($sql) === TRUE) {
                // echo alert message
                echo "<script type='text/javascript'>alert('Project details updated successfully!');</script>";
            } else {
                // echo alert message
                echo "<script type='text/javascript'>alert('Error updating project details!');</script>";
            }
        } else {
            // update project details
            $sql = "UPDATE projects SET Projectshortcode = '$ProjectShortCode', 
            project_name = '$ProjectName', project_start_date = '$ProjectStartDate', 
            project_end_date = '$ProjectEndDate', 
            project_client = '$ProjectClient', project_summary = '$ProjectSummary', 
            project_notes = '$ProjectNotes', 
            progress = '$ProjectCompletionPercentage', 
            `status`='$ProjectStatus', 
            `place`='$ProjectPlace', 
            `area`='$ProjectArea',
            `gps_coordinates`='$ProjectGpsCoordinates',
            `crop_estimation`='$ProjectCropEstimation',
            `major_crop`='$ProjectMajorCrop',
            `image_size`='$ProjectImageSize',
            `image_overlapping`='$ProjectImageOverlapping',
            `flight_height`='$ProjectFlightHeight',
            `images_collected`='$ProjectImagesCollected',
            `date_scanning_start_date`='$ProjectDateScanningStartDate',
            `date_scanning_end_date`='$ProjectDateScanningEndDate',
            `date_processing_start_date`='$ProjectDateProcessingStartDate',
            `date_processing_end_date`='$ProjectDateProcessingEndDate',
            `date_of_delivery`='$ProjectDateOfDelivery',
            `report_file`='$fileDestination',
            `pie_chart_title`='$PieChartTitle',
            `project_thumbnail`='$fileDestination2',
            `orthomozaic_map`='$fileDestination3',
            `villap_map`='$fileDestination4',
            `shape_file`='$fileDestination5',
            `final_report`='$fileDestination6'
             WHERE id = '$id'";
            if ($conn->query($sql) === TRUE) {
                echo "<script type='text/javascript'>alert('Project details updated successfully!');</script>";
            } else {
                echo "<script type='text/javascript'>alert('Error updating project details!');</script>";
            }
        }
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
                    <span class="text">Edit Project</span>
                </div>
                <div class="col-auto">
                    <!-- save and close button -->
                    <a type="button" class="btn btn-outline-primary" href="./projects.php">
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
                        <div class="row">
                            <!-- project short code -->
                            <?php
                            if (isset($_REQUEST['id'])) {
                                $id = $_REQUEST['id'];
                                $sql = "SELECT * FROM `projects` WHERE `ID` = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                            }
                            ?>
                            <div class="col-6 mb-3">
                                <label for="ProjectShortCode" class="form-label">Project Short Code</label>
                                <input type="text" class="form-control" name="ProjectShortCode" placeholder="for e.g. Proj-1" aria-describedby="ProjectShortCode" value="<?php echo $row['projectshortcode']; ?>">
                            </div>
                            <!-- project name -->
                            <div class="col-6 mb-3">
                                <label for="ProjectName" class="form-label">Project Name</label>
                                <input type="text" class="form-control" name="ProjectName" aria-describedby="ProjectName" placeholder="for e.g. Area Counting" value="<?php echo $row['project_name']; ?>">
                            </div>
                            <!-- start date -->
                            <div class="col-3 mb-3">
                                <label for="ProjectStartDate" class="form-label">Start Date</label>
                                <input type="date" class="form-control" name="ProjectStartDate" aria-describedby="ProjectStartDate" value="<?php echo $row['project_start_date']; ?>">
                            </div>
                            <!-- end date -->
                            <div class="col-3 mb-3">
                                <label for="ProjectEndDate" class="form-label">End Date</label>
                                <input type="date" class="form-control" name="ProjectEndDate" aria-describedby="ProjectEndDate" value="<?php echo $row['project_end_date']; ?>">
                            </div>
                            <!-- project category -->
                            <!-- <div class="col-4 mb-3">
                                <label for="ProjectCatogary" class="form-label">Category</label>
                                <select class="form-select" name="ProjectCategory" aria-label="Default select example">
                                    <option selected><?php #echo $row['project_category']; ?></option>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                </select>
                            </div> -->
                            <!-- department -->
                            <!-- <div class="col-4 mb-3">
                                <label for="Department" class="form-label">Department</label>
                                <select class="form-select" name="ProjectDepartment" aria-label="Default select example">
                                    <option selected><?php # echo $row['project_department']; ?></option>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                </select>
                            </div> -->
                            <!-- client -->
                            <div class="col-3 mb-3">
                                <label for="Client" class="form-label">Client</label>
                                <select class="form-select" name="ProjectClient" aria-label="Default select example">
                                    <option selected><?php echo $row['project_client']; ?></option>
                                    <!-- show options after fetching data from database -->
                                    <?php $client = "SELECT * FROM `clients`"; 
                                    $client_result = mysqli_query($conn, $client);
                                    while ($clients_data = mysqli_fetch_assoc($client_result)) {
                                        echo "<option value='" . $clients_data['client_name'] . "'>" . $clients_data['client_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- status -->
                            <div class="col-3 mb-3">
                                <label for="Status" class="form-label">Status</label>
                                <select class="form-select" name="ProjectStatus" aria-label="Default select example">
                                    <option selected><?php echo $row['status']; ?></option>
                                    <option value="On Hold">On Hold</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Not Started">Not Started</option>
                                    <option value="Canceled">Canceled</option>
                                    <option value="Finished">Finished</option>
                                </select>
                            </div>
                            <!-- project summary textarea -->
                            <div class="col-6 mb-3">
                                <label for="ProjectSummary" class="form-label">Project Summary</label>
                                <textarea class="form-control" name="ProjectSummary" rows="3"><?php echo $row['project_summary']; ?></textarea>
                            </div>
                            <!-- project notes textarea -->
                            <div class="col-6 mb-3">
                                <label for="ProjectNotes" class="form-label">Notes</label>
                                <textarea class="form-control" name="ProjectNotes" rows="3"><?php echo $row['project_notes']; ?></textarea>
                            </div>
                            <!-- Project completion percentage bar with indicating number while scrolling -->
                            <div class="col-4 mb-3">
                                <label for="ProjectCompletionPercentage" class="form-label">Completion Percentage</label>
                                <input type="range" class="form-range" min="0" max="100" name="ProjectCompletionPercentage" value="<?php echo $row['progress']; ?>" oninput="ShowProjectCompletionPercentage.innerText = this.value">
                                <span>
                                    <span id="ShowProjectCompletionPercentage"><?php echo $row['progress']; ?></span>%
                                </span>
                            </div>
                            <!-- place -->
                            <div class="col-4 mb-3">
                                <label for="ProjectPlace" class="form-label">Place</label>
                                <input type="text" class="form-control" id="ProjectPlace"  name="projectplace" placeholder="for e.g. Bhopal" aria-describedby="ProjectPlace" value="<?php echo $row['place']; ?>">
                            </div>
                            <!-- area -->
                            <div class="col-4 mb-3">
                                <label for="ProjectArea" class="form-label">Area</label>
                                <input type="text" class="form-control" id="ProjectArea" name="projectarea" placeholder="for e.g. 25" aria-describedby="ProjectArea" value="<?php echo $row['area']; ?>">
                            </div>
                            <!-- gps coordinates -->
                            <div class="col-6 mb-3">
                                <!-- textarea -->
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="e.g. 12.385999, 76.329795" id="ProjectGpsCoordinates" name="gpscoordinates" style="height: 100px"><?php echo $row['gps_coordinates']; ?></textarea>
                                    <label for="ProjectGpsCoordinates">GPS Coordinates</label>
                                </div>
                            </div>
                            <!-- crop_area_estimation_for -->
                            <div class="col-6 mb-3">
                                <label for="ProjectCropAreaEstimationFor" class="form-label">Crop Area Estimation For</label>
                                <input type="text" class="form-control" id="ProjectCropAreaEstimationFor" name="cropareaestimationfor" aria-describedby="ProjectCropAreaEstimationFor" placeholder="for e.g. tobaccos" value="<?php echo $row['crop_estimation']; ?>">
                            </div>
                            <!-- major crop in village -->
                            <div class="col-12 mb-3">
                                <!-- textarea -->
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="ProjectMajorCropInVillage" name="majorcropinvillage" style="height: 100px"><?php echo $row['major_crop']; ?></textarea>
                                    <label for="ProjectMajorCropInVillage">Major Crop In Village</label>
                                </div>
                            </div>
                            <!-- image size -->
                            <div class="col-4 mb-3">
                                <label for="ProjectImageSize" class="form-label">Image Size</label>
                                <input type="text" class="form-control" id="ProjectImageSize" name="imagesize" aria-describedby="ProjectImageSize" value="<?php echo $row['image_size']; ?>">
                            </div>
                            <!-- image overlapping -->
                            <div class="col-4 mb-3">
                                <label for="ProjectImageOverlapping" class="form-label">Image Overlapping</label>
                                <input type="text" class="form-control" id="ProjectImageOverlapping" name="imageoverlapping" aria-describedby="ProjectImageOverlapping" value="<?php echo $row['image_overlapping']; ?>">
                            </div>
                            <!-- flight height -->
                            <div class="col-4 mb-3">
                                <label for="ProjectFlightHeight" class="form-label">Flight Height</label>
                                <input type="text" class="form-control" id="ProjectFlightHeight" name="flightheight" aria-describedby="ProjectFlightHeight" value="<?php echo $row['flight_height']; ?>">
                            </div>
                            <!-- images collected -->
                            <div class="col-4 mb-3">
                                <label for="ProjectImagesCollected" class="form-label">Images Collected</label>
                                <input type="text" class="form-control" id="ProjectImagesCollected" name="imagescollected" aria-describedby="ProjectImagesCollected" value="<?php echo $row['images_collected']; ?>">
                            </div>
                            <!-- scanning start date -->
                            <div class="col-4 mb-3">
                                <label for="ProjectScanningStartDate" class="form-label">Scanning Start Date</label>
                                <input type="date" class="form-control" id="ProjectScanningStartDate" name="scanningstartdate" aria-describedby="ProjectScanningStartDate" value="<?php echo $row['date_scanning_start_date']; ?>">
                            </div>
                            <!-- scanning end date -->
                            <div class="col-4 mb-3">
                                <label for="ProjectScanningEndDate" class="form-label">Scanning End Date</label>
                                <input type="date" class="form-control" id="ProjectScanningEndDate" name="scanningenddate" aria-describedby="ProjectScanningEndDate" value="<?php echo $row['date_scanning_end_date']; ?>">
                            </div>
                            <!-- processing start date -->
                            <div class="col-4 mb-3">
                                <label for="ProjectProcessingStartDate" class="form-label">Processing Start Date</label>
                                <input type="date" class="form-control" id="ProjectProcessingStartDate" name="processingstartdate" aria-describedby="ProjectProcessingStartDate" value="<?php echo $row['date_processing_start_date']; ?>">
                            </div>
                            <!-- processing end date -->
                            <div class="col-4 mb-3">
                                <label for="ProjectProcessingEndDate" class="form-label">Processing End Date</label>
                                <input type="date" class="form-control" id="ProjectProcessingEndDate" name="processingenddate" aria-describedby="ProjectProcessingEndDate" value="<?php echo $row['date_processing_end_date']; ?>">
                            </div>
                            <!-- date of project delivery -->
                            <div class="col-4 mb-3">
                                <label for="ProjectDateOfProjectDelivery" class="form-label">Date Of Project Delivery</label>
                                <input type="date" class="form-control" id="ProjectDateOfProjectDelivery" name="dateofprojectdelivery" aria-describedby="ProjectDateOfProjectDelivery" value="<?php echo $row['date_of_delivery']; ?>">
                            </div>
                        </div>
                        <!-- input for project thumbnail -->
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="ProjectThumbnail" class="form-label">Project Thumbnail</label>
                                <input type="file" class="form-control" id="ProjectThumbnail" name="thumbnail" aria-describedby="ProjectThumbnail" value="<?php echo $row['project_thumbnail']; ?>">
                            </div>
                            <!-- preview existing thumbnail  -->
                            <div class="col-6 mb-3">
                                <label for="ProjectExistingThumbnail" class="form-label">Existing Thumbnail</label>
                                <input type="hidden" class="form-control" id="ProjectExistingThumbnail" name="existingthumbnail" aria-describedby="ProjectExistingThumbnail" value="
                                <?php echo $row['project_thumbnail']; ?>
                                ">
                                <?php
                                if ($row['project_thumbnail'] != "") {
                                    echo '<a href="' . $row['project_thumbnail'] . '" target="_blank"><img src="' . $row['project_thumbnail'] . '" width="100px" height="100px"></a>';
                                } else {
                                    echo '<img src="uploads/noimage.png" width="100px" height="100px">';
                                }
                                ?>
                            </div>
                        </div>
                        <!--input for file and show already uploaded file name-->
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="ProjectFile" class="form-label">Report PDF File</label>
                                <input type="file" class="form-control" id="ProjectFile" name="file" aria-describedby="ProjectFile" value="<?php echo $row['report_file']; ?>">
                            </div>
                            <!--existing file  -->
                            <div class="col-6 mb-3">
                                <label for="ProjectExistingFile" class="form-label">Existing File</label>
                                <input type="hidden" class="form-control" id="ProjectExistingFile" name="existingfile" aria-describedby="ProjectExistingFile" value="<?php echo $row['report_file']; ?>">
                                <?php
                                if ($row['report_file'] != "") {
                                    echo '<div class="row-auto"><a href="' . $row['report_file'] . '" target="_blank" class="mt-1 btn btn-primary">View File</a></div>';
                                } else {
                                    echo '<div class="row"><a href="uploads/noimage.png" target="_blank">View File</a></div>';
                                }
                                ?>
                            </div>
                        </div>
                        <!-- input for pie chart title -->
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="ProjectPieChartTitle" class="form-label">Pie Chart Title</label>
                                <input type="text" class="form-control" id="ProjectPieChartTitle" name="piecharttitle" aria-describedby="ProjectPieChartTitle" value="<?php echo $row['pie_chart_title']; ?>">
                            </div>
                            <!-- pie chart values in textarea -->
                            <div class="col-6 mb-3">
                                <label for="ProjectPieChartValues" class="form-label">Pie Chart Values:
                                    <small class="text-muted">" Please Add \ before every Apostrophe(') "</small>
                                </label>
                                <textarea class="form-control" id="ProjectPieChartValues" name="piechartvalues" aria-describedby="ProjectPieChartValues" rows="3"><?php echo $row['pie_chart_values']; ?></textarea>
                                <!-- existing pie chart values -->
                                <input type="hidden" class="form-control" id="ProjectExistingPieChartValues" name="existingpiechartvalues" aria-describedby="ProjectExistingPieChartValues" value="<?php echo $row['pie_chart_values']; ?>">
                            </div>
                        </div>

                        <!--input for Orthomozaic Map file and show already uploaded file name-->
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="ProjectOrthomozaicMap" class="form-label">Orthomozaic Map</label>
                                <input type="file" class="form-control" id="ProjectOrthomozaicMap" name="orthomozaicmap" aria-describedby="ProjectOrthomozaicMap" value="<?php echo $row['orthomozaic_map']; ?>">
                            </div>
                            <!--existing file  -->
                            <div class="col-6 mb-3">
                                <label for="ProjectExistingOrthomozaicMap" class="form-label">Existing Orthomozaic Map</label>
                                <input type="hidden" class="form-control" id="ProjectExistingOrthomozaicMap" name="existingorthomozaicmap" aria-describedby="ProjectExistingOrthomozaicMap" value="<?php echo $row['orthomozaic_map']; ?>">
                                <?php
                                if ($row['orthomozaic_map'] != "") {
                                    echo '<div class="row-auto"><a href="' . $row['orthomozaic_map'] . '" target="_blank" class="mt-1 btn btn-primary">View File</a></div>';
                                } else {
                                    echo '<div class="row">There is no existing Orthomozaic Map file avilable</div>';
                                }
                                ?>
                            </div>
                        </div>
                        <!--input for villap map file and show already uploaded file name-->
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="ProjectVillapMap" class="form-label">Villap Map</label>
                                <input type="file" class="form-control" id="ProjectVillapMap" name="villapmap" aria-describedby="ProjectVillapMap" value="<?php echo $row['villap_map']; ?>">
                            </div>
                            <!--existing file  -->
                            <div class="col-6 mb-3">
                                <label for="ProjectExistingVillapMap" class="form-label">Existing Villap Map</label>
                                <input type="hidden" class="form-control" id="ProjectExistingVillapMap" name="existingvillapmap" aria-describedby="ProjectExistingVillapMap" value="<?php echo $row['villap_map']; ?>">
                                <?php
                                if ($row['villap_map'] != "") {
                                    echo '<div class="row-auto"><a href="' . $row['villap_map'] . '" target="_blank" class="mt-1 btn btn-primary">View File</a></div>';
                                } else {
                                    echo '<div class="row">There is no existing Villap Map file avilable</div>';
                                }
                                ?>
                            </div>
                        </div>
                        <!--input for shape file and show already uploaded file name-->
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="ProjectShapeFile" class="form-label">Shape File</label>
                                <input type="file" class="form-control" id="ProjectShapeFile" name="shapefile" aria-describedby="ProjectShapeFile" value="<?php echo $row['shape_file']; ?>">
                            </div>
                            <!--existing file  -->
                            <div class="col-6 mb-3">
                                <label for="ProjectExistingShapeFile" class="form-label">Existing Shape File</label>
                                <input type="hidden" class="form-control" id="ProjectExistingShapeFile" name="existingshapefile" aria-describedby="ProjectExistingShapeFile" value="<?php echo $row['shape_file']; ?>">
                                <?php
                                if ($row['shape_file'] != "") {
                                    echo '<div class="row-auto"><a href="' . $row['shape_file'] . '" target="_blank" class="mt-1 btn btn-primary">View File</a></div>';
                                } else {
                                    echo '<div class="row">There is no existing Shape file avilable</div>';
                                }
                                ?>
                            </div>
                        </div>
                        <!--input for final report file and show already uploaded file name-->
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="ProjectFinalReport" class="form-label">Final Report</label>
                                <input type="file" class="form-control" id="ProjectFinalReport" name="finalreport" aria-describedby="ProjectFinalReport" value="<?php echo $row['final_report']; ?>">
                            </div>
                            <!--existing file  -->
                            <div class="col-6 mb-3">
                                <label for="ProjectExistingFinalReport" class="form-label">Existing Final Report</label>
                                <input type="hidden" class="form-control" id="ProjectExistingFinalReport" name="existingfinalreport" aria-describedby="ProjectExistingFinalReport" value="<?php echo $row['final_report']; ?>">
                                <?php
                                if ($row['final_report'] != "") {
                                    echo '<div class="row-auto"><a href="' . $row['final_report'] . '" target="_blank" class="mt-1 btn btn-primary">View File</a></div>';
                                } else {
                                    echo '<div class="row">There is no existing Final Report file avilable</div>';
                                }
                                ?>
                            </div>
                        </div>


                        <!-- Close and save button -->
                        <div class="row">
                            <div class="col-auto">
                                <!-- anchor button -->
                                <button type="submit" class="btn btn-primary" name="save"><i class='bx bx-save'></i>Save</button>
                            </div>
                            <div class="col-auto">
                                <!-- anchor button -->
                                <a href="projects.php" class="btn btn-primary">Close</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('./include/footer.php');
?>