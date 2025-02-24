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
    <title>Add Rack | LMS</title>
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
            <h2>Manage Racks</h2>
        </div>
        <div class="box">
            <center>
                <h4>Add Racks</h4>
            </center>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Rack Name:</label>
                            <input type="text" class="form-control" name="rack_name" required>
                        </div>
                        <button type="submit" name="add_rack" class="btn btn-primary">Add Rack</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
                <div class="alert alert-success " id="success-message" style="display: none; text-align:center; margin-top:20px;">
                    Rack has been added successfully!!
                </div>
                <div class="alert alert-danger " id="error-message" style="display: none; text-align:center; margin-top:20px;">
                <strong>Rack already exists!</strong> Please add new rack.
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php
if(isset($_POST['add_rack'])) {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $rack_name = $_POST['rack_name'];
    
    // Check if the rack already exists
    $check_query = "SELECT * FROM rack WHERE rack_name = '$rack_name'";
    $check_result = mysqli_query($connection, $check_query);
    if(mysqli_num_rows($check_result) > 0) {
        // If rack already exists, show error message
        echo '<script>document.getElementById("error-message").style.display = "block";</script>';
    } else {
        // Insert the rack if it doesn't exist
        $query = "INSERT INTO rack (rack_name) VALUES ('$rack_name')";
        $query_run = mysqli_query($connection, $query);
        if($query_run) {
            // Show success message if query was successful
            echo '<script>document.getElementById("success-message").style.display = "block";</script>';
            header("addcat.php");
            exit(); // Stop execution after redirection
        } else {
            // Handle errors if any
            echo "Error: " . mysqli_error($connection);
        }
    }
}
?>