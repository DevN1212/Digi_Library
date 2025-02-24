<?php
require("functions.php");
session_start();

// Establish connection and select database
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");

$query = "SELECT * FROM admin WHERE email = '$_SESSION[email]'";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $profile_image = $row['image'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students | LMS</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Google Fonts Import Link */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .row {
            margin-top: 30px;
        }

        body {
            background: url("../admin images/library7.jpg");
            backdrop-filter: blur(7px);
            background-size: cover;
            overflow: hidden;
        }

        .home-section {
            position: relative;
            height: 100vh;
            left: 260px;
            width: calc(100% - 260px);
            transition: all 0.5s ease;
            padding: 12px;
            overflow-x: hidden;
        }

        .heading {
            border: 2px solid white;
            backdrop-filter: blur(5px);
            margin: 0px;
            border-radius: 10px;
        }

        .heading h2 {
            text-align: center;
            font-weight: 500;
            color: white;
            padding: 5px;
        }

        .box {
            display: flex;
            flex-direction: column;
            margin: 50px;
            border: 1px solid white;
            text-align: center;
            padding: 50px;
            border-radius: 30px;
        }

        .profileimg {
            width: 170px;
            height: 150px;
            border-radius: 50%;
            margin-left: 430px;
        }

        .row {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        table {
            background-color: white;
            opacity: 0.85;
        }

        .btn :hover {
            color: white;
        }

        .btn a:hover {
            text-decoration: none;
        }

        h4,
        label {
            text-align: center;
            font-weight: 600;
            color: white;
        }
    </style>
</head>

<body>
    <?php include "./sidebar.php" ?>
    <section class="home-section">
        <div class="heading">
            <h2>Manage Students</h2>
        </div>
        <div class="box">
            <center>
                <h4>View Registered Students</h4>
            </center>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-bordered table-striped">
                        <thead class="thead thead-light">
                            <tr>
                                <th>Student ID</th>
                                <th>First Name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        $connection = mysqli_connect("localhost", "root", "");
                        $db = mysqli_select_db($connection, "lms");
                        $query = "select * from users";
                        $query_run = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                            <tr>
                                <td><?php echo $row['rollno']; ?></td>
                                <td><?php echo $row['firstname']; ?></td>
                                <td><?php echo $row['lastname']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td>
                                    <button class="btn btn-info" name="delete"><a href="?delete&rid=<?php echo $row['rollno']; ?>">Delete</a></button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="col-md-2"></div>
                <div class="alert alert-success " id="success-message" style="display: none; text-align:center; margin-top:20px;">
                    <strong>Student deleted successfully!</strong>
                </div>
                <div class="alert alert-danger " id="danger-message" style="display: none; text-align:center; margin-top:20px;">
                    <strong>Student has taken books!</strong> Unable to delete it
                </div>
                <div class="alert alert-danger " id="error-message" style="display: none; text-align:center; margin-top:20px;">
                    <strong>Error occurred while deleting student!</strong>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<?php
if (isset($_GET['delete'])) {
    $rollno = $_GET['rid'];

    // Check if the user has issued any books
    $query_check_issues = "SELECT COUNT(*) AS total_issues FROM issued_books WHERE rollno = '$rollno'";
    $result_check_issues = mysqli_query($connection, $query_check_issues);
    $row_check_issues = mysqli_fetch_assoc($result_check_issues);
    $total_issues = $row_check_issues['total_issues'];

    if ($total_issues == 0) {
        $query_delete_user = "DELETE FROM users WHERE rollno = '$rollno'";
        $query_run_delete = mysqli_query($connection, $query_delete_user);

        if ($query_run_delete) {
            echo '<script>document.getElementById("success-message").style.display = "block";</script>';
        } else {
            echo '<script>document.getElementById("error-message").style.display = "block"; setTimeout(function(){ window.location.href = "?reload"; }, 2000)</script>';
        }
    } else {
        echo '<script>document.getElementById("danger-message").style.display = "block"; setTimeout(function(){ window.location.href = "?reload"; }, 2000)</script>';
    }
}
?>