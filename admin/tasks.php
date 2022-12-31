<?php include_once './include/header.php'; ?>
<?php include_once './include/sidebar.php'; ?>
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
                                            <input type="text" class="form-control" id="TaskTitle" aria-describedby="TaskTitle">
                                        </div>
                                        <!-- task category -->
                                        <div class="col-6 mb-3">
                                            <label for="TaskCategory" class="form-label">Task Category</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Select Category</option>
                                                <option value="1">Category 1</option>
                                                <option value="2">Category 2</option>
                                                <option value="3">Category 3</option>
                                            </select>
                                        </div>
                                        <!-- Project -->
                                        <div class="col-6 mb-3">
                                            <label for="TaskProject" class="form-label">Project</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Select Project</option>
                                                <option value="1">Project 1</option>
                                                <option value="2">Project 2</option>
                                                <option value="3">Project 3</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 mb-3">
                                                <label for="TaskStartDate" class="form-label">Start Date</label>
                                                <input type="date" class="form-control" id="TaskStartDate" aria-describedby="TaskStartDate">
                                            </div>
                                            <div class="col-3 mb-3">
                                                <label for="TaskEndDate" class="form-label">End Date</label>
                                                <input type="date" class="form-control" id="TaskEndDate" aria-describedby="TaskEndDate">
                                            </div>
                                            <!-- without due date -->
                                            <div class="col-3 mb-3 pt-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check label" for="flexCheckDefault">
                                                        Without Due Date
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- assigned to -->
                                        <div class="col-6 mb-3">
                                            <label for="TaskAssignedTo" class="form-label">Assigned To</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Select User</option>
                                                <option value="1">User 1</option>
                                                <option value="2">User 2</option>
                                                <option value="3">User 3</option>
                                            </select>
                                        </div>
                                        <!-- Description -->
                                        <div class="col-12 mb-3">
                                            <label for="TaskDescription" class="form-label">Description</label>
                                            <textarea class="form-control" id="TaskDescription" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
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
                                <!-- table check box -->
                                <td><b>id</b></td>
                                <td><b>Code</b></td>
                                <td><b>Task</b></td>
                                <td><b>Project</b></td>
                                <td><b>Deadline</b></td>
                                <td><b>hours Logged</b></td>
                                <td><b>Assigned To</b></td>
                                <td><b>Status</b></td>
                                <td><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" class="form-check-input" id="exampleCheck1"></td>
                                <td>1</td>
                                <td>Task 1</td>
                                <td>Project 1</td>
                                <td>12/12/2021</td>
                                <td>10</td>
                                <td>user 1</td>
                                <!-- status -->
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Status
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Pending</a></li>
                                            <li><a class="dropdown-item" href="#">In Progress</a></li>
                                            <li><a class="dropdown-item" href="#">Completed</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('./include/footer.php');
?>