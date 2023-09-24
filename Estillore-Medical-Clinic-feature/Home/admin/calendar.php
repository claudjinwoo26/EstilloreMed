<?php
require('../db.php');
include('../auth_sesh.php');

$current_date = date('Y-m-d\TH:i');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendar - Estillore Medical Clinic</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="../stylesheets/calendar.css">
    <script src="https://kit.fontawesome.com/6a6ee22931.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../assets/javascript/scripts.js"></script>
</head>
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
// TITLE IS THE PATIENTS NAME/APPOINTMENT DESCRIPTION
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['appointment_id'])) {
        $appointment_id = $_POST['appointment_id'];

        // Update the status of the appointment to 'confirmed' when accepted
        $update_sql = "UPDATE appointments SET status = 'approved' WHERE id = '$appointment_id'";

        if ($conn->query($update_sql) === TRUE) {
            echo "Appointment accepted successfully.";
        } else {
            echo "Error accepting appointment: " . $conn->error;
        }
    } else {
        $date = $_POST['date'];
        $title = $_POST['title'];
        $parseDate = date('Y-m-d H:i:s', strtotime($date));
        $patient_id = $_SESSION['patient_id'];
        // Insert a new appointment with 'pending' status
        $sql = "INSERT INTO appointments (title, date, status, fk_patient_id) VALUES ('$title', '$date','approved', $patient_id  )";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$events = array();
// Retrieve pending appointments
$sql = "SELECT id, title, date FROM appointments WHERE status = 'approved'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($events, $row);
    }
}
// $conn->close();
?>

<body class="p-3 mb-2 text-white" id="body-pd" style="background-image: linear-gradient(to right, #c9fadc, #baf5e3, #aeefea, #a9e8ef, #a8e0f1, #a4dbf3, #a2d5f4, #a2cff4, #9bcaf7, #97c5fa, #94bffd, #94b9ff);">
    <header class="header bg-black" id="header" style="opacity:.2; height: 69px;">
        <div class="header_toggle"><i class='bx bx-menu' id="header-toggle"></i></div>
    </header>
    <div class="l-navbar p-3 mb-2 bg-black text-white" id="nav-bar">
        <nav class="nav">
            <div>
                <div>
                    <a href="dashboard.php" class="nav_link crazy">
                        <i class="bx bxs-user-circle bx-sm nav_icon"></i>
                        <span class="nav_name">Welcome, <strong><?php echo $_SESSION['username']; ?></strong>!</span>
                    </a>
                </div>
                <br><br>
                <div class="nav_list">
                    <a href="dashboard.php" class="nav_link">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="profiles.php" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Profiles</span>
                    </a>
                    <a href="calendar.php" class="nav_link active">
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
            </div>
            <a href="../logout.php" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">Sign Out</span>
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100" style="margin-left:100px;">
        <div class="col-md-10 float">
            <!-- The Button to set appointment -->
            <h1 style="color: #212584; margin-left:7.5%; margin-top:60px">Calendar</h1>
            <button class="btn btn-primary rounded" type="button" style="margin-left:20px; margin-top:10px; margin-left:7.5%" name="addAppointment" id="myBtn" onclick="appointment()">+ Add appointment</button>
            <a class="btn btn-primary rounded" style="margin-top: 10px; margin-left: 0%" href="appointment_manager.php">Appointment Manager</a>

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <form action="calendar.php" method="post">
                    <!-- Modal content -->
                    <div class="modal-content col-md-4 rounded">
                        <label class="text-dark">Select Appointment Date</label><br>
                        <input type="datetime-local" name="date" value="<?php echo $current_date; ?>" min="<?php echo $current_date; ?>"><br>
                        <label class="text-dark">Appointment Description</label><br>
                        <input type="text" name="title">
                        <!-- <label class="text-dark">Appointment Time</label><br>
                        <input type="time" name="time"> -->
                        <?php
                        ?>
                        <br>
                        <button class="btn btn-dark rounded" type="submit">Confirm Appointment</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Calendar UI -->
        <div id="calendar" class="p-3 text-dark rounded col-md-11 height-70 float" style="margin-top:20px; margin-left:7%;background-color:#17a2b8"></div>
    </div>
    <!--Container Main end-->
</body>
<script>
    var modal = document.getElementById('myModal');
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];

    function appointment() {
        modal.style.display = "block";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script src="../assets/javascript/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        const events = <?php echo json_encode($events); ?>;
        const date = new Date();

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialDate: date,
            initialView: 'dayGridMonth',
            nowIndicator: true,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            selectable: true,
            selectMirror: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: events,
        });

        calendar.render();
    });
</script>

</html>