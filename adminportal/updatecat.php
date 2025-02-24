<?php
require("functions.php");
session_start();
#fetch data from database
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");
$name = "";
$email = "";
$mobile = "";
$query = "select * from admin where email = '$_SESSION[email]'";
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
    <title>Update Categories | LMS</title>
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

        .btn {
            margin-left: 20px;
        }

        .btn :hover {
            color: black;
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
            <h2>Manage Categories</h2>
        </div>
        <div class="box">
            <center>
                <h4>View Categories</h4>
            </center>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-bordered table-striped">
                        <thead class="thead thead-light">
                            <tr>
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        $connection = mysqli_connect("localhost", "root", "");
                        $db = mysqli_select_db($connection, "lms");
                        $query = "select * from category";
                        $query_run = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                            <tr>
                                <td><?php echo $row['cat_id']; ?></td>
                                <td><?php echo $row['cat_name']; ?></td>
                                <td><button class="btn btn-warning"><a href="edit_cat.php?cid=<?php echo $row['cat_id']; ?>">Edit</a></button>
                                    <button class="btn btn-primary"><a href="delete_cat.php?cid=<?php echo $row['cat_id']; ?>">Delete</a></button>
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