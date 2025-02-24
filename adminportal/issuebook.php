<?php
require("functions.php");
session_start();
$connection = mysqli_connect("localhost", "root", "", "lms");
$query = "SELECT * FROM admin WHERE email = '$_SESSION[email]'";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $profile_image = $row['image'];
}

// Fetching book details
$book_id = $_GET['bid'];
$query_book = "SELECT b.*, a.author_id, c.cat_id, p.pub_id, a.aut_firstname, a.aut_lastname, c.cat_name, r.rack_name, p.pub_name FROM books b
                LEFT JOIN authors a ON b.author_id = a.author_id
                LEFT JOIN category c ON b.cat_id = c.cat_id
                LEFT JOIN rack r ON b.rack_id = r.rack_id
                LEFT JOIN publishers p ON b.pub_id = p.pub_id
                WHERE b.book_id = $book_id";

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
                            <label for="student_rollno">Student Roll no:</label>
                            <select name="rollno" class="form-control" required>
                                <option value="">Select student</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($result_users)) {
                                    echo "<option value='" . $row['rollno'] . "'>" . $row['rollno'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">No of copies:</label>
                            <input type="text" name="no_of_books" class="form-control" value="1" pattern="^(1)$" required>
                        </div>
                        <div class="form-group">
                            <label for="issue_date">Issue Date:</label>
                            <input type="text" name="issue_date" class="form-control" value="<?php echo date("d-m-Y") ?>" required>
                        </div>
                        <button type="submit" name="issue_book" class="btn btn-primary">Issue Book</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
                <div class="alert alert-success " id="success-message" style="display: none; text-align:center; margin-top:20px;">
                    <strong>Book issued succcessfully to <?php echo $_POST['rollno'];?>!</strong>
                </div>
                <div class="alert alert-danger " id="taken-message" style="display: none; text-align:center; margin-top:20px;">
                    <strong><?php echo $_POST['rollno'];?> have already taken one book!</strong> Kindly issue another book
                </div>
                <div class="alert alert-danger " id="error-message" style="display: none; text-align:center; margin-top:20px;">
                    <strong><?php echo $_POST['rollno'];?> have already taken 4 books!</strong> Kindly return previous books first
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php
if (isset($_POST['issue_book'])) {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $student_id = $_POST['rollno'];
    $book_image = $book_details['book_image'];
    $author_id = $book_details['author_id'];
    $category_id = $book_details['cat_id'];
    $publisher_id = $book_details['pub_id'];
    $book_no = $book_details['book_no'];
    $issue_date = $_POST['issue_date'];
    $return_date = date('d-m-Y', strtotime($issue_date . ' + 1 month'));

    // Check if the student has already taken this book
    $query_check_book_taken = "SELECT * FROM issued_books WHERE rollno = '$student_id' AND book_id = $book_id";
    $result_check_book_taken = mysqli_query($connection, $query_check_book_taken);
    if (mysqli_num_rows($result_check_book_taken) > 0) {
        // Display alert message that the book has already been taken by the student
        echo '<script>document.getElementById("taken-message").style.display = "block";</script>';
    } else {
        // Check if the student has already taken 4 books
        $query_check_books = "SELECT COUNT(*) AS total_books FROM issued_books WHERE rollno = '$student_id'";
        $result_check_books = mysqli_query($connection, $query_check_books);
        $row_check_books = mysqli_fetch_assoc($result_check_books);
        $total_books_taken = $row_check_books['total_books'];

        if ($total_books_taken >= 4) {
            // Display alert message for maximum books reached
            echo '<script>document.getElementById("error-message").style.display = "block";</script>';
        } else {
            if ($book_no > 0) {
                $query = "INSERT INTO issued_books (rollno, book_image, book_id, author_id, cat_id, pub_id, issue_date, return_date) 
                      VALUES ('$student_id', '$book_image',$book_id, $author_id, $category_id, $publisher_id, '$issue_date', '$return_date')";

                // Execute the query
                if (mysqli_query($connection, $query)) {
                    // Reduce the number of copies by the number of copies issued
                    $query_update = "UPDATE books SET book_no = book_no - 1 WHERE book_id = $book_id";
                    mysqli_query($connection, $query_update);
                    echo '<script>document.getElementById("success-message").style.display = "block";</script>'; 
                } 
            } else {
                echo '<script>alert("No more copies of this book are available");</script>';
                header("Location:updatebooks.php");
            }
        }
    }
}
?>


