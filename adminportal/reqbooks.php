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
            <h2>View Books</h2>
        </div>
        <div class="box">
            <center>
                <h4>View Requested Books</h4>
            </center>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead class="thead thead-light">
                            <tr>
                                <th>Request ID</th>
                                <th>Student ID</th>
                                <th>First Name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Status</th>
                                <th>Book Action</th>
                            </tr>
                        </thead>
                        <?php
                        $query = "SELECT requestid, rb.rollno, u.firstname, u.lastname, u.email, u.mobile, status, book_link
                            FROM requestbooks rb
                            LEFT JOIN users u ON rb.rollno = u.rollno";
                        $query_run = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($query_run)) {
                                $requestId = $row['requestid'];
                                $update_query = "UPDATE requestbooks SET status = 'viewed' WHERE requestid = '$requestId'";
                                mysqli_query($connection, $update_query);
                        ?>
                            <tr>
                                <td><?php echo $row['requestid']; ?></td>
                                <td><?php echo $row['rollno']; ?></td>
                                <td><?php echo $row['firstname']; ?></td>
                                <td><?php echo $row['lastname']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td>
                                    <a class="btn btn-info" href="<?php echo $row['book_link']; ?>?visit=<?php echo $row['requestid']; ?>">Visit</a>
                                    <a class="btn btn-danger" href="delreqbook.php?requestid=<?php echo $row['requestid']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
</body>

</html>