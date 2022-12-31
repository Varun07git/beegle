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
                    <span class="text">Project Template</span>
                </div>
                <div class="col-auto">
                    <!-- add project template modal button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProjectTemplateModal">
                        Add Project Template
                    </button>
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
            <!-- Add CRM client Modal to client account and company details -->
            <div class="modal fade" id="addProjectTemplateModal" tabindex="-1" aria-labelledby="addProjectTemplateModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProjectTemplateModalLabel">Add Project Template</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-5 py-5 ">
                            <form>
                                <!-- account details -->
                                <div class="row">
                                    <h5 class="mb-3">Project Details</h5>
                                    <div class="row mb-4">
                                        <!-- project name -->
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="projectName" class="form-label">Project Name</label>
                                                <input type="text" class="form-control" id="projectName" placeholder="Project Name">
                                            </div>
                                        </div>
                                        <!-- project category -->
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="projectCategory" class="form-label">Project Category</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>--</option>
                                                    <option value="1">Category 1</option>
                                                    <option value="2">Category 2</option>
                                                    <option value="3">Category 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- project summary -->
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="projectSummary" class="form-label">Project Summary</label>
                                                <textarea class="form-control" id="projectSummary" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <!-- notes -->
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="notes" class="form-label">Notes</label>
                                                <textarea class="form-control" id="notes" rows="3"></textarea>
                                            </div>
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
                                <td><b>Project Name</b></td>
                                <td><b>Members</b></td>
                                <td><b>Project category</b></td>
                                <td><b>Action</b></td>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('./include/footer.php');
?>