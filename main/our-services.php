<?php
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
                <h3>Our Services</h3>
            </div>
            <div class="container">
                <div class="row ms-5">
                    <div class="col-2 services">
                        <img src="./img/31.png" alt="">
                        <h5>Mapping, Survey & Image Processing</h5>
                    </div>
                    <div class="col-2 services">
                        <img src="./img/32.png" alt="">
                        <h5>Crop Health & Stress Analysis</h5>
                    </div>
                    <div class="col-2 services">
                        <img src="./img/33.png" alt="">
                        <h5>Crop Count & Yield Estimation</h5>
                    </div>
                    <div class="col-2 services">
                        <img src="./img/37.png" alt="">
                        <h5>RGB, NDVI, Thermal Imaging</h5>
                    </div>
                </div>
                <div class="row ms-5">
                    <div class="col-2 services">
                        <img src="./img/34.png" alt="">
                        <h5>Research & Development Assistence</h5>
                    </div>
                    <div class="col-2 services">
                        <img src="./img/35.png" alt="">
                        <h5>Forest & Plantation Scanning</h5>
                    </div>
                    <div class="col-2 services">
                        <img src="./img/36.png" alt="">
                        <h5>Spraying & Seed Bombing</h5>
                    </div>
                    <div class="col-2 services">
                        <img src="./img/38.png" alt="">
                        <h5>3D Mapping</h5>
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