<?php
require("db.php");

$id = $_GET['deleteid'];
$category = $_GET['category'];

if($category=='Medicine'){
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $sql = "DELETE FROM medicines WHERE medicine_id=$id";
        $result = mysqli_query($con, $sql);
        if($result){
            echo '
                <script>
                    alert("Item Deleted Successfully!");
                    window.location.href="medicine.php";
                </script>
            ';
        }else{
            echo '
                <script>
                    alert("Something went WRONG!");
                    window.location.href="medicine.php";
                </script>
            ';
        }
    }
}elseif($category=='Supply'){
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $sql = "DELETE FROM supplies WHERE supply_id=$id";
        $result = mysqli_query($con, $sql);
        if($result){
            echo '
                <script>
                    alert("Item Deleted Successfully!");
                    window.location.href="supply.php";
                </script>
            ';
        }else{
            echo '
                <script>
                    alert("Something went WRONG!");
                    window.location.href="supply.php";
                </script>
            ';
        }
    }
}elseif($category=='Vaccine'){
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $sql = "DELETE FROM vaccines WHERE vaccine_id=$id";
        $result = mysqli_query($con, $sql);
        if($result){
            echo '
                <script>
                    alert("Item Deleted Successfully!");
                    window.location.href="vaccine.php";
                </script>
            ';
        }else{
            echo '
                <script>
                    alert("Something went WRONG!");
                    window.location.href="vaccine.php";
                </script>
            ';
        }
    }
}else{

}

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
        <script src="https://kit.fontawesome.com/6a6ee22931.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="scripts.js"></script>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    </body>
</html>