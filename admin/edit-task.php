<?php
include_once './include/dbconnect.php';
include_once './include/header.php';
include_once './include/sidebar.php';

if (isset($_REQUEST['save'])) {
    // Assigning User Values to Variable
    $id = $_REQUEST['id'];
    $tasktitle = $_REQUEST['tasktitle'];
    $task_category = $_REQUEST['task_category'];
    $task_project = $_REQUEST['task_project'];
    $task_start_date = $_REQUEST['task_start_date'];
    $task_end_date = $_REQUEST['task_end_date'];
    $due_date = 1;
    $assgin_to = $_REQUEST['assign_to'];
    $task_desc = $_REQUEST['task_desc'];    
    $task_status = $_REQUEST['task_status'];

    $sql = "UPDATE `task` SET `task_title` = '$tasktitle', `task_category` = '$task_category', `project` = '$task_project', `task_start_date` = '$task_start_date', `task_end_date` = '$task_end_date', `due_date` = '$due_date', `assign_to` = '$assgin_to', `task_description` = '$task_desc', `task_status` = '$task_status' WHERE `id` = '$id'";
    if ($conn->query($sql) == TRUE) {
        // below msg display on form submit success
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Work Assigned Successfully </div>';
    } else {
        // below msg display on form submit failed
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Assign Work </div>';
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
                    <span class="text">Edit Task</span>
                </div>
                <div class="col-auto">
                    <!-- save and close button -->
                    <a type="button" class="btn btn-outline-primary" href="./tasks.php">
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
                        <div class="row">
                            <?php
                            if (isset($_REQUEST['id'])) {
                                $id = $_REQUEST['id'];
                                $sql = "SELECT * FROM `task` WHERE `id` = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);

                            }
                            ?>
                            <h5 class="mb-3">Task Info</h5>
                            <div class="row mb-4">
                                <!-- input id hidden -->
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <!-- Task Title -->
                                <div class="col-6 mb-3">
                                    <label for="TaskTitle" class="form-label">Task Title</label>
                                    <input type="text" class="form-control" id="TaskTitle" name="tasktitle" aria-describedby="TaskTitle" value="<?php echo $row['task_title'] ?>">
                                </div>
                                <!-- task category -->
                                <div class="col-6 mb-3">
                                    <label for="TaskCategory" class="form-label">Task Category</label>
                                    <div class="input-group">
                                        <select class="form-select" name="task_category" aria-label="Default select example">
                                            <option selected><?php echo $row['task_category'] ?></option>
                                            <option value="1">Category 1</option>
                                            <option value="2">Category 2</option>
                                            <option value="3">Category 3</option>
                                        </select>
                                        <button class="btn btn-outline-primary" type="button" id="button-addon2">Add</button>
                                    </div>
                                </div>
                                <!-- Project -->
                                <div class="col-6 mb-3">
                                    <label for="TaskProject" class="form-label">Project</label>
                                    <select class="form-select" name="task_project" aria-label="Default select example">
                                        <option selected><?php echo $row['project'] ?></option>
                                        <!-- show options after fetching data from database -->
                                        <?php $project = "SELECT * FROM `projects`";
                                        $project_result = mysqli_query($conn, $project);
                                        while ($projects_data = mysqli_fetch_assoc($project_result)) {
                                            echo "<option value='" . $projects_data['project_name'] . "'>" . $projects_data['project_name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-3 mb-3">
                                        <label for="TaskStartDate" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="TaskStartDate" name="task_start_date" aria-describedby="TaskStartDate" value="<?php echo $row['task_start_date'] ?>">
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="TaskEndDate" class="form-label">End Date</label>
                                        <input type="date" class="form-control" id="TaskEndDate" name="task_end_date" aria-describedby="TaskEndDate" value="<?php echo $row['task_end_date'] ?>">
                                    </div>
                                    <!-- without due date -->
                                    <div class="col-3 mb-3 pt-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?php echo $row['due_date'] ?>" name="due_date" id="flexCheckDefault">
                                            <label class="form-check label" for="flexCheckDefault">
                                                Without Due Date
                                            </label>
                                        </div>
                                    </div>
                                    <!-- task status -->
                                    <div class="col-3 mb-3">
                                        <label for="TaskStatus" class="form-label">Task Status</label>
                                        <select class="form-select" name="task_status" aria-label="Default select example">
                                            <option selected><?php echo $row['task_status'] ?></option>
                                            <option value="1">Incomplete</option>
                                            <option value="2">Completed</option>
                                            <option value="3">In Progress</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- assigned to -->
                                <div class="col-6 mb-3">
                                    <label for="TaskAssignedTo" class="form-label">Assigned To</label>
                                    <select class="form-select" name="assign_to" aria-label="Default select example">
                                        <option selected><?php echo $row['assign_to'] ?></option>
                                        <option value="1">User 1</option>
                                        <option value="2">User 2</option>
                                        <option value="3">User 3</option>
                                    </select>
                                </div>
                                <!-- Description -->
                                <div class="col-12 mb-3">
                                    <label for="TaskDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="TaskDescription" name="task_desc" rows="3"><?php echo $row['task_description'] ?></textarea>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary" name="save"><i class='bx bx-save'>Save</i></button>
                                </div>
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