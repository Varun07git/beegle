<?php include_once './include/dbconnect.php' ?>
<?php include_once './include/header.php'; ?>
<?php include_once './include/sidebar.php'; ?>
<?php 
if (isset($_POST['submit'])) {
    $currency_name = $_POST['currency_name'];
    $currency_symbol = $_POST['currency_symbol'];
    $currency_code = $_POST['currency_code'];
    $exchange_rate = $_POST['exchange_rate'];
    $sql = "INSERT INTO `currency`(`currency_name`, `currency_symbol`, `currency_code`, `exchange_rate`) VALUES ('$currency_name','$currency_symbol','$currency_code','$exchange_rate')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Address Added Successfully")</script>';
        echo '<script>window.location.href = "currency-settings.php"</script>';
    } else {
        echo '<script>alert("Address Not Added")</script>';
        echo '<script>window.location.href = "currency-settings.php"</script>';
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
                    <span class="text">Currency Settings</span>
                </div>
                <?php include_once './settings_sidebar.php'; ?>
                <!-- company setting form -->
                <div class="col">
                    <div class="row">
                        <div class="col-12 mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewCurrencyModal">
                                <i class='bx bx-plus'></i>Add New Currency</button>
                        </div>
                    </div>
                    <div class="modal fade" id="addNewCurrencyModal" tabindex="-1" aria-labelledby="addNewCurrencyModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addNewCurrencyLabel">Add New Currency</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body px-5 py-4">
                                <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-6 mb-4">
                                                <div class="form-group">
                                                    <label for="currency_name">Currency Name</label>
                                                    <input type="text" class="form-control" id="currency_name" name="currency_name" placeholder="Enter Currency Name">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-4">
                                                <div class="form-group">
                                                    <label for="currency_symbol">Currency Symbol</label>
                                                    <input type="text" class="form-control" id="currency_symbol" name="currency_symbol" placeholder="Enter Currency Symbol">
                                                </div>
                                            </div>
                                            <!-- currency code -->
                                            <div class="col-6 mb-4">
                                                <div class="form-group">
                                                    <label for="currency_code">Currency Code</label>
                                                    <input type="text" class="form-control" id="currency_code" name="currency_code" placeholder="Enter Currency Code">
                                                </div>
                                            </div>
                                            <!-- exchange rate -->
                                            <div class="col-6 mb-4">
                                                <div class="form-group">
                                                    <label for="exchange_rate">Exchange Rate</label>
                                                    <input type="text" class="form-control" id="exchange_rate" name="exchange_rate" placeholder="Enter Exchange Rate">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Currency Settings</h5>
                                </div>
                            </div>
                            <hr>
                            <?php 
                            $sql2 = "SELECT * FROM `currency`";
                            $result2 = mysqli_query($conn, $sql2);
                            $num = mysqli_num_rows($result2);
                            if ($num > 0) {
                            ?>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <table id="mytable" class="display project-table" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <!-- table check box -->
                                                <td><b>#</b></td>
                                                <td><b>Currency Name</b></td>
                                                <td><b>Currency Symbol</b></td>
                                                <td><b>Currency Code</b></td>
                                                <td><b>Exchange Rate</b></td>
                                                <td><b>Action</b></td>
                                            </tr>
                                        </thead>
                                        <?php
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            $id = $row2['id'];
                                            $currency_name = $row2['currency_name'];
                                            $currency_symbol = $row2['currency_symbol'];
                                            $currency_code = $row2['currency_code'];
                                            $exchange_rate = $row2['exchange_rate'];
                                            echo '
                                        <tr>
                                            <td>' . $id . '</td>
                                            <td>' . $currency_name . '</td>
                                            <td>' . $currency_symbol . '</td>
                                            <td>' . $currency_code . '</td>
                                            <td>' . $exchange_rate . '</td>
                                            <td><a href="edit-project.php?id=' . $id . '" class="btn btn-outline-secondary">Edit</a></td>
                                        </tr>';
                                        }
                                    }
                                        ?>
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