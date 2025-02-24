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
    <title>Add Author | LMS</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
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
            font-weight: 600;
            color: white;
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
            <h2>Manage Authors</h2>
        </div>
        <div class="box">
            <center>
                <h4>Add Author</h4>
            </center>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Author First Name:</label>
                            <input type="text" class="form-control" name="aut_firstname" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Author Last Name:</label>
                            <input type="text" class="form-control" name="aut_lastname" required>
                        </div>
                        <button type="submit" name="add_author" class="btn btn-primary">Add Author</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
                <div class="alert alert-success " id="success-message" style="display: none; text-align:center; margin-top:20px;">
                    Author has been added successfully!!
                </div>
                <div class="alert alert-danger " id="error-message" style="display: none; text-align:center; margin-top:20px;">
                    <strong>Author already exists!</strong> Please add new author.
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<?php
if (isset($_POST['add_author'])) {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $aut_firstname = $_POST['aut_firstname'];
    $aut_lastname = $_POST['aut_lastname'];

    // Check if the author already exists
    $check_query = "SELECT * FROM authors WHERE aut_firstname = '$aut_firstname' and aut_lastname='$aut_lastname'";
    $check_result = mysqli_query($connection, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        // If author already exists, show error message
        echo '<script>document.getElementById("error-message").style.display = "block";</script>';
    } else {
        // Insert the author if it doesn't exist
        $query = "INSERT INTO authors (aut_firstname,aut_lastname) VALUES ('$aut_firstname','$aut_lastname')";
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            // Show success message if query was successful
            echo '<script>document.getElementById("success-message").style.display = "block";</script>';
            header("addauthor.php");
            exit(); // Stop execution after redirection
        } else {
            // Handle errors if any
            echo "Error: " . mysqli_error($connection);
        }
    }
}
?>
<?php
if (isset($_POST['add_author'])) {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $query = "insert into authors values('$_POST[author_name]')";
    $query_run = mysqli_query($connection, $query);
    header("Location:addbook.php");
}
?>