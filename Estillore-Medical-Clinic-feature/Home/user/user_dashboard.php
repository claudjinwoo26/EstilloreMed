<?php
    require('../db.php');
    include('../auth_sesh.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Estillore Medical Clinic</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../stylesheets/user_dash.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://kit.fontawesome.com/6a6ee22931.js" crossorigin="anonymous"></script>
    <script src="../assets/javascript/scripts.js"></script>
</head>
<body class="p-3 mb-2 dashboard-bg text-white" id="body-pd">
    <header class="header bg-black" id="header" style="opacity:.2; height: 69px;">
        <div class="header_toggle"><i class='bx bx-menu' id="header-toggle"></i></div>
    </header>
    <div class="l-navbar p-3 mb-2 text-white" id="nav-bar">
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
                    <a href="user_dashboard.php" class="nav_link active"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a>
                    <a href="user_profile.php" class="nav_link"> 
                        <i class='bx bx-user nav_icon'></i> 
                        <span class="nav_name">Profile</span> 
                    </a>
                    <a href="user_appointment.php" class="nav_link"> 
                        <i class='bx bx-calendar nav_icon'></i> 
                        <span class="nav_name">Appointment</span> 
                    </a>
                    <a href="user_transaction.php" class="nav_link"> 
                        <i class='bx bx-history nav_icon'></i> 
                        <span class="nav_name">History</span> 
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
    <div class="height-100 mx-auto" style="color:blue;">
        <div class="left_bar"></div>
        <div class="top_bar"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Mini Calendar -->
                    <div class="card">
                        <div class="card-header">
                            Calendar
                        </div>
                        <div class="card-body">
                            <div id="mini-calendar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Pending Appointments -->
                    <div class="card">
                        <div class="card-header">
                            Pending Appointments
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>Appointment 1</li>
                                <li>Appointment 2</li>
                                <li>Appointment 3</li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <!-- Pending Transactions -->
                    <div class="card">
                        <div class="card-header">
                            Pending Transactions
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>Transaction 1</li>
                                <li>Transaction 2</li>
                                <li>Transaction 3</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#mini-calendar').fullCalendar({
                defaultView: 'month',
                header: false,
                events: [
                    {
                        title: 'Event 1',
                        start: '2023-06-01'
                    },
                    {
                        title: 'Event 2',
                        start: '2023-06-05'
                    },
                    // Add more events as needed
                ]
            });
        });
    </script>
</body>
</html>
