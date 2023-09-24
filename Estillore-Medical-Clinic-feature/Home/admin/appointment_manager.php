<?php
require('../db.php');
include('../auth_sesh.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointment Manager</title>
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
    // TITLE IS THE PATIENTS NAME/APPOINTMENT DESCRIPTION
    // Retrieve pending appointments
    //Approve Appointments Query
    if (isset($_POST["status"]) && $_POST['status'] == 'approved') {
        $id = $_POST['id'];
        $sql = "SELECT id, date, title, fk_patient_id, status FROM appointments WHERE status = 'pending' and id = $id LIMIT 1";
        $result = $conn->query($sql);
        if ($result) {
            while ($row = $result->fetch_row()) {
                $date = $row[1];
                $title = $row[2];
                $patientId = $row[3];
                $sql = "INSERT INTO appointments (date,  title, status, fk_patient_id)VALUES('$date', '$title', 'approved', $patientId)";
                $conn->query($sql);
                $sql = "UPDATE appointments SET status = 'approved' where id = $id";
                $conn->query($sql);
            }
        }
    }
    // Reject Appointment Query
    if (isset($_POST["status"]) && $_POST['status'] == 'rejected') {
        $id = $_POST['id'];
        $sql = "SELECT id, date, title, fk_patient_id, status FROM appointments WHERE status = 'pending' and id = $id LIMIT 1";
        $result = $conn->query($sql);
        if ($result) {
            while ($row = $result->fetch_row()) {
                $sql = "DELETE from appointments where id =$id";
                $conn->query($sql);
            }
        }
    }
    //Delete Appointments Query
    if (isset($_POST["status"])) {
        $id = $_POST['id'];
        $sql = "SELECT id, date,  title, fk_patient_id, status FROM appointments WHERE status = 'approved' and id = $id LIMIT 1";
        $result = $conn->query($sql);
        if ($result) {
            while ($row = $result->fetch_row()) {
                $sql = "DELETE from appointments where id =$id";
                $conn->query($sql);
            }
        }
    }

    $sql = "SELECT id, Date(date) as real_date, date, Time(date) as time, title, status FROM appointments";
    $result = $conn->query($sql);

    ?>

</head>

<body class="mr-5">
    <a href="calendar.php"><button class="btn mb-5 mt-5 btn-primary ">&#8617; Calendar</button></a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Client</th>
                <th scope="col">Status</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">Appointment Time</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row["title"] ?></td>
                        <td><?php echo $row["status"] ?></td>
                        <td><?php echo $row["real_date"] ?></td>
                        <td><?php echo $row["time"] ?></td>
                        <td><?php
                            // Approve Button
                            if ($row["status"] == "pending") {
                            ?>

                                <div class="d-flex flex-row">
                                    <form action="appointment_manager.php" method="post" class="mx-2">
                                        <input type="hidden" name="status" value="approved">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <button class="btn btn-success btn-confirm" name="confirmed" type="button">Approve</button>
                                    </form>

                                    <?php
                                    // Reject Button
                                    if ($row["status"] == "pending") {
                                    ?>
                                        <form action="appointment_manager.php" method="post" class="mx-2">
                                            <input type="hidden" name="status" value="rejected">
                                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                            <button class="btn btn-dark btn-confirm" name="reject" type="button">Reject</button>
                                        </form>
                                </div>
                        <?php
                                    }
                                }
                        ?>
                        <?php
                        // Delete Button
                        if ($row["status"] == "approved") {
                        ?>
                            <form action="appointment_manager.php" method="post" class="mx-2">
                                <input type="hidden" name="status" value="approved">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <button class="btn btn-danger btn-confirm" name="delete" type="button"> Delete</button>
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
    <!-- Bootstrap Modal for Confirmation -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to proceed with this action?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="confirmActionButton">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript to handle the confirmation action
        $(document).ready(function() {
            $('.btn-confirm').click(function() {
                var form = $(this).closest('form');
                $('#confirmationModal').modal('show');

                $('#confirmActionButton').on('click', function() {
                    form.submit();
                });
            });
        });
    </script>

</body>

</html>