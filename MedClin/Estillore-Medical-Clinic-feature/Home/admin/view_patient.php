<?php
    require("../db.php");

    $id = $_GET['viewid'];

    // Fetch the person's data from the database
    $sql = "SELECT * FROM `patients` WHERE patient_id = $id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $middlename = $row['middlename'];
    $suffix = $row['suffix'];
    $email = $row['email'];
    $phone = $row['phone'];
    $age = $row['age'];
    $dob = $row['dob'];
    $current_date = date('Y-m-d');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>View Profile - Estillore Medical Clinic</title>
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
    <body style = "background-image: linear-gradient(to right, #c9fadc, #baf5e3, #aeefea, #a9e8ef, #a8e0f1, #a4dbf3, #a2d5f4, #a2cff4, #9bcaf7, #97c5fa, #94bffd, #94b9ff);">
        <div class="container my-4 p-5 bg-white rounded-3 col-md-5 float-left" style="margin-left: 5%;">
            <form class="form" role="form" method="POST">
                <div class="mb-5">
                    <input type="hidden" name="_token" value="">
                    <h3 class="justify-content-center">Patient Information</h3>
                    <hr class="hr"/>
                    <div class="form-group group-row row">
                        <label class="col-md-3">Name</label>
                        <input type="text" class="col-md-3" name="firstname" placeholder="<?php echo $firstname;?>" value="<?php echo $firstname;?>" readonly>
                        <input type="text" class="col-md-3" name="lastname" placeholder="<?php echo $lastname;?>" value="<?php echo $lastname;?>" readonly>
                        <input type="text" class="col-md-1" name="middlename" placeholder="M.I." value="<?php echo $middlename;?>" readonly>
                        <input type="text" class="col-md-2" name="suffix" placeholder="Suffix" value="<?php echo $suffix;?>" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Email</label>
                        <input type="email" class="col-md-9" name="email" placeholder="<?php echo $email;?>" value="<?php echo $email;?>" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Phone</label>
                        <input type="number" class="col-md-9" name="phone" placeholder="<?php echo $phone;?>" value="<?php echo $phone;?>" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Age</label>
                        <input type="number" class="col-md-9" name="age" placeholder="<?php echo $age;?>" value="<?php echo $age;?>" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Date of Birth</label>
                        <input type="date" class="col-md-6" name="dob" value="<?php echo $dob;?>" max="<?php echo $current_date;?>" readonly>
                    </div>
                    <br>
                    <h3 class="justify-content-center">Medical History</h3>
                    <hr class="hr"/>
                    <div class="form-group row">
                        <label class="col-md-3">Past Medical Condition</label>
                        <input type="text" class="col-md-9" name="past_med_condition" placeholder="Past Medical Condition" value="" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Allergies</label>
                        <input type="text" class="col-md-9" name="allergies" placeholder="Allergies" value="" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Medical Diagnoses</label>
                        <input type="text" class="col-md-9" name="med_diagnoses" placeholder="Medical Diagnoses" value="" readonly>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-warning" id="updateButton"><a href="" class="text-white">Update</a></button>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary"><a href="profiles.php" class="text-white">Return</a></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container my-4 p-5 bg-white rounded-3 col-md-5 float-right" style="margin-right: 5%;">
            <form class="form" role="form" method="POST">
                <div class="mb-5">
                    <input type="hidden" name="_token" value="">
                    <h3 class="justify-content-center">Medications</h3>
                    <hr class="hr"/>
                    <div class="form-group row">
                        <label class="col-md-3">Medicine Name</label>
                        <input type="text" class="col-md-9" name="name" placeholder="Medication Name" value="" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Dosage & Frequency</label>
                        <input type="text" class="col-md-3" name="dosage" placeholder="Dosage" value="" readonly>
                        <select class="col-md-6" name="frequency">
                            <option value="">Select Frequency</option>
                            <option value="once_daily">Once Daily</option>
                            <option value="twice_daily">Twice Daily</option>
                            <option value="three_times_daily">Three Times Daily</option>
                            <option value="as_needed">As Needed</option>
                        </select>                  
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Specific Instructions</label>
                        <input type="text" class="col-md-9" name="instructions" placeholder="Specific Instructions" value="" readonly>                
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-warning" id="updateButton"><a href="" class="text-white">Update</a></button>
                    </div>
                    <br>
                    <h3 class="justify-content-center">Health Status</h3>
                    <hr class="hr"/>
                    <div class="form-group row">
                        <label class="col-md-3">Complaints</label>
                        <input type="text" class="col-md-9" name="complaints" placeholder="Patient Complaints" value="" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Symptoms</label>
                        <input type="text" class="col-md-9" name="symptoms" placeholder="Symptoms" value="" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">Blood Pressure & Heart Rate</label>
                        <input type="text" class="col-md-4" name="bp" placeholder="Blood Pressure" value="" readonly>
                        <input type="text" class="col-md-4" name="hr" placeholder="Heart Rate" value="" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">Respiratory Rate & Temperature</label>
                        <input type="text" class="col-md-4" name="rr" placeholder="Respiratory Rate" value="" readonly>
                        <input type="text" class="col-md-4" name="temp" placeholder="Temperature" value="" readonly>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-warning" id="updateButton"><a href="" class="text-white">Update</a></button>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="float-right">
                        <button type="button" class="btn btn-success"><a href="profiles.php" class="text-dark">Transaction History</a></button>
                    </div>
                </div>
            </form>
            <script>
                // Function to handle button click event
                function handleButtonClick() {
                    alert("This feature is still under development.");
                }
               // Add event listeners to each button
                var updateButton = document.getElementById("updateButton");
                updateButton.addEventListener("click", handleButtonClick);
            </script>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    </body>
</html>
