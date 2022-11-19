        <style>
            /* Sidebar CSS in normal state */

            .wrapper {
                display: flex;
                align-items: stretch;
            }

            #sidebar {
                min-width: 300px;
                max-width: 300px;
                background: #efefef;
                color: #000;
                transition: all 0.3s;
            }

            #sidebar .sidebar-list-items {
                margin-left: 30px;
            }

            .sidebar-header h4 {
                color: #0f7dff;
            }

            .sidebar-header h5 {
                font-size: 1rem;
            }

            .sidebar-header h6 {
                color: #0f7dff;
            }

            .sidebar-header p {
                font-size: 0.7rem;
            }

            #sidebar ul li a {
                text-align: left;
            }

            #sidebar ul li a img {
                width: 20px;
                height: 20px;
            }

            #sidebar .sidebar-header {
                padding: 20px;
                padding-bottom: 4px;
                background: #efefef;
            }

            #sidebar .list-header {
                color: #0f7dff;
                font-weight: bold;
                font-size: 1.2rem;
            }

            #sidebar .list-sub-header {
                font-size: 1rem;
            }

            #sidebar ul li a {
                padding: 4px;
                font-size: 1.1em;
                display: block;
            }

            #sidebar ul li a:hover {
                color: #0f7dff;
                background: #fff;
            }

            #sidebar ul li a i {
                margin-right: 10px;
            }

            .divider {
                border-bottom: 1.5px solid #0f7dff;
                display: block;
                margin: 7px 10px;
                width: 80%;
                justify-content: center;
            }


            /* Sidebar CSS in collapsed state  */

            #sidebar.active {
                min-width: 80px;
                max-width: 80px;
                text-align: center;
            }

            #sidebar.active .sidebar-list-items {
                margin-left: 0px;
            }

            #sidebar.active .sidebar-header h4,
            #sidebar.active .sidebar-header h5,
            #sidebar.active .sidebar-header h6,
            #sidebar.active .sidebar-header p {
                display: none;
            }

            #sidebar.active .sidebar-header .pp {
                display: block;
            }

            #sidebar.active ul li a img {
                margin-left: 20px;
                width: 25px;
                height: 25px;
            }

            #sidebar.active ul li a {
                padding: 8px 10px;
                text-align: center;
                font-size: 0.85em;
            }

            #sidebar.active .list-sub-header {
                display: none
            }

            #sidebar.active ul li .list-header {
                padding: 3px 10px;
                text-align: center;
                font-size: 1rem;
                margin-bottom: 0px;
                padding-left: 3px;
            }

            #sidebar.active ul li a i {
                margin-right: 0;
                display: block;
                font-size: 1.8em;
                margin-bottom: 5px;
            }

            #sidebar.active ul ul a {
                padding: 10px !important;
            }

            /* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

            @media (max-width: 768px) {
                #sidebar {
                    min-width: 80px;
                    max-width: 80px;
                    text-align: center;
                    margin-left: -80px !important;
                }

                .dropdown-toggle::after {
                    top: auto;
                    bottom: 10px;
                    right: 50%;
                    -webkit-transform: translateX(50%);
                    -ms-transform: translateX(50%);
                    transform: translateX(50%);
                }

                #sidebar.active {
                    margin-left: 0 !important;
                }

                #sidebar .sidebar-header h3,
                #sidebar .CTAs {
                    display: none;
                }

                #sidebar .sidebar-header .pp {
                    display: block;
                }

                #sidebar ul li a {
                    padding: 20px 10px;
                }

                #sidebar ul li a span {
                    font-size: 0.85em;
                }

                #sidebar ul li a i {
                    margin-right: 0;
                    display: block;
                }

                #sidebar ul ul a {
                    padding: 10px !important;
                }

                #sidebar ul li a i {
                    font-size: 1.3em;
                }

                #sidebar {
                    margin-left: 0;
                }

                #sidebarCollapse span {
                    display: none;
                }
            }
        </style>
        <!-- Sidebar  -->
        <nav id="sidebar">
            <button type="button" id="sidebarCollapse" class="btn">
                <img src="./img/menu-rmbg.png" alt="" width="33px" height="30px">
                <!-- <i class="fas fa-align-left"></i> -->
                <!-- <span>Toggle Sidebar</span> -->
            </button>
            <div class="sidebar-header">
                <div class="row">
                    <div class="col-3 pp"><img src="./img/user.png" alt="" width="50px" height="50px" style="border-radius: 50%;"></div>
                    <div class="col-9">
                        <h4 class="mb-0">Uday T U</h4>
                        <p class="mb-0">xyz@beegleagritech.com</p>
                        <h6>ITC Ltd.</h6>
                        <h5><img src="./img/edit-profile.png" alt="" width="30px" height="30px"> Edit Profile</h5>
                    </div>
                </div>
            </div>
            <div class="sidebar-list-items">
                <ul class="list-unstyled">
                    <li class="active">
                        <h3 class="list-header">Porject</h3>
                    </li>
                    <li>
                        <a href="../main/projects.php">
                            <div class="row">
                                <div class="col-auto ps-1"><img src="./img/11-rmbg.png" alt=""></div>
                                <div class="col-auto list-sub-header">Projects</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="../main/project-details.php">
                            <div class="row">
                                <div class="col-auto ps-1"><img src="./img/task-rmbg.png" alt=""></div>
                                <div class="col-auto list-sub-header">Project Details</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="../main/raw-files.php">
                            <div class="row">
                                <div class="col-auto ps-1"><img src="./img/raw-rmbg.png" alt=""></div>
                                <div class="col-auto list-sub-header">Raw Files</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="divider">
            </div>
            <div class="sidebar-list-items">
                <ul class="list-unstyled">
                    <li class="active">
                        <h3 class="list-header">Services</h3>
                    </li>
                    <li>
                        <a href="../main/our-services.php">
                            <div class="row">
                                <div class="col-auto ps-1"><img src="./img/our-serv-rmbg.png" alt=""></div>
                                <div class="col-auto list-sub-header">Our Services</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="../main/our-services.php" onclick="showModal(); return false">
                            <div class="row">
                                <div class="col-auto ps-1"><img src="./img/demo-rmbg.png" alt=""></div>
                                <div class="col-auto list-sub-header">Request Demo</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="../main/our-services.php" onclick="showModal3(); return false">
                            <div class="row">
                                <div class="col-auto ps-1"><img src="./img/quote-rmbg.png" alt=""></div>
                                <div class="col-auto list-sub-header">Request Quote</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="../main/our-services.php" onclick="showModal2(); return false">
                            <div class="row">
                                <div class="col-auto ps-1"><img src="./img/book-serv-rmbg.png" alt=""></div>
                                <div class="col-auto list-sub-header">Request Services</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="divider">
            </div>
            <div class="sidebar-list-items">
                <ul class="list-unstyled">
                    <li class="active">
                        <h3 class="list-header">Support</h3>
                    </li>
                    <li>
                        <a href="#">
                            <div class="row">
                                <div class="col-auto ps-1"><img src="./img/customer-rmbg.png" alt=""></div>
                                <div class="col-auto list-sub-header">Customer Support</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="row">
                                <div class="col-auto ps-1"><img src="./img/tickets-rmbg.png" alt=""></div>
                                <div class="col-auto list-sub-header">Tickets</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="row">
                                <div class="col-auto ps-1"><img src="./img/logout-rmbg.png" alt=""></div>
                                <div class="col-auto list-sub-header">Logout</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>