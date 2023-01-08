<?php
include_once './include/dbconnect.php';
include_once './include/header.php'; 
include_once './include/sidebar.php';
if (isset($_REQUEST['addtask'])) {
    $tasktitle = $_REQUEST['tasktitle'];
    $task_category = $_REQUEST['task_category'];
    $task_project = $_REQUEST['task_project'];
    $task_start_date = $_REQUEST['task_start_date'];
    $task_end_date = $_REQUEST['task_end_date'];
    $due_date = 1;
    $assgin_to = $_REQUEST['assign_to'];
    $task_desc = $_REQUEST['task_desc'];
    
    $sql = "INSERT INTO `task`(`task_title`, `task_category`, `project`, `task_start_date`, `task_end_date`, `due_date`, `assign_to`, `task_description`) VALUES ('$tasktitle','$task_category','$task_project','$task_start_date','$task_end_date','$due_date','$assgin_to','$task_desc')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Task Added Successfully');</script>";
    } else {
        echo "<script>alert('Task Not Added');</script>";
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
                    <span class="text">Tasks</span>
                </div>
                <div class="col-auto">
                    <!-- add task modal button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTaskModal">
                        <i class='bx bx-plus'></i>Add Task
                    </button>
                </div>
                <!-- My task button outline with icon -->
                <div class="col-auto">
                    <button class="btn btn-outline-primary"><i class='bx bx-task'></i>My Task</button>
                </div>

                <!-- import export button outline with icon
                <div class="col-auto">
                    <button class="btn btn-outline-primary"><i class='bx bx-import'></i>Import</button>
                </div>
                <div class="col-auto">
                    <button class="btn btn-outline-primary"><i class='bx bx-export'></i>Export</button>
                </div> -->
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
            <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addTaskLabel">Add Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-5 py-4">
                            <form>
                                <!-- account details -->
                                <div class="row">
                                    <h5 class="mb-3">Task Info</h5>
                                    <div class="row mb-4">
                                        <!-- Task Title -->
                                        <div class="col-6 mb-3">
                                            <label for="TaskTitle" class="form-label">Task Title</label>
                                            <input type="text" class="form-control" id="TaskTitle" name="tasktitle" aria-describedby="TaskTitle">
                                        </div>
                                        <!-- task category -->
                                        <div class="col-6 mb-3">
                                            <label for="TaskCategory" class="form-label">Task Category</label>
                                            <div class="input-group">
                                            <select class="form-select" name="task_category" aria-label="Default select example">
                                                <option selected>Select Category</option>
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
                                                <option selected>Select Project</option>
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
                                                <input type="date" class="form-control" id="TaskStartDate" name="task_start_date" aria-describedby="TaskStartDate">
                                            </div>
                                            <div class="col-3 mb-3">
                                                <label for="TaskEndDate" class="form-label">End Date</label>
                                                <input type="date" class="form-control" id="TaskEndDate" name="task_end_date" aria-describedby="TaskEndDate">
                                            </div>
                                            <!-- without due date -->
                                            <div class="col-3 mb-3 pt-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" name="due_date" id="flexCheckDefault">
                                                    <label class="form-check label" for="flexCheckDefault">
                                                        Without Due Date
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- assigned to -->
                                        <div class="col-6 mb-3">
                                            <label for="TaskAssignedTo" class="form-label">Assigned To</label>
                                            <select class="form-select" name="assign_to" aria-label="Default select example">
                                                <option selected>Select User</option>
                                                <option value="1">User 1</option>
                                                <option value="2">User 2</option>
                                                <option value="3">User 3</option>
                                            </select>
                                        </div>
                                        <!-- Description -->
                                        <div class="col-12 mb-3">
                                            <label for="TaskDescription" class="form-label">Description</label>
                                            <textarea class="form-control" id="TaskDescription" name="task_desc" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="addtask">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php
            $sql2 = "SELECT * FROM `task`";
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
                                <td><b>Code</b></td>
                                <td><b>Task</b></td>
                                <td><b>Project</b></td>
                                <td><b>Deadline</b></td>
                                <td><b>Assigned To</b></td>
                                <td><b>Status</b></td>
                                <td><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                $id = $row2['id'];
                                $title= $row2['task_title'];
                                $project = $row2['project'];
                                $deadline = $row2['task_end_date'];
                                $assigned = $row2['assign_to'];
                                $status = $row2['task_status'];
                                echo
                                    "<tr>
                                    <td>$id</td>
                                    <td>$title</td>
                                    <td>$project</td>
                                    <td>$deadline</td>
                                    <td>$assigned</td>
                                    <td>$status</td>
                                    <td>
                                        <div class='dropdown'>
                                            <button class='btn btn-outline-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                                Action
                                            </button>
                                            <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                                                <li><a class='dropdown-item' href='edit-task.php?id=$id'>Edit</a></li>
                                                <li><a class='dropdown-item' href='task.php?delete=$id'>Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    </tr>";
                            }
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