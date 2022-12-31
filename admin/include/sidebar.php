<style>
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 260px;
        background: #0f7dff;
        z-index: 100;
        transition: all 0.5s ease;
    }

    .sidebar.close {
        width: 78px;
    }

    .sidebar .logo-details {
        height: 60px;
        width: 100%;
        display: flex;
        align-items: center;
    }

    .sidebar .logo-details img {
        height: 40px;
        width: 20px;
        min-width: 78px;
        text-align: center;
    }

    .sidebar .logo-details .logo_name {
        font-size: 22px;
        color: #fff;
        font-weight: 600;
        transition: 0.3s ease;
        transition-delay: 0.1s;
    }

    .sidebar.close .logo-details .logo_name {
        transition-delay: 0s;
        opacity: 0;
        pointer-events: none;
    }

    .sidebar .nav-links {
        height: 100%;
        padding: 30px 0 150px 0;
        overflow: auto;
    }

    .sidebar.close .nav-links {
        overflow: visible;
    }

    .sidebar .nav-links::-webkit-scrollbar {
        display: none;
    }

    .sidebar .nav-links li {
        position: relative;
        list-style: none;
        transition: all 0.4s ease;
    }

    .sidebar .nav-links li:hover {
        background: #1d1b31;
    }

    .sidebar .nav-links li .iocn-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .sidebar.close .nav-links li .iocn-link {
        display: block
    }

    .sidebar .nav-links li i {
        height: 50px;
        min-width: 78px;
        text-align: center;
        line-height: 50px;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .sidebar .nav-links li.showMenu i.arrow {
        transform: rotate(-180deg);
    }

    .sidebar.close .nav-links i.arrow {
        display: none;
    }

    .sidebar .nav-links li a {
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    .sidebar .nav-links li a .link_name {
        font-size: 18px;
        font-weight: 400;
        color: #fff;
        transition: all 0.4s ease;
    }

    .sidebar.close .nav-links li a .link_name {
        opacity: 0;
        pointer-events: none;
    }

    .sidebar .nav-links li .sub-menu {
        padding: 6px 6px 14px 80px;
        margin-top: -10px;
        background: #1d1b31;
        display: none;
    }

    .sidebar .nav-links li.showMenu .sub-menu {
        display: block;
    }

    .sidebar .nav-links li .sub-menu a {
        color: #fff;
        font-size: 15px;
        padding: 5px 0;
        white-space: nowrap;
        opacity: 0.6;
        transition: all 0.3s ease;
    }

    .sidebar .nav-links li .sub-menu a:hover {
        opacity: 1;
    }

    .sidebar.close .nav-links li .sub-menu {
        position: absolute;
        left: 100%;
        top: -10px;
        margin-top: 0;
        padding: 10px 20px;
        border-radius: 0 6px 6px 0;
        opacity: 0;
        display: block;
        pointer-events: none;
        transition: 0s;
    }

    .sidebar.close .nav-links li:hover .sub-menu {
        top: 0;
        opacity: 1;
        pointer-events: auto;
        transition: all 0.4s ease;
    }

    .sidebar .nav-links li .sub-menu .link_name {
        display: none;
    }

    .sidebar.close .nav-links li .sub-menu .link_name {
        font-size: 18px;
        opacity: 1;
        display: block;
    }

    .sidebar .nav-links li .sub-menu.blank {
        opacity: 1;
        pointer-events: auto;
        padding: 3px 20px 6px 16px;
        opacity: 0;
        pointer-events: none;
    }

    .sidebar .nav-links li:hover .sub-menu.blank {
        top: 50%;
        transform: translateY(-50%);
    }

    .sidebar .profile-details {
        position: fixed;
        bottom: 0;
        width: 260px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #1d1b31;
        padding: 12px 0;
        transition: all 0.5s ease;
    }

    .sidebar.close .profile-details {
        background: none;
    }

    .sidebar.close .profile-details {
        width: 78px;
    }

    .sidebar .profile-details .profile-content {
        display: flex;
        align-items: center;
    }

    .sidebar .profile-details img {
        height: 52px;
        width: 52px;
        object-fit: cover;
        border-radius: 16px;
        margin: 0 14px 0 12px;
        background: #1d1b31;
        transition: all 0.5s ease;
    }

    .sidebar.close .profile-details img {
        padding: 10px;
    }

    .sidebar .profile-details .profile_name,
    .sidebar .profile-details .job {
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        white-space: nowrap;
    }

    .sidebar.close .profile-details i,
    .sidebar.close .profile-details .profile_name,
    .sidebar.close .profile-details .job {
        display: none;
    }

    .sidebar .profile-details .job {
        font-size: 12px;
    }

    .home-section {
        position: relative;
        background: #E4E9F7;
        height: 100%;
        left: 260px;
        width: calc(100% - 260px);
        transition: all 0.5s ease;
        padding: 12px;
    }

    .sidebar.close~.home-section {
        left: 78px;
        width: calc(100% - 78px);
    }

    .home-content {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }

    .home-section .home-content .bx-menu,
    .home-section .home-content .text {
        color: #11101d;
        font-size: 35px;
    }

    .home-section .home-content .bx-menu {
        cursor: pointer;
        margin-right: 10px;
    }

    .home-section .home-content .text {
        font-size: 26px;
        font-weight: 600;
    }

    @media screen and (max-width: 400px) {
        .sidebar {
            width: 240px;
        }

        .sidebar.close {
            width: 78px;
        }

        .sidebar .profile-details {
            width: 240px;
        }

        .sidebar.close .profile-details {
            background: none;
        }

        .sidebar.close .profile-details {
            width: 78px;
        }

        .home-section {
            left: 240px;
            width: calc(100% - 240px);
        }

        .sidebar.close~.home-section {
            left: 78px;
            width: calc(100% - 78px);
        }
    }
</style>
<div class="sidebar close">
    <div class="logo-details">
        <img src="./img/3.png" alt="hello">
        <span class="logo_name">beegle Agritch</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="../admin/dashboard.php">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="../admin/dashboard.php">Dashboard</a></li>
            </ul>
        </li>
        <li>
            <a href="../admin/clients.php">
            <i class='bx bx-user'></i>
                <span class="link_name">Clients</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="../admin/clients.php">Clients</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                <i class='bx bx-briefcase-alt-2' ></i>
                    <span class="link_name">Work</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Work</a></li>
                <li><a href="../admin/projects.php">Projects</a></li>
                <li><a href="../admin/tasks.php">Tasks</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-dollar'></i>
                    <span class="link_name">Finance</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Finance</a></li>
                <li><a href="../admin/quotation.php">Quotation</a></li>
                <li><a href="../admin/invoice.php">Invoices</a></li>
                <li><a href="../admin/payment.php">Payments</a></li>
                <li><a href="../admin/expenses.php">Expenses</a></li>
            </ul>
        </li>
        <li>
            <a href="../admin/services.php">
                <i class='bx bx-shopping-bag' ></i>
                <span class="link_name">Services/Products</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="../admin/services.php">Services/Products</a></li>
            </ul>
        </li>
        <li>
            <a href="../admin/usecases.php">
            <i class='bx bx-shape-circle'></i>
                <span class="link_name">Use Cases</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="../admin/usecases.php">Use Cases</a></li>
            </ul>
        </li>
        <li>
            <a href="../admin/tickets.php">
                <i class='bx bx-headphone'></i>
                <span class="link_name">Ticket</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="../admin/tickets.php">Ticket</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-chat' ></i>
                <span class="link_name">Messages</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Messages</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="link_name">Report</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Report</a></li>
                <li><a href="#">Nothing</a></li>
            </ul>
        </li>
        <li>
            <a href="../admin/company-settings.php">
                <i class='bx bx-cog'></i>
                <span class="link_name">Setting</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="../admin/company-settings.php">Setting</a></li>
            </ul>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="./img/22.png" alt="Img">
                </div>
                <div class="name-job">
                    <div class="profile_name">Admin</div>
                    <div class="job">Managing Director</div>
                </div>
                <i class='bx bx-log-out'></i>
            </div>
        </li>
    </ul>
</div>