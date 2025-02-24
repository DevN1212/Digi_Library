<?php
require("functions.php");
session_start();
$connection = mysqli_connect("localhost", "root", "", "lms");

// Check if the email is set in the session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = "SELECT * FROM admin WHERE email = '$email'";
    $query_run = mysqli_query($connection, $query);

    // Fetch user data
    while ($row = mysqli_fetch_assoc($query_run)) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $profile_image = $row['image'];
    }
}

// Fetching book details
$book_id = $_GET['bid'];
$query_book = "SELECT ib.*, b.book_name, a.aut_firstname,a.aut_lastname, c.cat_name, p.pub_name,b.book_no,ib.issue_date FROM issued_books ib
                                    LEFT JOIN books b ON ib.book_id = b.book_id
                                    LEFT JOIN authors a ON ib.author_id = a.author_id
                                    LEFT JOIN category c ON ib.cat_id = c.cat_id
                                    LEFT JOIN publishers p ON ib.pub_id = p.pub_id
                                    WHERE ib.book_id = $book_id";
$result_book = mysqli_query($connection, $query_book);
$book_details = mysqli_fetch_assoc($result_book);
if (!$book_details) {
    echo "Book not found.";
    exit();
}

// Fetching user data for student roll number selection
$query_users = "SELECT * FROM users";
$result_users = mysqli_query($connection, $query_users);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Book | LMS</title>
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

        #image_preview {
            color: white;
        }
    </style>
</head>

<body>
    <?php include "./sidebar.php" ?>
    <section class="home-section">
        <div class="heading">
            <h2>Issue Books</h2>
        </div>
        <div class="box">
            <center>
                <h4>Issue Book</h4>
            </center>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-3">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group" id="image_preview" style="display: block;">
                            Book Image Preview:
                            <img src="<?php echo $book_details['book_image']; ?>" alt="Book Image" style="margin-top:10px; margin-left:55px; width:130px; height:150px;">
                        </div>
                        <div class="form-group">
                            <label for="name">Issuedbook ID:</label>
                            <input type="text" name="issuebook_id" class="form-control" value="<?php echo $book_details['issuebook_id']; ?>" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="name">Book Name:</label>
                            <input type="text" name="book_name" class="form-control" value="<?php echo $book_details['book_name']; ?>" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="author_id">Book Author:</label>
                            <input type="text" name="book_author" class="form-control" value="<?php echo $book_details['aut_firstname'].$book_details['aut_lastname']; ?>" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Book Category:</label>
                            <input type="text" name="book_cat" class="form-control" value="<?php echo $book_details['cat_name']; ?>" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="publisher_id">Book Publisher:</label>
                            <input type="text" name="book_pub" class="form-control" value="<?php echo $book_details['pub_name']; ?>" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="book_avail">Books available:</label>
                            <input type="text" name="book_avail" class="form-control" value="<?php echo $book_details['book_no']; ?>" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="student_id">Student ID:</label>
                            <input type="text" name="rollno" class="form-control" value="<?php echo $book_details['rollno']; ?>" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="issue_date">Issue Date:</label>
                            <input type="text" name="issue_date" class="form-control" value="<?php echo $book_details['issue_date']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="Return_date">Return Date:</label>
                            <input type="text" name="issue_date" class="form-control" value="<?php echo date("d-m-Y") ?>" required>
                        </div>
                        <button type="submit" name="return_book" class="btn btn-primary">Return Book</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
                <div class="alert alert-success " id="success-message" style="display: none; text-align:center; margin-top:20px;">
                    <strong>Book returned succcessfully to <?php echo $book_details['rollno']; ?>!</strong>
                </div>
                <div class="alert alert-danger " id="error-message" style="display: none; text-align:center; margin-top:20px;">
                    <strong><?php echo $_POST['rollno']; ?> have already taken 4 books!</strong> Kindly return previous books first
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php
// Check if the return book form is submitted
if (isset($_POST['return_book'])) {
    $student_id = $book_details['rollno'];
    $issuedbook_id = $book_details['issuebook_id'];
    $expected_return_date = $book_details['return_date'];

    // Check if return is after expected return date
    if (date('d-m-Y') > $expected_return_date) {
        // Apply fine of 50 to the student
        $query_fine = "UPDATE users SET fine = fine + 50 WHERE rollno = '$student_id'";
        mysqli_query($connection, $query_fine);
    }

    // Delete the issued book entry
    $query_delete = "DELETE FROM issued_books WHERE issuebook_id = $issuedbook_id";
    mysqli_query($connection, $query_delete);

    // Increase the number of copies in the books table
    $query_update = "UPDATE books SET book_no = book_no + 1 WHERE book_id = $book_id";
    mysqli_query($connection, $query_update);

    if ($query_update) {
?>
        <script>
            alert("Book returned successfully!");
            window.location.href = "viewissuedbook.php";
        </script>
<?php
    }
}
?>