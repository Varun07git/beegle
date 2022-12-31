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
                    <span class="text">Profile Settings</span>
                </div>
                <?php include_once './settings_sidebar.php'; ?>
                <!-- company setting form -->
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <!-- form header -->
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="card-title">Profile Settings</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pt-4">
                                    <!-- profile settings -->
                                    <div class="col-3">
                                        <div class="card" style="width: 16rem;">
                                            <img class="card-img-top" src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61" alt="Card image cap">
                                            <div class="card-body">
                                                <input class="form-control" type="file" style="background-color: rgba(40, 42, 42, 0.06);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <!-- your name -->
                                                <div class="form-group">
                                                    <label for="yourName">Your Name</label>
                                                    <input type="text" class="form-control" id="yourName" placeholder="Your Name">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <!-- your email -->
                                                <div class="form-group">
                                                    <label for="yourEmail">Your Email</label>
                                                    <input type="email" class="form-control" id="yourEmail" placeholder="Your Email">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <!-- your password -->
                                                <div class="form-group">
                                                    <label for="yourPassword">Your Password</label>
                                                    <input type="password" class="form-control" id="yourPassword" placeholder="Your Password">
                                                </div>
                                            </div>
                                            <!-- country -->
                                            <div class="col-6 mb-3">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <select class="form-control" id="country">
                                                        <option>India</option>
                                                        <option>USA</option>
                                                        <option>UK</option>
                                                        <option>Canada</option>
                                                        <option>Japan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- mobile -->
                                            <div class="col-6 mb-3">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile</label>
                                                    <input type="text" class="form-control" id="mobile" placeholder="Mobile">
                                                </div>
                                            </div>
                                            <!-- change language -->
                                            <div class="col-6 mb-3">
                                                <div class="form-group">
                                                    <label for="language">Change Language</label>
                                                    <select class="form-control" id="language">
                                                        <option selected>English</option>
                                                        <option value="English">English</option>
                                                        <option value="Hindi">Hindi</option>
                                                        <option value="Japanese">Japanese</option>
                                                        <option value="French">French</option>
                                                        <option value="German">German</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- gender  -->
                                            <div class="col-6 mb-3">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select class="form-control" id="gender">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- date of birth -->
                                            <div class="col-6 mb-3">
                                                <div class="form-group">
                                                    <label for="dob">Date of Birth</label>
                                                    <input type="date" class="form-control" id="dob" placeholder="Date of Birth">
                                                </div>
                                            </div>
                                            <!-- address textarea -->
                                            <div class="col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <textarea class="form-control" id="address" rows="3" placeholder="e.g. 132, My Street, Kingston, New York 12401"></textarea>
                                                </div>
                                            </div>
                                        </div>        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-outline-primary">Close</button>
                                    </div>
                                </div>
                            </form>
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