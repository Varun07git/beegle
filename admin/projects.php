<?php
include('./include/dbconnect.php');
include_once './include/header.php';
include_once './include/sidebar.php';
if (isset($_REQUEST['addproject'])) {
    $projectshortcode = $_REQUEST['projectshortcode'];
    $projectname = $_REQUEST['projectname'];
    $projectstartdate = $_REQUEST['projectstartdate'];
    $projectenddate = $_REQUEST['projectenddate'];
    // $projectcategory = $_REQUEST['projectcategory'];
    // $projectdepartment = $_REQUEST['projectdepartment'];
    $client = $_REQUEST['client'];
    $projectsummary = $_REQUEST['projectsummary'];
    $notes = $_REQUEST['notes'];
    // $createpublic = $_REQUEST['createpublic'];
    $projectmember = $_REQUEST['projectmember'];
    $sql = "INSERT INTO `projects`(`projectshortcode`, `project_name`, `project_start_date`, `project_end_date`,  `project_client`, `project_summary`, `project_notes`, `project_member`) VALUES ('$projectshortcode','$projectname','$projectstartdate','$projectenddate','$client','$projectsummary','$notes','$projectmember')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Project Added Successfully');</script>";
    } else {
        echo "<script>alert('Project Not Added');</script>";
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
                    <span class="text">Project</span>
                </div>
                <div class="col-auto">
                    <!-- add project modal button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProjectModal">
                        <i class='bx bx-plus'></i>Add Project</button>
                </div>
                <!-- project template button outline with icon whith anchor tag -->
                <div class="col-auto">
                    <a href="./project-template.php" class="btn btn-outline-primary"><i class='bx bxs-layer'></i>Project Template</a>
                </div>
                <!-- Ul at end search, sticky notes,create new, notification, logout icon -->
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
            <!-- Add project Modal -->
            <div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProjectLabel">Add Project</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-5 py-4">
                            <form>
                                <!-- account details -->
                                <div class="row">
                                    <h5 class="mb-3">Project Details</h5>
                                    <div class="row mb-4">
                                        <!-- Short code unique code -->
                                        <div class="col-6 mb-3">
                                            <label for="ProjectShortCode" class="form-label">Short Code</label>
                                            <input type="text" class="form-control" id="ProjectShortCode" name="projectshortcode" aria-describedby="ProjectShortCode">
                                        </div>
                                        <!-- project name -->
                                        <div class="col-6 mb-3">
                                            <label for="ProjectName" class="form-label">Project Name</label>
                                            <input type="text" class="form-control" id="ProjectName" name="projectname" aria-describedby="ProjectName">
                                        </div>
                                        <!-- start date -->
                                        <div class="col-4 mb-3">
                                            <label for="ProjectStartDate" class="form-label">Start Date</label>
                                            <input type="date" class="form-control" id="ProjectStartDate" name="projectstartdate" aria-describedby="ProjectStartDate">
                                        </div>
                                        <!-- end date -->
                                        <div class="col-4 mb-3">
                                            <label for="ProjectEndDate" class="form-label">End Date</label>
                                            <input type="date" class="form-control" id="ProjectEndDate" name="projectenddate" aria-describedby="ProjectEndDate">
                                        </div>
                                        <!-- project category -->
                                        <!-- <div class="col-4 mb-3">
                                            <label for="ProjectCategory" class="form-label">Project Category</label>
                                            <select class="form-select" name="projectcategory" aria-label="Default select example">
                                                <option selected>Select Catogary</option>
                                                <option value="one">One</option>
                                                <option value="two">Two</option>
                                                <option value="three">Three</option>
                                            </select>
                                        </div> -->
                                        <!-- Department -->
                                        <!-- <div class="col-4 mb-3">
                                            <label for="ProjectDepartment" class="form-label">Department</label>
                                            <select class="form-select" name="projectdepartment" aria-label="Default select example">
                                                <option selected>Select Catogary</option>
                                                <option value="one">One</option>
                                                <option value="two">Two</option>
                                                <option value="three">Three</option>
                                            </select>
                                        </div> -->
                                        <!-- client -->
                                        <div class="col-4 mb-3">
                                            <label for="client" class="form-label">Client</label>
                                            <select class="form-select" name="client" aria-label="Default select example">
                                                <option selected>Select Catogary</option>
                                                <?php $client = "SELECT * FROM `clients`"; 
                                    $client_result = mysqli_query($conn, $client);
                                    while ($clients_data = mysqli_fetch_assoc($client_result)) {
                                        echo "<option value='" . $clients_data['client_name'] . "'>" . $clients_data['client_name'] . "</option>";
                                    }
                                    ?>
                                            </select>
                                        </div>
                                        <!-- Project summary -->
                                        <div class="col-6 mb-3">
                                            <label for="ProjectSummary" class="form-label">Project Summary</label>
                                            <textarea class="form-control" id="ProjectSummary" name="projectsummary" rows="3"></textarea>
                                        </div>
                                        <!-- notes -->
                                        <div class="col-6 mb-3">
                                            <label for="ProjectNotes" class="form-label">Notes</label>
                                            <textarea class="form-control" id="ProjectNotes" name="notes" rows="3"></textarea>
                                        </div>
                                        <!-- create project public -->
                                        <div class="col-3 mb-3">
                                            <div class="form-check">
                                                <label class="form-check" for="flexCheckDefault">Create Project Public</label>
                                                <input class="form-check-input" type="checkbox" value="1" name="createpublic" id="flexCheckDefault">
                                            </div>
                                        </div>
                                        <!-- add project member -->
                                        <div class="col-12 mb-3">
                                            <label for="ProjectMember" class="form-label">Add Project Member</label>
                                            <select class="form-select" name="projectmember" aria-label="Default select example">
                                                <option selected>Select Catogary</option>
                                                <option value="one">One</option>
                                                <option value="two">Two</option>
                                                <option value="three">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="addproject">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            // select project data from database
            $sql2 = "SELECT * FROM `projects`";
            $result2 = mysqli_query($conn, $sql2);
            $num = mysqli_num_rows($result2);
            if ($num > 0) {
            ?>
                <!-- task box stars -->
                <div class="row mt-3">
                    <div class="col-12">
                        <table id="mytable" class="display project-table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <!-- table check box -->
                                    <td><b>id</b></td>
                                    <td><b>Code</b></td>
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
                            $code = $row2['projectshortcode'];
                            $name = $row2['project_name'];
                            $members = $row2['project_member'];
                            $deadline = $row2['project_end_date'];
                            $client = $row2['project_client'];
                            $progress = $row2['progress'];
                            $status = $row2['status'];
                            echo
                            '<tr>
                                <td>' . $id . '</td>
                                <td>' . $code . '</td>
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
                                            <li><a href="edit-project.php?id=' . $id . '" class="dropdown-item">Edit</a></li>
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
</section>
<?php
include('./include/footer.php');
?>