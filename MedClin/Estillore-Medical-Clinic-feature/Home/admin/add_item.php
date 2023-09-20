<?php
    require('../db.php');

    $category = $_POST['category'];
    if($category=='Medicine'){
        $name    = stripslashes($_POST['name']);
        $name    = mysqli_real_escape_string($con, $name);
        $medicine_id = "";
        $quantity = $_POST['quantity'];
        $month_alert = $_POST['month_alert'];
        $stock_alert = $_POST['stock_alert'];
        $price = $_POST['price'];
        $mnf_date = date('Y-m-d', strtotime($_POST['mnf_date']));
        $exp_date = date('Y-m-d', strtotime($_POST['exp_date']));
        $create_datetime = date('Y-m-d H:i:s');
        $update_datetime = date('Y-m-d H:i:s');

        //check whether the item is a duplicate
        $check = mysqli_query($con,"SELECT * FROM medicines where name='$name'");
        $checkrows = mysqli_num_rows($check);
        if($checkrows>0){
            echo '
                <script>
                    alert("DUPLICATE! Item already exists in the Inventory!");
                    window.location.href="inventory.php";
                </script>
            ';
        }else{
            if (isset($_POST['name']) && isset($_POST['quantity']) && isset($_POST['price']) && isset($_POST['mnf_date']) && isset($_POST['exp_date'])) {
        
                $query = "INSERT into medicines (medicine_id, name, quantity, price, mnf_date, exp_date, stock_alert, month_alert, create_datetime, update_datetime)
    VALUES ('$medicine_id','$name', '$quantity', '$price', '$mnf_date', '$exp_date', '$stock_alert', '$month_alert', '$create_datetime', '$update_datetime')";
                $result   = mysqli_query($con, $query);
                if ($result) {
                    include("inventory.php");
                    echo '
                        <script>
                            alert("Item Added to Inventory Successfully!");
                        </script>
                    ';
                }
            }
        }
    }elseif($category=='Supply'){
        $name    = stripslashes($_POST['name']);
        $name    = mysqli_real_escape_string($con, $name);
        $supply_id = "";
        $quantity = $_POST['quantity'];
        $month_alert = $_POST['month_alert'];
        $stock_alert = $_POST['stock_alert'];
        $price = $_POST['price'];
        $mnf_date = date('Y-m-d', strtotime($_POST['mnf_date']));
        $exp_date = date('Y-m-d', strtotime($_POST['exp_date']));
        $create_datetime = date('Y-m-d H:i:s');
        $update_datetime = date('Y-m-d H:i:s');

        //check whether the item is a duplicate
        $check = mysqli_query($con,"SELECT * FROM supplies where name='$name'");
        $checkrows = mysqli_num_rows($check);
        if($checkrows>0){
            echo '
                <script>
                    alert("DUPLICATE! Item already exists in the Inventory!");
                    window.location.href="inventory.php";
                </script>
            ';
        }else{
            if (isset($_POST['name']) && isset($_POST['quantity']) && isset($_POST['price']) && isset($_POST['mnf_date']) && isset($_POST['exp_date'])) {
        
                $query = "INSERT into supplies (supply_id, name, quantity, price, mnf_date, exp_date, stock_alert, month_alert, create_datetime, update_datetime)
    VALUES ('$supply_id','$name', '$quantity', '$price', '$mnf_date', '$exp_date', '$stock_alert', '$month_alert', '$create_datetime', '$update_datetime')";

                $result   = mysqli_query($con, $query);
                if ($result) {
                    include("inventory.php");
                    echo '
                        <script>
                            alert("Item Added to Inventory Successfully!");
                        </script>
                    ';
                }
            }
        }
    }elseif($category=='Vaccine'){
        $name    = stripslashes($_POST['name']);
        $name    = mysqli_real_escape_string($con, $name);
        $vaccine_id = "";
        $quantity = $_POST['quantity'];
        $month_alert = $_POST['month_alert'];
        $stock_alert = $_POST['stock_alert'];
        $price = $_POST['price'];
        $mnf_date = date('Y-m-d', strtotime($_POST['mnf_date']));
        $exp_date = date('Y-m-d', strtotime($_POST['exp_date']));
        $create_datetime = date('Y-m-d H:i:s');
        $update_datetime = date('Y-m-d H:i:s');

        //check whether the item is a duplicate
        $check = mysqli_query($con,"SELECT * FROM vaccines where name='$name'");
        $checkrows = mysqli_num_rows($check);
        if($checkrows>0){
            echo '
                <script>
                    alert("DUPLICATE! Item already exists in the Inventory!");
                    window.location.href="inventory.php";
                </script>
            ';
        }else{
            if (isset($_POST['name']) && isset($_POST['quantity']) && isset($_POST['price']) && isset($_POST['mnf_date']) && isset($_POST['exp_date'])) {
        
                $query = "INSERT into vaccines (vaccine_id, name, quantity, price, mnf_date, exp_date, stock_alert, month_alert, create_datetime, update_datetime)
    VALUES ('$vaccine_id','$name', '$quantity', '$price', '$mnf_date', '$exp_date', '$stock_alert', '$month_alert', '$create_datetime', '$update_datetime')";

                $result   = mysqli_query($con, $query);
                if ($result) {
                    include("inventory.php");
                    echo '
                        <script>
                            alert("Item Added to Inventory Successfully!");
                        </script>
                    ';
                }
            }
        }
    }else{
        echo '
            <script>
                alert("ERROR! Something went wrong.");
                window.location.href="inventory.php";
            </script>
        ';
    }
?>