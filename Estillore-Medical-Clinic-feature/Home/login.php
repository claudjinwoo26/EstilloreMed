<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In - Estillore Medical Clinic</title>
    <script src="https://kit.fontawesome.com/6a6ee22931.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            font-family: Times New Roman, serif;
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
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user = 'USER';
$admin = 'ADMIN'; // Define user and admin here

session_start();
$error_message = "";
$rows = 0; // Initialize $rows to 0

// Check if the user is already logged in
if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {
    if ($_SESSION['user_type'] == $user) {
        header("Location: user/user_dashboard.php");
        exit();
    } elseif ($_SESSION['user_type'] == $admin) {
        header("Location: admin/dashboard.php");
        exit();
    }
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($con, stripslashes($_REQUEST['username']));
    $password = mysqli_real_escape_string($con, stripslashes($_REQUEST['password']));

    $query = "SELECT * FROM `patients` WHERE username='$username' AND password='" . md5($password) . "'";
    $result = mysqli_query($con, $query);
    $use = mysqli_fetch_assoc($result);

    if ($result) {
        $rows = mysqli_num_rows($result); // Update $rows here

        if ($use !== null && isset($use['user_type']) && isset($use['patient_id'])) { // Check if $use is not null and 'user_type' and 'patient_id' keys exist
            $user_type = $use['user_type'];
            $patient_id = $use['patient_id']; // Store patient_id in a session variable

            if ($rows == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['user_type'] = $user_type;
                $_SESSION['patient_id'] = $patient_id; // Store patient_id in session

                if ($user_type == $user) {
                    header("Location: user/user_dashboard.php");
                    //echo $_SESSION['patient_id'];
                    exit();
                } elseif ($user_type == $admin) {
                    header("Location: admin/dashboard.php");
                    exit();
                }
            } else {
                $error_message = "Incorrect Username or Password!";
            }
        } else {
            $error_message = "Incorrect Username or Password!";
        }
    } else {
        $error_message = "Query execution failed.";
    }
}
?>

<div class="col-md-5 bg-white float-left" style="height: 100vh; overflow-y: auto;">
    <div class="col-md-12 mx-auto form p-5 d-flex flex-column justify-content-center align-items-center">
        <h1 class="font-weight-light" style="color: rgb(0, 0, 77); text-align: center; font-size: 50px;">_______________</h1>
        <br><br><br><br><br>
        <div class="col-md-10 mx-auto p-5">
            <form method="post">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                    </div>
                    <input name="username" class="form-control" placeholder="Username" type="text" required>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input name="password" class="form-control" placeholder="Password" type="password" required>
                </div>
                <div class="form-group">
                    <?php if (!empty($error_message)): ?>
                        <div class="alert alert-danger">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
                </div>
                <p class="text-center">Don't have an account?<a href="signup.php"> Sign Up</a></p>
            </form>
        </div>
    </div>
</div>

<div class="col-md-7 float-right" style="height: 100vh; overflow-y: auto; background-color: #BFDDEE;">
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
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>
