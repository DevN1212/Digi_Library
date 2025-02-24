<?php
$con = mysqli_connect('localhost', 'root', '', 'lms');

// Check if connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];

// Check if the email is already registered
$check_query = "SELECT * FROM admin WHERE email = '$email'";
$check_result = mysqli_query($con, $check_query);

// Check if the number of admins is less than or equal to 2
$total_admins_query = "SELECT COUNT(*) AS total_admins FROM admin";
$total_admins_result = mysqli_query($con, $total_admins_query);
$total_admins_row = mysqli_fetch_assoc($total_admins_result);
$total_admins = $total_admins_row['total_admins'];

if ($total_admins >= 2) {
    ?>
    <script>
        alert("Error: Registration limit reached. Only 2 admins are allowed.");
        window.location.href = "admin.php";
    </script>
    <?php
} elseif (mysqli_num_rows($check_result) == 1) {
    ?>
    <script>
        alert("Error: This email is already registered. Please use a different email.");
        window.location.href = "admin.php";
    </script>
    <?php
} else {
    // Hash the password
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert user data into the database
    $query = "INSERT INTO admin (firstname, lastname, email, password, mobile) VALUES ('$_POST[first]', '$_POST[last]', '$email', '$hashed_password', '$_POST[mobile]')";
    $query_run = mysqli_query($con, $query);

    // Check if query was successful
    if ($query_run) {
        ?>
        <script>
            alert("Success! You have been successfully registered! You may login now.");
            window.location.href = "admin.php";
        </script>
        <?php
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// Close database connection
mysqli_close($con);
?>
