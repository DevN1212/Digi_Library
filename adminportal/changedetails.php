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
    <title>Edit Profile | LMS</title>
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
            <h2>My Profile</h2>
        </div>
        <div class="box">
            <center>
                <h4>Admin Profile Details Update</h4><br>
            </center>
            <img class="profileimg" src="<?php echo $profile_image; ?>" alt="Profile Image">
            <div class="row">
                <div class="col-md-5">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="firstname">First name:</label>
                            <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last name:</label>
                            <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" pattern="^[A-Za-z]+\s*\d{2}@adminpdpu\.com$">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="text" name="password" class="form-control" placeholder="new password (max 10 characters)" required maxlength="10" pattern="[a-zA-Z@$0-9]{10}">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile:</label>
                            <input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>" maxlength="10" pattern="[0-9]{10,11}">
                        </div>
                        <div class="form-group">
                            <label for="profile_image">Profile Image:</label>
                            <input type="file" name="profile_image" class="form-control-file">
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </form>
                    <div class="alert alert-success " id="success-message" style="display: none; text-align:center; margin-top:20px;">
                        <strong>Profile updated successfully!!</strong>
                    </div>
                </div>
            </div>

        </div>
    </section>
</body>


</html>
<?php
if (isset($_POST['update'])) {
    // Get the admin email from the session
    $admin_email = $_SESSION['email'];


    // Handle file upload
    $upload_dir = "uploads/"; // Directory to upload images

    // Check if a new image is uploaded
    if ($_FILES['profile_image']['size'] > 0) {
        $profile_image = $_FILES['profile_image']['name'];
        $temp_name = $_FILES['profile_image']['tmp_name'];
        move_uploaded_file($temp_name, $upload_dir . $profile_image);
    } else {
        // No new image uploaded, retain the existing image
        $profile_image = null;
    }

    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "SELECT id FROM admin WHERE email = '{$admin_email}' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $admin_id = $row['id'];

        $update_query = "UPDATE admin SET firstname = '{$_POST['firstname']}', lastname = '{$_POST['lastname']}', email = '{$_POST['email']}', password = '{$hashed_password}', mobile = '{$_POST['mobile']}'";

        // Add the profile image update if a new image is uploaded
        if ($profile_image !== null) {
            $update_query .= ", image = '{$upload_dir}{$profile_image}'";
        }
        $update_query .= " WHERE id = '{$admin_id}'";
        $query_run = mysqli_query($connection, $update_query);
        if ($query_run) {
            echo '<script>document.getElementById("success-message").style.display = "block"; setTimeout(function(){ window.location.href = "?reload"; }, 2000);</script>';
        }
    } else {
        echo "Admin not found!";
    }
    mysqli_close($connection);
}
?>