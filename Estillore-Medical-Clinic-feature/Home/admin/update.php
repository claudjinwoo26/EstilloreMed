<?php
require("../db.php");

$id = $_GET['updateid'];
$item_category = $_GET['category'];
$item_name = $_GET['name'];
$item_quantity = $_GET['quantity'];
$item_price = $_GET['price'];
$mnf_date = $_GET['mnf_date'];
$exp_date = $_GET['exp_date'];
$month_alert = $_GET['month_alert'];
$stock_alert = $_GET['stock_alert'];


if($item_category=='Medicine'){
    if(isset($_POST['submit'])){
        if(isset($_POST['name'])){
            $name    = stripslashes($_POST['name']);
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $mnf_date = date('Y-m-d', strtotime($_POST['mnf_date']));
            $exp_date = date('Y-m-d', strtotime($_POST['exp_date']));
            $update_datetime = date('Y-m-d H:i:s');
            $month_alert = $_POST['month_alert'];
            $stock_alert = $_POST['stock_alert'];
    
            $sql = "UPDATE `medicines` SET medicine_id=$id, name='$name',quantity='$quantity',price='$price',exp_date='$exp_date',mnf_date='$mnf_date',update_datetime='$update_datetime', month_alert='$month_alert', stock_alert='$stock_alert' WHERE medicine_id=$id";
            $result = mysqli_query($con, $sql);
            if($result){
                echo '
                    <script>
                        alert("Item Updated Successfully!");
                        window.location.href="medicine.php";
                    </script>
                ';
            }else{
                echo'
                    <script>
                        alert("Something went Wrong! Redirecting you back to Inventory Page.");
                        window.location.href="inventory.php";
                    </script>
                ';
            }
        }else{
        }
    }
}elseif($item_category=='Supply'){
    if(isset($_POST['submit'])){
        if(isset($_POST['name'])){
            $name    = stripslashes($_POST['name']);
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $mnf_date = date('Y-m-d', strtotime($_POST['mnf_date']));
            $exp_date = date('Y-m-d', strtotime($_POST['exp_date']));
            $update_datetime = date('Y-m-d H:i:s');
            $month_alert = $_POST['month_alert'];
            $stock_alert = $_POST['stock_alert'];
    
            $sql = "UPDATE `supplies` SET supply_id=$id, name='$name',quantity='$quantity',price='$price',exp_date='$exp_date',mnf_date='$mnf_date',update_datetime='$update_datetime', month_alert='$month_alert', stock_alert='$stock_alert' WHERE supply_id=$id";
            $result = mysqli_query($con, $sql);
            if($result){
                echo '
                    <script>
                        alert("Item Updated Successfully!");
                        window.location.href="supply.php";
                    </script>
                ';
            }else{
                echo'
                    <script>
                        alert("Something went Wrong! Redirecting you back to Inventory Page.");
                        window.location.href="inventory.php";
                    </script>
                ';
            }
        }else{
        }
    }
}elseif($item_category=='Vaccine'){
    if(isset($_POST['submit'])){
        if(isset($_POST['name'])){
            $name    = stripslashes($_POST['name']);
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $mnf_date = date('Y-m-d', strtotime($_POST['mnf_date']));
            $exp_date = date('Y-m-d', strtotime($_POST['exp_date']));
            $update_datetime = date('Y-m-d H:i:s');
            $month_alert = $_POST['month_alert'];
            $stock_alert = $_POST['stock_alert'];
    
            $sql = "UPDATE `vaccines` SET vaccine_id=$id, name='$name',quantity='$quantity',price='$price',exp_date='$exp_date',mnf_date='$mnf_date',update_datetime='$update_datetime', month_alert='$month_alert', stock_alert='$stock_alert' WHERE vaccine_id=$id";
            $result = mysqli_query($con, $sql);
            if($result){
                echo '
                    <script>
                        alert("Item Updated Successfully!");
                        window.location.href="vaccine.php";
                    </script>
                ';
            }else{
                echo'
                    <script>
                        alert("Something went Wrong! Redirecting you back to Inventory Page.");
                        window.location.href="inventory.php";
                    </script>
                ';
            }
        }else{
        }
    }
}else{
    echo'
        <script>
            alert("Something went Wrong! Redirecting you back to Inventory Page.");
            window.location.href="inventory.php";
        </script>
    ';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Update Item - Estillore Medical Clinic</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <script src="https://kit.fontawesome.com/6a6ee22931.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="../assets/javascript/scripts.js"></script>
        <style>
            input:focus{
                outline: none !important;
                border-color: #3358FF;
            }
        </style>
    </head>
    <body style ="background-image: linear-gradient(to right, #c9fadc, #baf5e3, #aeefea, #a9e8ef, #a8e0f1, #a4dbf3, #a2d5f4, #a2cff4, #9bcaf7, #97c5fa, #94bffd, #94b9ff);">
        <div class="container my-5 py-3 px-3 bg-white rounded-3 col-md-4">
            <form class="form" role="form" method="POST">   
                <div class="mb-5">                                 
                    <input type="hidden" name="_token" value="">
                    <div class="form-group row">
                        <h1 class ="mb-5 text-center">Update Supply</h1>
                        <label class="col-md-3">Name</label>
                        <input type="text" class="col-md-8" name="name" placeholder="<?php echo $item_name;?>" value="<?php echo $item_name;?>" required>
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
                        <input type="number" class="col-md-8" min="0" name="quantity" placeholder="<?php echo $item_quantity;?>" value="<?php echo $item_quantity;?>" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Price</label>
                        <input type="number" class="col-md-8" min="0" step="0.01" name="price" placeholder="<?php echo $item_price;?>" value="<?php echo $item_price;?>" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Manufacturing Date</label>
                        <input type="date" class="col-md-5" name="mnf_date" value="<?php echo $mnf_date;?>" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Expiration Date</label>
                        <input type="date" class="col-md-5" name="exp_date" value="<?php echo $exp_date;?>" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">Month Alert</label>
                        <input type="number" class="col-md-3" name="quantity" placeholder="<?php echo $month_alert;?>" value="<?php echo $month_alert;?>" required>
                        <label class="col-md-2">Stock Alert</label>
                        <input type="number" class="col-md-3" name="quantity" placeholder="<?php echo $stock_alert;?>" value="<?php echo $stock_alert;?>" required>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary"><a href="inventory.php" class="text-light">Cancel</a></button>
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>                                   
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    </body>
</html>