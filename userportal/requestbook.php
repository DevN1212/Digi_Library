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
    <title>Request Book | LMS</title>
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

        #image_preview {
            color: white;
        }
    </style>
</head>

<body>
    <?php include "./sidebar.php" ?>
    <section class="home-section">
        <div class="heading">
            <h2>Request Books</h2>
        </div>
        <div class="box">
            <center>
                <h4>Request a new Book</h4>
            </center>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Book Link:</label>
                            <input type="text" name="book_link" class="form-control" required>
                        </div>

                        <button type="submit" name="request_book" class="btn btn-primary">Request Book</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
                <div class="alert alert-success " id="success-message" style="display: none; text-align:center; margin-top:20px;">
                    Book has been requested successfully!!
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php
if (isset($_POST['request_book'])) {
    // Retrieve book link from form
    $book_link = $_POST['book_link'];

    // Insert book request into the database
    $insert_query = "INSERT INTO requestbooks (rollno, book_link) VALUES ('$rollno', '$book_link')";
    $insert_result = mysqli_query($connection, $insert_query);
    if ($insert_query) {
        echo '<script>document.getElementById("success-message").style.display = "block"; setTimeout(function(){ window.location.href = "?reload"; }, 1000);</script>';
    } else {
        // Display error message if there's an issue with inserting the book request
        echo '<script>alert("Failed to request book.");</script>';
    }
}
?>