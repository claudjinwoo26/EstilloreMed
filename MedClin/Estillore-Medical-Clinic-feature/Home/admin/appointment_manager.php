<?php
require('../db.php');
include('../auth_sesh.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointment Manager - Estillore Medical Clinic</title>
    <!-- Add your CSS and JavaScript links here -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profiles";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$events = array();

// Retrieve pending appointments


if(isset($_POST["status"])){
    $id = $_POST['id'];
    $sql = "SELECT appointment_id, appointment_date, patient_name, patient_id, status FROM appointments_manager WHERE status = 'pending' and appointment_id = $id LIMIT 1";
    $result = $conn->query($sql);
    if ($result) {
        while ($row = $result -> fetch_row()) {
            $date = $row[1];
            $patientId = $row[3];
            $sql = "INSERT INTO appointments (date, status, fk_patient_id)VALUES('$date', 'approved', $patientId)";
            $conn->query($sql);
            $sql = "UPDATE appointments_manager SET status = 'confirmed' where appointment_id = $id";
            $conn->query($sql);
        }
        
      }
}


$sql = "SELECT appointment_id, appointment_date, patient_name, status FROM appointments_manager";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
?>
    
</head>
<body>
<table>
        <thead>
            <tr>
                <th>Client</th>
                <th>Status</th>
                <th>Appointment Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
        
        while ($row = $result->fetch_assoc()) {
  
     
        
        ?>
           <tr>
            <td><?php echo $row["patient_name"]?></td>
            <td><?php echo $row["status"]?></td>
            <td><?php echo $row["appointment_date"]?></td>
            <td><?php
                if ($row["status"] == "pending"){
            ?>
                <form action="appointment_manager.php" method="post">
                <input type="hidden" name="status" value="approved">
                <input type="hidden" name="id" value="<?php echo $row['appointment_id']?>">
                <button name ="approve" type="submit"> Approve</button>
                </form>
                <?php
                }
                ?>
            </td>
           </tr>
        <?php


    }
       
}
        
        ?>
        </tbody>
    </table>

</body>

</html>




