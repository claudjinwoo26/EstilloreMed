<?php
    require('../db.php');
    include('../auth_sesh.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profiles - Estillore Medical Clinic</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="../stylesheets/profiles.css">
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
            th{
                position: sticky;
                top: 0;
            }
            .hidden-column {
                display: none;
            }
        </style>
    </head>
    <body class="p-3 mb-2 profile-bg text-white" id="body-pd" >
        <header class="header bg-black" id="header" style="opacity:.2; height: 69px;">
            <div class="header_toggle"><i class='bx bx-menu' id="header-toggle"></i></div>
        </header>
        <div class="l-navbar p-3 mb-2 bg-black text-white" id="nav-bar">
            <nav class="nav">
                <div> 
                    <div>
                        <a href="dashboard.php" class="nav_link crazy"> 
                            <i class="bx bxs-user-circle bx-sm nav_icon"></i>
                            <span class="nav_name">Welcome, <strong><?php echo $_SESSION['username'];?></strong>!</span>
                        </a> 
                    </div>
                    <br><br>
                    <div class="nav_list"> 
                        <a href="dashboard.php" class="nav_link"> 
                            <i class='bx bx-grid-alt nav_icon'></i> 
                            <span class="nav_name">Dashboard</span> 
                        </a> 
                        <a href="profiles.php" class="nav_link active"> 
                            <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Profiles</span> 
                        </a>
                        <a href="calendar.php" class="nav_link"> 
                            <i class='bx bx-calendar nav_icon'></i> 
                            <span class="nav_name">Calendar</span> 
                        </a>  
                        <a href="inventory.php" class="nav_link"> 
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
        <!--Container Main start-->
        <div class="height-100 ">
            <div  style="margin-left:80px; margin-bottom:20px;">
            <div class="container clearfix p-3 rounded-5">
                <div>
                    <!-- Modal -->
                    <div class="modal fade text-black" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">+ Add Patient</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="form" role="form" method="POST" action="add_patient.php">
                                        <input type="hidden" name="_token" value="">
                                        <div class="form-group row group-row">
                                            <label class="col-md-3">Name</label>
                                            <input name="firstname" class="form-control col-md-3" placeholder="First Name" type="text" required>
                                            <input name="lastname" class="form-control col-md-3" placeholder="Last Name" type="text" required>
                                            <input name="middlename" class="form-control col-md-1" placeholder="M.I." type="text">
                                            <input name="suffix" class="form-control col-md-1" placeholder="Suffix" type="text">
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
                                            <label class="col-md-3">Email</label>
                                            <input type="email" class="form-control col-md-8" name="email" placeholder="Enter Email" required>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Phone</label>
                                            <select class="custom-select col-md-2">
                                                <option selected="">+63</option readonly>
                                            </select>
                                            <input type="tel" class="form-control col-md-6" name="phone" placeholder="Enter Phone Number" oninput="this.value = this.value.replace(/[^0-9]/g, '')" pattern="[9]{1}[0-9]{2}[0-9]{3}[0-9]{4}" required>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-6">Age</label>
                                            <input type="number" class="form-control col-md-5" name="age" min="0" required>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-6">Date of Birth</label>
                                            <input type="date" class="form-control col-md-5" name="dob" id="dob" required>
                                        </div>
                                        <div class="modal-footer float-right">
                                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-warning">Add Patient</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div>
                    <h1>Patients</h1> 
                    <button type="button" class="btn btn-light rounded mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Patient</button>

                    </div>
                <table class="table text-center" style="font-size:small; height:500px; display:block; overflow-y:scroll; ">
                    <?php
                        $localhost = "localhost";
                        $root = "root";
                        $password = "";
                        $db = "profiles";
                        $con = mysqli_connect($localhost, $root, $password, $db);
                        if(mysqli_connect_errno()){
                            echo"Failed to connect to MySQL: ".mysqli_connect_error();
                        }
                    ?>
                    <thead>
                        <tr class="bg-white">
                            <th scope="col" class="hidden-column" style="padding-right: 50px; padding-left: 50px;" >Patient Id</th>
                            <th scope="col" class="bg-white" style="padding-right: 50px; padding-left: 50px; width: 20%;" >Name</th>
                            <th scope="col" class="bg-white" style="padding-right: 50px; padding-left: 50px; width: 5%;" >User Type</th>
                            <th scope="col" class="bg-white" style="padding-right: 25px; padding-left: 25px; width: 10%;" >Email</th>
                            <th scope="col" class="bg-white" style="padding-right: 50px; padding-left: 50px; width: 10%;" >Phone</th>
                            <th scope="col" class="bg-white" style="padding-right: 25px; padding-left: 25px; width: 10%;" >Age</th>
                            <th scope="col" class="bg-white" style="padding-right: 50px; padding-left: 50px; width: 10%;" >Date of Birth</th>
                            <th scope="col" class="bg-white" style="padding-right: 50px; padding-left: 50px; width: 20%;" >Action</th>
                        </tr>
                    </thead>
                    <?php
                        $query = "
                        SELECT patient_id, firstname, lastname, middlename, suffix, user_type, email, phone, age, dob FROM patients";

                        if($patients = $con->query($query)){

                        }
                    ?>
                    <tbody>
                    <?php
                        while ($rows = $patients->fetch_assoc()) {       
                        
                    ?>
                    <tr class="bg-light text-base">
                        <td class="hidden-column"><?php echo $id=$rows['patient_id'];?></td>
                        <td><?php echo  $firstname=$rows['firstname']. " " .$lastname=$rows['lastname'];?></td>
                        <!-- <td><?php echo $firstname=$rows['firstname'];?></td>
                        <td><?php echo $middlename=$rows['middlename'];?></td> -->
                        <!-- <td><?php echo $suffix=$rows['suffix'];?></td> -->
                        <td><?php echo $rows['user_type'];?></td>
                        <td><?php echo $email=$rows['email'];?></td>
                        <td><?php echo $phone=$rows['phone'];?></td>
                        <td><?php echo $age=$rows['age'];?></td>
                        <td><?php echo $dob=$rows['dob'];?></td>
                        <?php
                            echo '
                                <td>
                                    <button class="btn btn-warning rounded"><a href="update_patient.php?updateid='.$id.'&firstname='.$firstname.'&lastname='.$lastname.'&middlename='.$middlename.'&suffix='.$suffix.'&email='.$email.'&phone='.$phone.'&age='.$age.',&dob='.$dob.'" class="text-light">Update</a></button>
                                    <button class="btn btn-warning rounded"><a href="view_patient.php?viewid='.$id.'&firstname='.$firstname.'&lastname='.$lastname.'&middlename='.$middlename.'&suffix='.$suffix.'&email='.$email.'&phone='.$phone.'&age='.$age.',&dob='.$dob.'" class="text-light">View</a></button>
                                </td>
                            ';
                        ?>
                    </tr>
                    <?php        
                        }
                    ?>
                    </tbody>
                </table>    
            </div>
        </div>
        <!--Container Main end-->
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>
</html>