<?php
    require('../db.php');
    include('../auth_sesh.php');

    $sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'vaccine_id';
    $sortOrder = isset($_GET['order']) ? $_GET['order'] : 'ASC';

    $localhost = "localhost";
    $root = "root";
    $password = "";
    $db = "profiles";
    $con = mysqli_connect($localhost, $root, $password, $db);
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $query = "SELECT vaccines.*,
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
        FROM vaccines
        WHERE vaccines.quantity <= stock_alert OR exp_date <= NOW()
        ORDER BY $sortColumn $sortOrder";

    $category = 'Vaccine';
    if ($vaccine = $con->query($query)) {

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vaccine Table - Estillore Medical Clinic</title>
        <link rel="stylesheet" href="../stylesheets/table.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <script src="https://kit.fontawesome.com/6a6ee22931.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            .home-bg{
                background-image: linear-gradient(to right, #c9fadc, #baf5e3, #aeefea, #a9e8ef, #a8e0f1, #a4dbf3, #a2d5f4, #a2cff4, #9bcaf7, #97c5fa, #94bffd, #94b9ff);
            }
            .table-head {
                background: black;
                position: sticky;
                top: 0;
            }

            .hidden-column {
                display: none;
            }

            .sortable-column {
                cursor: pointer;
            }

            .sortable-column:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <header class="header home-bg" id="header" style="opacity:; height: 69px;">
            <div class="w-20 h-20">
                <br>
                <a class="ml-3 float-left" href="inventory.php"
                style="text-decoration:none; color: black; opacity:.8; width:100px;"><i class='bx bx-left-arrow'></i>
                    Inventory</a>
                <p class="mr-5 float text-center" style="text-decoration:none; color: black;">VACCINE TABLE</p>
            </div>
        </header>
        <div class="bg-secondary">
            <div>
                <table class="table">
                    <tr class="bg-info text-black">
                        <th class="thead-dark hidden-column" style="width:5%;">ID</th>
                        <th class="thead-dark sortable-column" style="width:20%;"
                            onclick="window.location='?sort=name&order=<?php echo $sortOrder === 'ASC' ? 'DESC' : 'ASC'; ?>'">NAME
                            <?php if ($sortColumn === 'name') {
                                echo $sortOrder === 'ASC' ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>';
                            } ?>
                        </th>
                        <th class="thead-dark sortable-column" style="width:5%;"
                            onclick="window.location='?sort=quantity&order=<?php echo $sortOrder === 'ASC' ? 'DESC' : 'ASC'; ?>'">QUANTITY
                            <?php if ($sortColumn === 'quantity') {
                                echo $sortOrder === 'ASC' ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>';
                            } ?>
                        </th>
                        <th class="thead-dark sortable-column" style="width:5%;"
                            onclick="window.location='?sort=stock_alert&order=<?php echo $sortOrder === 'ASC' ? 'DESC' : 'ASC'; ?>'">STOCK ALERT
                            <?php if ($sortColumn === 'stock_alert') {
                                echo $sortOrder === 'ASC' ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>';
                            } ?>
                        </th>
                        <th class="thead-dark sortable-column"
                            onclick="window.location='?sort=price&order=<?php echo $sortOrder === 'ASC' ? 'DESC' : 'ASC'; ?>'">PRICE
                            <?php if ($sortColumn === 'price') {
                                echo $sortOrder === 'ASC' ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>';
                            } ?>
                        </th>
                        <th class="thead-dark hidden-column" style="width:10%;">MANUFACTURED</th>
                        <th class="thead-dark sortable-column" style="width:10%;"
                            onclick="window.location='?sort=exp_date&order=<?php echo $sortOrder === 'ASC' ? 'DESC' : 'ASC'; ?>'">EXPIRATION
                            <?php if ($sortColumn === 'exp_date') {
                                echo $sortOrder === 'ASC' ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>';
                            } ?>
                        </th>
                        <th class="thead-dark sortable-column" style="width:5%;"
                            onclick="window.location='?sort=month_alert&order=<?php echo $sortOrder === 'ASC' ? 'DESC' : 'ASC'; ?>'">MONTH ALERT
                            <?php if ($sortColumn === 'month_alert') {
                                echo $sortOrder === 'ASC' ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>';
                            } ?>
                        </th>
                        <th class="thead-dark">STOCKS</th>
                        <th class="thead-dark">STATUS</th>
                        <th class="thead-dark" style="width:15%;">OPERATION</th>
                    </tr>
                    <?php
                    while ($rows = $vaccine->fetch_assoc()) {
                        ?>
                        <tr class="bg-light">
                            <td class="hidden-column"><?php echo $id = $rows['vaccine_id']; ?></td>
                            <td><?php echo $name = $rows['name']; ?></td>
                            <td><?php echo $quantity = $rows['quantity']; ?></td>
                            <td><?php echo $quantity = $rows['stock_alert']; ?></td>
                            <td><?php echo $price = $rows['price']; ?></td>
                            <td class="hidden-column"><?php echo $mnf_date = $rows['mnf_date']; ?></td>
                            <td><?php echo $exp_date = $rows['exp_date']; ?></td>
                            <td><?php echo $exp_date = $rows['month_alert']; ?></td>
                            <td><?php echo $rows['stocks']; ?></td>
                            <td><?php echo $rows['status']; ?></td>
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
                </table>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    </body>
</html>
