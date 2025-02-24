<?php
session_start();

// Establish connection and select database
$connection = mysqli_connect("localhost", "root", "", "lms");
// Fetch user details
$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email = '$email'";
$query_run = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($query_run);
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$email = $row['email'];
$mobile = $row['mobile'];
$profile_image = $row['image'];
$fine = $row['fine'];
$rollno = $row['rollno'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books | LMS</title>
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
            background: url("../user images/library5.jpg");
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
            margin: 50px 5px;
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

        .bookbtn :hover {
            color:white;
        }

        .bookbtn a:hover {
            text-decoration: none;
        }

        .sort {
            margin-left: 20px;
            background-color: white;
            color: black;
            font-weight: 500;
            opacity: 0.85;
            border: 1px solid black;
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
                                <th>Book Link</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        $query = "SELECT requestid, book_link, status
                        FROM requestbooks
                        WHERE rollno ='$rollno'";

                        $query_run = mysqli_query($connection, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['requestid']; ?></td>
                                    <td><?php echo $rollno; ?></td>
                                    <td>
                                        <button class="btn btn-primary bookbtn"><a href="<?php echo $row['book_link']; ?>">Visit Link</a></button>
                                    </td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <a class="btn btn-warning" name="delete" href="delreqbook.php?requestid=<?php echo $row['requestid']; ?>">Delete requested Book</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='6'>No requested books found.</td></tr>";
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