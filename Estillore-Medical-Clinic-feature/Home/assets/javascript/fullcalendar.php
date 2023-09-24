<?php
// require('db.php');
// include('auth_sesh.php');

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
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/6a6ee22931.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="scripts.js"></script>|
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    /* The Modal (background) */
    .modal {
        /* Hidden by default */
        display: none;
        /* Stay in place */
        position: fixed;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>
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
$sql = "SELECT id, title, date FROM appointments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        array_push($events, $row);
    }
} else {
    echo "0 results";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $title = $_POST['title'];
    $parseDate = date('Y-m-d H:i:s',strtotime($date));
    echo $parseDate;
    echo $title;

    $sql = "INSERT into appointments(title, date) VALUES('$title', '$date')";
    if ($conn->query($sql) == TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      header("Refresh:0");
}

?>

<body class="p-3 mb-2 bg-secondary text-white" id="body-pd">
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
                    <a href="appointment.php" class="nav_link">
                        <i class='bx bx-bookmark nav_icon'></i>
                        <span class="nav_name">Appointment</span>
                    </a>
                    <a href="fullcalendar.php" class="nav_link active">
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
                    <a href="analytics.php" class="nav_link">
                        <i class='bx bx-analyse nav_icon'></i>
                        <span class="nav_name">Analytics</span>
                    </a>
                </div>
            </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!-- The button to set appointment -->
    <button type="button" style="margin-left:700px; margin-top:60px;" name="addAppointment" id="myBtn" onclick="appointment()">Add appointments</button>
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <form action="fullcalendar.php" method="post">
            <!-- Modal content -->
            <div class="modal-content">
                <label class ="text-dark" >Select Appointment Date</label><br>
                <input type="date" name="date"><br>
                <label class ="text-dark">Appointment Description</label><br>
                <input type="text" name="title">
                <br>
                <button type="submit">Confirm Appointment</button>
            </div>
        </form>
    </div>

    <!--Container Main start-->
    <div class="height-100 bg-secondary" style="display:flex;">
        <div style="width: 150px">

        </div>
        <div style="margin-top: 70px; width: 80%;">
            <!-- Calendar UI -->
            <div id='calendar' class="bg-light  text-secondary p-1">

            </div>
        </div>

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
<script src="index.global.min.js"></script>
<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        const events = <?php echo json_encode($events); ?>;

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialDate: '2023-01-12',
            initialView: 'timeGridWeek',
            nowIndicator: true,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek'
            },
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            selectable: true,
            selectMirror: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: events,
        });

        calendar.render();
        $('#calendar').fullCalendar('renderEvent', {
  title: 'Appointment',
  start: '2023-04-05T10:00:00',
  end: '2023-04-05T11:00:00',
  allDay: false
});

    });
</script>

</html>