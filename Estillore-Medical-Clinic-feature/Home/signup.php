<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign Up - Estillore Medical Clinic</title>
        <script src="https://kit.fontawesome.com/6a6ee22931.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            body{
                font-family: Times New Roman, serif;
            }
            .home-bg{
                background-image: linear-gradient(to right, #c9fadc, #baf5e3, #aeefea, #a9e8ef, #a8e0f1, #a4dbf3, #a2d5f4, #a2cff4, #9bcaf7, #97c5fa, #94bffd, #94b9ff);
            }
        </style>
    </head>
    <body>
        <?php
            $localhost = "localhost";
            $root = "root";
            $password = "";
            $db = "profiles";
            $con = mysqli_connect($localhost, $root, $password, $db);
            if(mysqli_connect_errno()){
                echo"Failed to connect to MySQL: ".mysqli_connect_error();
            }

            session_start();

            $current_date = date('Y-m-d');

            // When form submitted, insert values into the database.
            if (isset($_POST['username']) && isset($_POST['password'])==isset($_POST['repassword'])) {
                $patient_id = "";
                $firstname    = $_POST['firstname'];
                $lastname    = $_POST['lastname'];
                $middlename = $_POST['middlename'];
                $suffix = $_POST['suffix'];
                $user_type = "USER";
                $username = stripslashes($_POST['username']);
                $username = mysqli_real_escape_string($con, $username);
                $age = $_POST['age'];
                $dob = date('Y-m-d', strtotime($_POST['dob']));
                $phone = $_POST['phone'];
                $email    = stripslashes($_POST['email']);
                $email    = mysqli_real_escape_string($con, $email);
                $password = stripslashes($_POST['password']);
                $password = mysqli_real_escape_string($con, $password);
                $create_datetime = date("Y-m-d H:i:s");
                $update_datetime = date("Y-m-d H:i:s");

                $check = mysqli_query($con,"SELECT * FROM patients where firstname='$firstname' and lastname='$lastname' and email='$email' and username='$username'");
                $checkrows = mysqli_num_rows($check);
                if($checkrows>0){
                    echo '
                        <script>
                            alert("An Account with this Email or Name already exists! Register again.");
                            window.location.href="register.php";
                        </script>
                    ';
                }else{
                    $query    = "INSERT into patients (patient_id, firstname, lastname, middlename, suffix, user_type, email, username, phone, age, dob, password, create_datetime, update_datetime)
                        VALUES ('$patient_id','$firstname', '$lastname', '$middlename', '$suffix', '$user_type', '$email', '$username', '$phone', '$age', '$dob', '" . md5($password) . "', '$create_datetime', '$update_datetime')";
                    $result   = mysqli_query($con, $query);
                    if ($result) {
                        echo '<script>
                                alert("Registered Succesfully!");
                                window.location.href="login.php";
                            </script>';
                    }
                }    
            } else {
        ?>
        <div class="col-md-5 bg-white float-left" style="height: 100vh; overflow-y: auto;">
            <div class="col-md-12 mx-auto p-5 d-flex flex-column justify-content-center align-items-center">
                <h1 class="font-weight-light" style="color: rgb(0, 0, 77); text-align: center; font-size: 50px;">_______________</h1>
                <div class="col-md-10 mx-auto p-5">
                    <form method="post">
                        <!--Name-->
                        <div class="form-group input-group group-row">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input name="firstname" class="form-control col-md-4" placeholder="First Name" type="text" required>
                            <input name="lastname" class="form-control col-md-4" placeholder="Last Name" type="text" required>
                            <input name="middlename" class="form-control col-md-2" placeholder="M.I." type="text">
                            <input name="suffix" class="form-control col-md-2" placeholder="Suffix" type="text">
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
                        <!--Email-->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="email" class="form-control" placeholder="Email address" type="email" required>
                        </div>
                        <!--Username-->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                            </div>
                            <input name="username" class="form-control" placeholder="Username" type="text" required>
                        </div>
                        <!--Phone-->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            </div>
                            <select class="custom-select" style="max-width: 120px;">
                                <option selected="">+63</option readonly>
                            </select>
                            <input name="phone" class="form-control" placeholder="Phone number" type="tel" pattern="[9]{1}[0-9]{2}[0-9]{3}[0-9]{4}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                        </div>
                        <!--Age-->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-arrow-up-9-1"></i></span>
                            </div>
                            <input name="age" id="age" class="form-control" placeholder="Age" type="number" min="0" max="100" required>
                        </div>
                        <!--Birthday-->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input name="dob" id="dob" class="form-control" placeholder="Birthday" type="date" max="<?php echo $current_date;?>" required>
                        </div>
                        <script>
                            // Update age when date of birth is changed
                            const dobInput = document.querySelector('input[name="dob"]');
                            dobInput.addEventListener('change', function() {
                                const dob = new Date(this.value);
                                const today = new Date();
                                const age = today.getFullYear() - dob.getFullYear();
                                document.getElementById('age').value = age;
                            });
                        </script>
                        <!--Password-->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input name="password" class="form-control" placeholder="Create password" type="password" required>
                        </div>
                        <!--Confirm Password-->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input name="repassword" class="form-control" placeholder="Repeat password" type="password" required>
                        </div>    
                        <!--Submit-->                             
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" name="create_account">Create Account</button>
                        </div>   
                        <p class="text-center">Have an account?<a href="login.php"> Log In</a></p>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-7 float-right home-bg" style="height: 100vh; overflow-y: auto;">
            <div id="carouselHomePage" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="col-md-10 mx-auto p-5 justify-content-center slide">
                            <h1 class="font-weight-light" style="color: rgb(0, 0, 77); text-align: center; font-size: 50px;">____________________</h1>
                            <h1 class="font-weight-bold" style="color: rgb(0, 0, 77); text-align: center; font-size: 50px;">Get in</h1>
                            <h1 class="font-weight-bold" style="color: rgb(0, 0, 77); text-align: center; font-size: 50px;">touch</h1>
                            <br><br><br>
                            <h2 class="font-weight-bold">About Us.</h2>
                            <h4 class="font-weight-light">Estillore Medical Clinic</h4>
                            <br><br><br>
                            <h2 class="font-weight-bold">Mission</h2>
                            <h5 class="font-weight-light">Our mission is to improve the health and well-being of the people we serve by ensuring highly effective, community-based support and care.</h5>
                            <br><br>
                            <h2 class="font-weight-bold">Vision</h2>
                            <h5 class="font-weight-light">To inspire hope and contribute to health and well-being by providing the best care to every patient through integrated clinical practice, education and research.</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-10 mx-auto p-5 justify-content-center slide">
                            <h1 class="font-weight-light" style="color: rgb(0, 0, 77); text-align: center; font-size: 50px;">____________________</h1>
                            <h1 class="font-weight-bold" style="color: rgb(0, 0, 77); text-align: center; font-size: 50px;">Welcome</h1>
                            <h1 class="font-weight-bold" style="color: rgb(0, 0, 77); text-align: center; font-size: 50px;">back!</h1>
                            <br><br><br>
                            <h2 class="font-weight-bold">Contact Us.</h2>
                            <h4 class="font-weight-light">Estillore Medical Clinic</h4>
                            <br><br><br>
                            <h5 class="font-weight-light">70 Anahaw Street, Project 7, Quezon City Philippines</h5>
                            <h5 class="font-weight-light"> +0123456789</h5>
                            <br>
                            <h5 class="font-weight-bold">Gmail:<a href="#" class="font-weight-light"> estilloremedicalclinic@gmail.com</a></h5>
                            <h5 class="font-weight-bold">Icloud:<a href="#" class="font-weight-light"> estilloremedicalclinic@icloud.com</a></h5>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselHomePage" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselHomePage" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <?php
            }
        ?>
    </body>
</html>