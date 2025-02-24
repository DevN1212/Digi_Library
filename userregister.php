<?php
// Start session
session_start();

// Establish database connection
$con = mysqli_connect('localhost', 'root', '', 'lms');

// Check if connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve email and roll number from form submission
$email = $_POST['email'];
$rollno = $_POST['rollno'];

// Store email in session variable
$_SESSION['email'] = $email;

// Check if the email is already registered
$check_email_query = "SELECT * FROM users WHERE email = '$email'";
$check_email_result = mysqli_query($con, $check_email_query);

// Check if the roll number is already registered
$check_rollno_query = "SELECT * FROM users WHERE rollno = '$rollno'";
$check_rollno_result = mysqli_query($con, $check_rollno_query);

if (mysqli_num_rows($check_email_result) == 1) {
    ?>
    <script>
        alert("Error: This email is already registered. Please use a different email.");
        window.location.href = "user.php";
    </script>
    <?php
} elseif (mysqli_num_rows($check_rollno_result) == 1) {
    ?>
    <script>
        alert("Error: This roll number is already registered. Please use a different roll number.");
        window.location.href = "user.php";
    </script>
    <?php
} else {
    // Hash the password
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Store user details in the database
    $query = "INSERT INTO users (rollno, firstname, lastname, email, password, mobile) VALUES ('$rollno','$_POST[first]', '$_POST[last]', '$email', '$hashed_password', '$_POST[mobile]')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        ?>
        <script>
            alert("Success! You have been successfully registered! You may login now.");
            window.location.href = "user.php";
        </script>
        <?php
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// Close database connection
mysqli_close($con);
?>
