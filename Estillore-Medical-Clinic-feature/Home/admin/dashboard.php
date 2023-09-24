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
    <link rel="stylesheet" href="../stylesheets/dashboard.css">
    <script src="https://kit.fontawesome.com/6a6ee22931.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../assets/javascript/scripts.js"></script>
    <script src="../logout.js"></script>
</head>

<body class="p-3 dashboard-bg mb-2text-white" id="body-pd">
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
                    <a href="dashboard.php" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="profiles.php" class="nav_link">
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
    <h1 style="margin-left: 15%; margin-top:3%;">Dashboard</h1>

    <div style="margin-left: 15%; margin-top:3%; display:flex; flex-direction:row; gap:15%">
        <div>
            <table>
                <h4>Patient Profiles</h4>
                <tr>
                    <th scope="col" class="bg-white text-center">Patient ID</th>
                    <th scope="col" class="bg-white" style="padding-left:50px">Patient Name</th>
                    <th scope="col" class="bg-white" style="padding-right: 50px; padding-left: 50px;">Patient Contact#</th>
                </tr>
                <tr>
                    <td class="text-center bg-primary" style="padding-bottom: 20px;">0001</td>
                    <td class="text-center bg-primary" style="padding-left:50px; padding-bottom: 20px;">Jem Angeles</td>
                    <td class="text-center bg-primary" style="padding-bottom: 20px;">09218172321</td>
                </tr>
                <tr>
                    <td class="text-center bg-primary" style="padding-bottom: 20px;">0001</td>
                    <td class="text-center bg-primary" style="padding-left:50px; padding-bottom: 20px;">Jem Angeles</td>
                    <td class="text-center bg-primary" style="padding-bottom: 20px;">09218172321</td>
                </tr>
                <tr>
                    <td class="text-center bg-primary" style="padding-bottom: 20px;">0001</td>
                    <td class="text-center bg-primary" style="padding-left:50px; padding-bottom: 20px;">Jem Angeles</td>
                    <td class="text-center bg-primary" style="padding-bottom: 20px;">09218172321</td>
                </tr>
            </table>
        </div>
        <div>
            <table class="calendar">
                <h4>Calendar</h4>
                <div style="display: flex; flex-direction:row; gap:62%">
                    <h6 class="bg-white" style="padding-right: 1%;">Month of June</h6>
                    <h6 class="bg-white">Year 2023</h6>
                </div>

                <thead>
                    <tr>
                        <th scope="col" class="bg-white">Sun</th>
                        <th scope="col" class="bg-white">Mon</th>
                        <th scope="col" class="bg-white">Tue</th>
                        <th scope="col" class="bg-white">Wed</th>
                        <th scope="col" class="bg-white">Thu</th>
                        <th scope="col" class="bg-white">Fri</th>
                        <th scope="col" class="bg-white">Sat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center bg-primary">-</td>
                        <td class="text-center bg-primary">-</td>
                        <td class="text-center bg-primary">-</td>
                        <td class="text-center bg-primary">-</td>
                        <td class="text-center bg-primary">1</td>
                        <td class="text-center bg-primary">2</td>
                        <td class="text-center bg-primary">3</td>
                    </tr>
                    <tr>
                        <td class="text-center bg-primary">4</td>
                        <td class="text-center bg-primary">5</td>
                        <td class="text-center bg-primary">6</td>
                        <td class="text-center bg-primary">7</td>
                        <td class="text-center bg-primary">8</td>
                        <td class="text-center bg-primary">9</td>
                        <td class="text-center bg-primary">10</td>
                    </tr>
                    <tr>
                        <td class="text-center bg-primary">11</td>
                        <td class="text-center bg-primary">12</td>
                        <td class="text-center bg-primary">13</td>
                        <td class="text-center bg-primary">14</td>
                        <td class="text-center bg-primary">15</td>
                        <td class="text-center bg-primary">16</td>
                        <td class="text-center bg-primary">17</td>
                    </tr>
                    <tr>
                        <td class="text-center bg-primary">18</td>
                        <td class="text-center bg-primary">19</td>
                        <td class="text-center bg-primary">20</td>
                        <td class="text-center bg-primary">21</td>
                        <td class="text-center bg-primary">22</td>
                        <td class="text-center bg-primary">23</td>
                        <td class="text-center bg-primary">24</td>
                    </tr>
                    <tr>
                        <td class="text-center bg-primary">25</td>
                        <td class="text-center bg-primary">26</td>
                        <td class="text-center bg-primary">27</td>
                        <td class="text-center bg-primary">28</td>
                        <td class="text-center bg-primary">29</td>
                        <td class="text-center bg-primary">30</td>
                        <td class="text-center bg-primary">-</td>
                    </tr>
                    <!-- Populate the rest of the calendar days -->
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-left: 15%; margin-top:3%; display:flex; flex-direction:row;">
        <div>
            <table>
                <h4>Inventory</h4>
                <tr>
                    <th scope="col" class="bg-white text-center">Supply name</th>
                    <th scope="col" class="bg-white" style="padding-left:50px">Supply Category</th>
                    <th scope="col" class="bg-white" style="padding-left:50px">Stocks Quantity</th>
                    <th scope="col" class="bg-white" style="padding-right: 50px; padding-left: 50px;">Exp. Date</th>
                </tr>
                <tr>
                    <td class="text-center bg-primary" style="padding-bottom: 20px;">Flu Vaccine</td>
                    <td class="text-center bg-primary" style="padding-left:50px; padding-bottom: 20px;">Vaccine</td>
                    <td class="text-center bg-primary" style="padding-bottom: 20px;">30</td>
                    <td class="text-center bg-primary" style="padding-bottom: 20px;">December 2023</td>
                </tr>
                <tr>
                    <td class="text-center bg-primary" style="padding-bottom: 20px;">Biogesic</td>
                    <td class="text-center bg-primary" style="padding-left:50px; padding-bottom: 20px;">Medicine</td>
                    <td class="text-center bg-primary" style="padding-bottom: 20px;">26</td>
                    <td class="text-center bg-primary" style="padding-bottom: 20px;">January 2024</td>
                </tr>
                <tr>
                    <td class="text-center bg-primary" style="padding-bottom: 20px;">Face Masks</td>
                    <td class="text-center bg-primary" style="padding-left:50px; padding-bottom: 20px;">Supplies</td>
                    <td class="text-center bg-primary" style="padding-bottom: 20px;">150</td>
                    <td class="text-center bg-primary" style="padding-bottom: 20px;">N/A</td>
                </tr>
            </table>
        </div>
    </div>


    <!--Container Main end-->
</body>

</html>