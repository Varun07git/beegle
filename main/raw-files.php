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

    * {
        margin: 0;
        padding: 0;
    }

    html {
        font-family: poppins;
        font-size: medium;
    }

    table {
        border-collapse: collapse;
        border: 2px solid rgb(200, 200, 200);
        letter-spacing: 1px;
        font-size: 0.8rem;
    }

    td,
    th {
        border: 1px solid rgb(190, 190, 190);
        padding: 10px 20px;
    }

    /* th {
    background-color: rgb(235,235,235);
  } */

    td {
        text-align: center;
    }

    /* tr:nth-child(even) td {
    background-color: rgb(250,250,250);
  }
  
  tr:nth-child(odd) td {
    background-color: rgb(245,245,245);
  } */
    /* My CSS */

    .tableHead,
    .Raw h3{
        padding: 0px 10px 0px 10px;
        font-size: 1.5rem;
        font-weight: bold;
        color: #0f7dff;
    }

    .image {
        float: left;
    }

    .tableH1 {
        width: max-content;
        padding: 1px 3px;
        color: red;
        font-weight: bold;
        border: 2px solid red;
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
        <div class="row project-section">
            <div class="Raw">
                <h3>Raw Files</h3>
            </div>
            <table>
                <tr class="tableHead">
                    <td></td>
                    <th>Project</th>
                    <th>Free Before</th>
                    <th>Download</th>
                </tr>
                <tr>
                    <th>1</th>
                    <td>
                        <div class="tableH1">EXPIRED</div>
                        <div class="row">
                            <div class="col-8">
                                Tobaco Area Estimation
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-danger">Subscribe</button>
                            </div>
                        </div>


                    </td>
                    <td>
                        <div>
                            10-01-2022
                        </div>
                    </td>
                    <td>
                        <div class="image">
                            <img src="./img/32.png" width="40px" height="40px" alt="zip rip"> 68 GB
                        </div>

                    </td>
                </tr>
                <tr>
                    <th>2</th>
                    <td>Area Counting -KG Halli</td>
                    <td>21-02-2022</td>
                    <td>
                        <div class="image">
                            <img src="./img/32.png" width="40px" height="40px" alt="zip rip"> 114 GB
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Area Counting -Hunsuru</td>
                    <td>03-03-2002</td>
                    <td>
                        <div class="image">
                            <img src="./img/32.png" width="40px" height="40px" alt="zip rip"> 79 GB
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>4</th>
                    <td>Crop Counting -Hunsuru</td>
                    <td>04-04-2002</td>
                    <td>
                        <div class="image">
                            <img src="./img/32.png" width="40px" height="40px" alt="zip rip"> 15 GB
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php
include('./include/footer.php');
?>