<?php
    require('../db.php');
        $firstname = stripslashes($_POST['firstname']);
        $lastname = stripslashes($_POST['lastname']);
        $middlename = stripslashes($_POST['middlename']);
        $suffix = stripslashes($_POST['suffix']);
        $patient_id = "";
        $user_type = "USER";
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        $dob = date('Y-m-d', strtotime($_POST['dob']));
        $create_datetime = date("Y-m-d H:i:s");
        $update_datetime = date("Y-m-d H:i:s");

        //check whether the item is a duplicate
        $check = mysqli_query($con,"SELECT * FROM patients where firstname='$firstname' and lastname='$lastname'");
        $checkrows = mysqli_num_rows($check);
        if($checkrows>0){
            echo '
                <script>
                    alert("A User with this Name already exists!");
                    window.location.href="profiles.php";
                </script>
            ';
        }else{
            if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['age']) && isset($_POST['dob'])) {
        
                $query    = "INSERT into patients (patient_id, firstname, lastname, middlename, suffix, user_type, email, phone, age, dob, create_datetime, update_datetime)
                    VALUES ('$patient_id','$firstname', '$lastname', '$middlename', '$suffix', '$user_type', '$email', '$phone', '$age', '$dob', '$create_datetime','$update_datetime')";
                $result   = mysqli_query($con, $query);
                if ($result) {
                    include("profiles.php");
                    echo '
                        <script>
                            alert("Patient Added Successfully!");
                        </script>
                    ';
                }
            }
        }
?>