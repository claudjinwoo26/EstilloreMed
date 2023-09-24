<?php
require("../db.php");

$id = $_GET['updateid'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$middlename = $_GET['middlename'];
$suffix = $_GET['suffix'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$age = $_GET['age'];
$dob = $_GET['dob'];
$current_date = date('Y-m-d');

if(isset($_POST['submit'])){
    if(isset($_POST['firstname']) && isset($_POST['lastname'])){
        $firstname    = $_POST['firstname'];
        $lastname    = $_POST['lastname'];
        $middlename = $_POST['middlename'];
        $suffix = $_POST['suffix'];
        $user_type = $_POST['user_type'];
        $quantity = $_POST['email'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        $dob = date('Y-m-d', strtotime($_POST['dob']));
        $password = $_POST['password'];
        $update_datetime = date("Y-m-d H:i:s");
    
        $sql = "UPDATE `patients` SET patient_id=$id, firstname='$firstname', lastname='$lastname', middlename='$middlename', suffix='$suffix', user_type='$user_type',email='$email',username='$username',phone='$phone',age='$age',dob='$dob',password='".md5($password)."',update_datetime='$update_datetime' WHERE patient_id=$id";
        $result = mysqli_query($con, $sql);
        if($result){
            echo '
                <script>
                    alert("Profile Updated Successfully!");
                    window.location.href="profiles.php";
                </script>
            ';
        }else{
            echo'
                <script>
                    alert("Something went Wrong! Redirecting you back to Profiles Page.");
                    window.location.href="profiles.php";
                </script>
            ';
        }
    }else{
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Update Profile - Estillore Medical Clinic</title>
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
        <div class="container my-5 py-3 px-3 bg-white rounded-3 col-md-5">
            <form class="form" role="form" method="POST">   
                <div class="mb-5">                                 
                    <input type="hidden" name="_token" value="">
                    <h1>Update Patient Information</h1>
                    <div class="form-group row">
                        <label class="col-md-2">Patient ID</label>
                        <input type="number" class="form-control col-md-2" name="email" placeholder="<?php echo $id;?>" value="<?php echo $id;?>" readonly>
                    </div>
                    <div class="form-group group-row row">
                        <label class="col-md-2">Name</label>
                        <input type="text" class="form-control col-md-3" name="firstname" placeholder="<?php echo $firstname;?>" value="<?php echo $firstname;?>" required>
                        <input type="text" class="form-control col-md-3" name="lastname" placeholder="<?php echo $lastname;?>" value="<?php echo $lastname;?>" required>
                        <input type="text" class="form-control col-md-1" name="middlename" placeholder="M.I." value="<?php echo $middlename;?>">
                        <input type="text" class="form-control col-md-2" name="suffix" placeholder="Suffix" value="<?php echo $suffix;?>">
                    </div>
                    <script>
                        // Restrict input to only letters and spaces for first name
                        const firstNameInput = document.querySelector('input[name="firstname"]');
                        firstNameInput.addEventListener('input', function() {
                            this.value = this.value.replace(/[^A-Za-z ]/g, '');
                        });

                        // Restrict input to only letters and spaces for last name
                        const lastNameInput = document.querySelector('input[name="lastname"]');
                        lastNameInput.addEventListener('input', function() {
                            this.value = this.value.replace(/[^A-Za-z ]/g, '');
                        });

                        // Restrict input to only letters and spaces for middle name
                        const middleNameInput = document.querySelector('input[name="middlename"]');
                        middleNameInput.addEventListener('input', function() {
                            this.value = this.value.replace(/[^A-Za-z ]/g, '');
                        });

                        // Restrict input to only letters and spaces for suffix
                        const suffixInput = document.querySelector('input[name="suffix"]');
                        suffixInput.addEventListener('input', function() {
                            this.value = this.value.replace(/[^A-Za-z ]/g, '');
                        });
                    </script>
                    <div class="form-group row">
                        <label class="col-md-2">Email</label>
                        <input type="email" class="form-control col-md-9" name="email" placeholder="<?php echo $email;?>" value="<?php echo $email;?>" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">Phone</label>
                        <select class="custom-select col-md-2">
                            <option selected="">+63</option readonly>
                        </select>
                        <input type="tel" pattern="[9]{1}[0-9]{2}[0-9]{3}[0-9]{4}" class="form-control col-md-7" name="phone" placeholder="<?php echo $phone;?>" value="<?php echo $phone;?>" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">Age</label>
                        <input type="number" class="form-control col-md-9" name="age" min="0" placeholder="<?php echo $age;?>" value="<?php echo $age;?>" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Date of Birth</label>
                        <input type="date" id="dob" class="form-control col-md-6" name="dob" value="<?php echo $dob;?>" max="<?php echo $current_date;?>" required>
                    </div>
                    <hr class="hr"/>
                    <div class="form-group row">
                        <label class="col-md-2">Username</label>
                        <input type="text" class="form-control col-md-9" name="username" placeholder="Enter Username">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">Password</label>
                        <input type="password" class="form-control col-md-9" name="password" placeholder="Password">
                    </div>
                    <div class="form-group row" >
                        <label class="col-md-4">User Permissions</label>
                        <div class="col-md-8 text-black">
                            <input style="width:20px; height:20px;" type="radio" name="user_type" value="USER"> USER
                            <input style="width:20px; height:20px;" type="radio" name="user_type" value="ADMIN"> ADMIN
                        </div>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-outline-secondary"><a href="profiles.php" class="text-dark">Cancel</a></button>
                        <button type="submit" name="submit" class="btn btn-warning">Update</button>
                    </div>
                </div>
            </form>                                   
        </div>
        <script>
            // Function to calculate age based on date of birth
            function calculateAge() {
                var dobInput = document.getElementById('dob');
                var dob = new Date(dobInput.value);
                var today = new Date();
                var age = today.getFullYear() - dob.getFullYear();
                var monthDiff = today.getMonth() - dob.getMonth();
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                    age--;
                }
                // Set the calculated age to the age input field
                document.getElementsByName('age')[0].value = age;
            }

            // Attach the calculateAge function to the change event of the date of birth input field
            document.getElementById('dob').addEventListener('change', calculateAge);
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    </body>
</html>