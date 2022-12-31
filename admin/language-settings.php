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

    /* setting sidebar css */
    @media screen and (max-width: 992px) {

        .row-offcanvas {
            position: relative;
            -webkit-transition: all 0.25s ease-out;
            -moz-transition: all 0.25s ease-out;
            transition: all 0.25s ease-out;
        }

        .row-offcanvas-left .sidebar-offcanvas {
            left: -33%;
        }

        .row-offcanvas-left.active {
            left: 33%;
            margin-left: -6px;
        }

        .sidebar-offcanvas {
            position: absolute;
            top: 0;
            width: 33%;
            height: 100%;
            overflow: auto;
        }
    }

    /*
* Off Canvas wider at sm breakpoint
* --------------------------------------------------
*/
    @media screen and (max-width: 34em) {
        .row-offcanvas-left .sidebar-offcanvas {
            left: -45%;
        }

        .row-offcanvas-left.active {
            left: 45%;
            margin-left: -6px;
        }

        .sidebar-offcanvas {
            width: 45%;
        }
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
                    <span class="text">Language Settings</span>
                </div>
                <?php include_once './settings_sidebar.php'; ?>
                <!-- company setting form -->
                <div class="col">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewLanguage"><i class="bx bx-plus"></i> Add New Language</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Language Settings</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <table id="mytable" class="display project-table" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <!-- table check box -->
                                                <td><b>Language Name</b></td>
                                                <td><b>Language Code</b></td>
                                                <td><b>Action</b></td>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>Arabic</td>
                                            <td>AR</td>
                                            <td>
                                                <a href="" class="btn btn-outline-secondary">Edit</a>
                                                <a href="" class="btn btn-outline-secondary">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>English</td>
                                            <td>ENG</td>
                                            <td>
                                                <a href="" class="btn btn-outline-secondary">Edit</a>
                                                <a href="" class="btn btn-outline-secondary">Delete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Russian</td>
                                            <td>RU</td>
                                            <td>
                                                <a href="" class="btn btn-outline-secondary">Edit</a>
                                                <a href="" class="btn btn-outline-secondary">Delete</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </main>
                <!--/main col-->
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<?php
include('./include/footer.php');
?>