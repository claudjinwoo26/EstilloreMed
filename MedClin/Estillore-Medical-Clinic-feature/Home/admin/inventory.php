<?php
require('../db.php');
include('../auth_sesh.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory - Estillore Medical Clinic</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../stylesheets/inventory.css">
    <script src="https://kit.fontawesome.com/6a6ee22931.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../assets/javascript/scripts.js"></script>
    <style>
        input:focus {
            outline: none !important;
            border-color: #3358FF;
        }

        th {
            position: sticky;
            top: 0;
        }
    </style>
</head>

<body class="p-3 mb-2  inventory-bg text-white" id="body-pd">
    <header class="header bg-black" id="header" style="opacity:.2; height: 69px;">
        <div class="header_toggle"><i class='bx bx-menu' id="header-toggle"></i></div>
    </header>
    <div class="l-navbar p-3 mb-2 bg-black text-white" id="nav-bar">
        <nav class="nav">
            <div>
                <div>
                    <a href="dashboard.php" class="nav_link crazy">
                        <i class="bx bxs-user-circle bx-sm nav_icon"></i>
                        <span class="nav_name">Welcome, <strong><?php echo $_SESSION['username']; ?></strong>!</span>
                    </a>
                </div>
                <br><br>
                <div class="nav_list">
                    <a href="dashboard.php" class="nav_link">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="profiles.php" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Profiles</span>
                    </a>
                    <a href="calendar.php" class="nav_link">
                        <i class='bx bx-calendar nav_icon'></i>
                        <span class="nav_name">Calendar</span>
                    </a>
                    <a href="inventory.php" class="nav_link active">
                        <i class='bx bx-folder nav_icon'></i>
                        <span class="nav_name">Inventory</span>
                    </a>
                    <a href="reports.php" class="nav_link">
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                        <span class="nav_name">Reports</span>
                    </a>
                </div>
            </div> <a href="../logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span> </a>
        </nav>
    </div>
    <div style="margin-left: 80px; margin-top:69px;">
        <div class="container  clearfix p-4 rounded-5"><!-- Inventory Header -->
            <div style="display: flex; flex-direction: row;">
                <h1 style="color: #212584;">Inventory</h1>
                <h1 style="color:#212584; margin-left:50%">Item Categories</h1>
            </div>
            <div class="col-md-12 d-flex">
                <!-- Inventory Header Buttons -->
                <div class="col-md-12">
                    <div class="d-flex justify-content-between">
                        <div class="float">
                            <button type="button" class="btn btn-light row rounded" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+ Add Item</button>
                        </div>
                        <div class="float-right">
                            <a href="medicine.php" target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-light btn-lg rounded" style="background-color:#a7dff2;">Medicine</button></a>
                            <a href="vaccine.php" target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-light btn-lg rounded" style="background-color:#a7dff2;">Vaccine</button></a>
                            <a href="supply.php" target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-light btn-lg rounded" style="background-color:#A2D2F4;">Supplies</button></a>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade text-black" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">+ Add Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form class="form" role="form" method="POST" action="add_item.php">
                                <input type="hidden" name="_token" value="">
                                <div class="form-group row">
                                    <label class="col-md-4">Item Category</label>
                                    <div class="col-md-8 text-black">
                                        <input style="width:20px; height:20px;" type="radio" name="category" value="Medicine"> Medicine
                                        <input style="width:20px; height:20px;" type="radio" name="category" value="Supply"> Supply
                                        <input style="width:20px; height:20px; " type="radio" name="category" value="Vaccine"> Vaccine
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3">Name</label>
                                    <input type="text" class="form-control col-md-8" name="name" placeholder="Enter Item Name" required>
                                </div>
                                <script>
                                    // Restrict input to only letters and spaces
                                    const nameInput = document.querySelector('input[name="name"]');
                                    nameInput.addEventListener('input', function() {
                                        this.value = this.value.replace(/[^A-Za-z ]/g, '');
                                    });
                                </script>
                                <div class="form-group row">
                                    <label class="col-md-3">Quantity</label>
                                    <input type="number" class="form-control col-md-8" name="quantity" placeholder="Enter Quantity" required min="0">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3">Price</label>
                                    <input type="number" class="form-control col-md-8" name="price" placeholder="Enter Price" required min="0" step="0.01">
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5">Expiration Date</label>
                                    <input type="date" class="form-control col-md-5" name="exp_date" min="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5">Manufacturing Date</label>
                                    <input type="date" class="form-control col-md-5" name="mnf_date" max="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Month Alert</label>
                                    <input type="number" class="form-control col-md-3" name="month_alert" placeholder="Months" required min="1">
                                    <label class="col-md-2">Stock Alert</label>
                                    <input type="number" class="form-control col-md-3" name="stock_alert" placeholder="Stocks" required min="0">
                                </div>
                                <div class="modal-footer float-right">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-warning">Add Item</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                $localhost = "localhost";
                $root = "root";
                $password = "";
                $db = "profiles";
                $con = mysqli_connect($localhost, $root, $password, $db);
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                ?>
            <table class="table table-bordered table-striped table-light text-center mt-1" style="font-size:small; height:480px; display:block; overflow-y:scroll;">
            <thead>
                <tr class="kinder-tr kinder-text-base">
                    <th class="hidden-column" scope="col" style="width:5%;">ID</th>
                    <th scope="col" style="width:25%;">Name</th>
                    <th scope="col" style="width:10%;">Quantity</th>
                    <th class="hidden-column" scope="col" style="width:15%;">MNF</th>
                    <th scope="col" style="width:15%;">EXP</th>
                    <th scope="col" style="width:10%;">Stocks</th>
                    <th scope="col" style="width:10%;">Status</th>
                    <th scope="col" style="width:10%;">Category</th>
                    <th scope="col" style="width:10%;">Price</th>
                    <th class="thead-dark" style="width:10%;">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Retrieve and sort data for vaccines
                $vaccineQuery = "SELECT vaccine_id, name, quantity, price, mnf_date, exp_date, stock_alert, month_alert,
                    CASE
                        WHEN exp_date = NOW() THEN 'Expired Today'
                        WHEN exp_date < NOW() THEN 'Already Expired'
                        WHEN exp_date = DATE_ADD(NOW(), INTERVAL month_alert MONTH) THEN 'Near Expiry'
                    END AS 'status',
                    CASE
                        WHEN quantity > stock_alert THEN 'Sufficient Quantity'
                        WHEN quantity <= stock_alert THEN 'Needs Restocking'
                        WHEN quantity = 1 THEN 'Out of Stock'
                    END AS 'stocks',
                    CASE
                        WHEN vaccine_id > 0 THEN 'Vaccine'
                    END AS 'category'
                    FROM vaccines WHERE quantity <= stock_alert OR exp_date <= DATE_ADD(NOW(), INTERVAL month_alert MONTH)
                    ORDER BY name ASC";

                $vaccineResult = $con->query($vaccineQuery);

                while ($rows = $vaccineResult->fetch_assoc()) {
                    ?>
                    <tr class="bg-light">
                        <td class="hidden-column"><?php echo $id = $rows['vaccine_id']; ?></td>
                        <td><?php echo $name = $rows['name']; ?></td>
                        <td><?php echo $quantity = $rows['quantity']; ?></td>
                        <td class="hidden-column"><?php echo $mnf_date = $rows['mnf_date']; ?></td>
                        <td><?php echo $exp_date = $rows['exp_date']; ?></td>
                        <td><?php echo $rows['stocks']; ?></td>
                        <td><?php echo $rows['status']; ?></td>
                        <td><?php echo $category = $rows['category']; ?></td>
                        <td><?php echo $price = $rows['price']; ?></td>
                        <?php
                        echo '
                        <td>
                            <button class="btn btn-warning"><a href="update.php?updateid=' . $id . '&category=' . $category . '&name=' . $name . '&quantity=' . $quantity . '&price=' . $price . '&mnf_date=' . $mnf_date . '&exp_date=' . $exp_date . '&month_alert=' . $rows['month_alert'] . '&stock_alert=' . $rows['stock_alert'] . '" class="text-light">Update</a></button>
                        </td>                    
                        ';
                        ?>
                    </tr>
                <?php
                }
                ?>

                <?php
                // Retrieve and sort data for medicines
                $medicineQuery = "SELECT medicine_id, name, quantity, price, mnf_date, exp_date, stock_alert, month_alert,
                    CASE
                        WHEN exp_date = NOW() THEN 'Expired Today'
                        WHEN exp_date < NOW() THEN 'Already Expired'
                        WHEN exp_date = DATE_ADD(NOW(), INTERVAL month_alert MONTH) THEN 'Near Expiry'
                    END AS 'status',
                    CASE
                        WHEN quantity > stock_alert THEN 'Sufficient Quantity'
                        WHEN quantity <= stock_alert THEN 'Needs Restocking'
                        WHEN quantity = 1 THEN 'Out of Stock'
                    END AS 'stocks',
                    CASE
                        WHEN medicine_id > 0 THEN 'Medicine'
                    END AS 'category'
                    FROM medicines WHERE quantity <= stock_alert OR exp_date <= DATE_ADD(NOW(), INTERVAL month_alert MONTH)
                    ORDER BY name ASC";

                $medicineResult = $con->query($medicineQuery);

                while ($rows = $medicineResult->fetch_assoc()) {
                    ?>
                    <tr class="bg-light">
                        <td class="hidden-column"><?php echo $id = $rows['medicine_id']; ?></td>
                        <td><?php echo $name = $rows['name']; ?></td>
                        <td><?php echo $quantity = $rows['quantity']; ?></td>
                        <td class="hidden-column"><?php echo $mnf_date = $rows['mnf_date']; ?></td>
                        <td><?php echo $exp_date = $rows['exp_date']; ?></td>
                        <td><?php echo $rows['stocks']; ?></td>
                        <td><?php echo $rows['status']; ?></td>
                        <td><?php echo $category = $rows['category']; ?></td>
                        <td><?php echo $price = $rows['price']; ?></td>
                        <?php
                        echo '
                        <td>
                            <button class="btn btn-warning"><a href="update.php?updateid=' . $id . '&category=' . $category . '&name=' . $name . '&quantity=' . $quantity . '&price=' . $price . '&mnf_date=' . $mnf_date . '&exp_date=' . $exp_date . '&month_alert=' . $rows['month_alert'] . '&stock_alert=' . $rows['stock_alert'] . '" class="text-light">Update</a></button>
                        </td>                    
                        ';
                        ?>
                    </tr>
                <?php
                }
                ?>

                <?php
                // Retrieve and sort data for supplies
                $supplyQuery = "SELECT supply_id, name, quantity, price, mnf_date, exp_date, stock_alert, month_alert,
                    CASE
                        WHEN exp_date = NOW() THEN 'Expired Today'
                        WHEN exp_date < NOW() THEN 'Already Expired'
                        WHEN exp_date = DATE_ADD(NOW(), INTERVAL month_alert MONTH) THEN 'Near Expiry'
                    END AS 'status',
                    CASE
                        WHEN quantity > stock_alert THEN 'Sufficient Quantity'
                        WHEN quantity <= stock_alert THEN 'Needs Restocking'
                        WHEN quantity = 1 THEN 'Out of Stock'
                    END AS 'stocks',
                    CASE
                        WHEN supply_id > 0 THEN 'Supply'
                    END AS 'category'
                    FROM supplies WHERE quantity <= stock_alert OR exp_date <= DATE_ADD(NOW(), INTERVAL month_alert MONTH)
                    ORDER BY name ASC";

                $supplyResult = $con->query($supplyQuery);

                while ($rows = $supplyResult->fetch_assoc()) {
                    ?>
                    <tr class="bg-light">
                        <td class="hidden-column"><?php echo $id = $rows['supply_id']; ?></td>
                        <td><?php echo $name = $rows['name']; ?></td>
                        <td><?php echo $quantity = $rows['quantity']; ?></td>
                        <td class="hidden-column"><?php echo $mnf_date = $rows['mnf_date']; ?></td>
                        <td><?php echo $exp_date = $rows['exp_date']; ?></td>
                        <td><?php echo $rows['stocks']; ?></td>
                        <td><?php echo $rows['status']; ?></td>
                        <td><?php echo $category = $rows['category']; ?></td>
                        <td><?php echo $price = $rows['price']; ?></td>
                        <?php
                        echo '
                        <td>
                            <button class="btn btn-warning"><a href="update.php?updateid=' . $id . '&category=' . $category . '&name=' . $name . '&quantity=' . $quantity . '&price=' . $price . '&mnf_date=' . $mnf_date . '&exp_date=' . $exp_date . '&month_alert=' . $rows['month_alert'] . '&stock_alert=' . $rows['stock_alert'] . '" class="text-light">Update</a></button>
                        </td>                    
                        ';
                        ?>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
            <br>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>