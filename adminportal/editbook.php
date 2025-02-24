<?php
session_start();
#fetch data from database
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");
$query = "select * from admin where email = '$_SESSION[email]'";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $profile_image = $row['image'];
}

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
// Fetch authors
$query_authors = "SELECT * FROM authors";
$result_authors = mysqli_query($connection, $query_authors);

// Fetch publishers
$query_publishers = "SELECT * FROM publishers";
$result_publishers = mysqli_query($connection, $query_publishers);

// Fetch racks
$query_racks = "SELECT * FROM rack";
$result_racks = mysqli_query($connection, $query_racks);

// Fetch categories
$query_categories = "SELECT * FROM category";
$result_categories = mysqli_query($connection, $query_categories);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book | LMS</title>
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
            <h2>Manage Books</h2>
        </div>
        <div class="box">
            <center>
                <h4>Edit Book</h4>
            </center>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group" id="image_preview" style="display: block;">
                            Book Image Preview:
                            <img id="preview_image" src="<?php echo $book_details['book_image']; ?>" alt="Book Image Preview" style="margin-left: 90px; width: 150px; height: 190px;">
                        </div>
                        <div class="form-group">
                            <label for="name">Book Name:</label>
                            <input type="text" name="book_name" class="form-control" value="<?php echo $book_details['book_name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="author_id">Author:</label>
                            <select name="book_author" class="form-control" required>
                                <option value="">Select Author</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($result_authors)) {
                                    echo "<option value='" . $row['author_id'] . "'>" . $row['aut_firstname'] . $row['aut_lastname'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="publisher_id">Publisher:</label>
                            <select name="book_publisher" class="form-control" required>
                                <option value="">Select publisher</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($result_publishers)) {
                                    echo "<option value='" . $row['pub_id'] . "'>" . $row['pub_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rack_id">Rack:</label>
                            <select name="book_rack" class="form-control" required>
                                <option value="">Select Rack</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($result_racks)) {
                                    echo "<option value='" . $row['rack_id'] . "'>" . $row['rack_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category:</label>
                            <select name="book_category" class="form-control" required>
                                <option value="">Select Category</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($result_categories)) {
                                    echo "<option value='" . $row['cat_id'] . "'>" . $row['cat_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Book Description:</label>
                            <textarea name="book_desc" class="form-control" rows="4" required><?php echo $book_details['book_desc']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">No of copies:</label>
                            <input type="text" name="no_of_books" class="form-control" value="<?php echo $book_details['book_no']; ?>" required>
                        </div>
                        <!-- Inside your HTML form -->
                        <div class="form-group">
                            <label for="book_image">Select Book Image:</label>
                            <input type="file" name="book_image" class="form-control-file" onchange="previewImage(event)" accept="image/*">
                        </div>
                        <button type="submit" name="update_book" class="btn btn-primary">Update Book</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
                <div class="alert alert-success " id="success-message" style="display: none; text-align:center; margin-top:20px;">
                    Book has been updated successfully!!
                </div>
                <div class="alert alert-dnager " id="error-message" style="display: none; text-align:center; margin-top:20px;">
                    <strong>Book has been issued by student!</strong> Unable to update now!!
                </div>
            </div>
        </div>
    </section>
    <script>
        // JavaScript function to show image preview
        function previewImage(event) {
            var imagePreview = document.getElementById('image_preview');
            var imgElement = document.getElementById('preview_image');
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function() {
                imgElement.src = reader.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    </script>
</body>

</html>

<?php
if (isset($_POST['update_book'])) {
    // Get the book ID from the URL parameter
    $book_id = $_GET['bid'];

    // Extract book details from $_POST
    $book_name = $_POST['book_name'];
    $book_author = $_POST['book_author'];
    $book_publisher = $_POST['book_publisher'];
    $book_rack = $_POST['book_rack'];
    $book_category = $_POST['book_category'];
    $book_desc = $_POST['book_desc'];
    $book_no = $_POST['no_of_books'];

    // File upload handling
    $upload_dir = "uploads/"; // Directory to upload images
    $profile_image = null;

    // Check if a new image is uploaded
    if ($_FILES['book_image']['size'] > 0) {
        $file_name = $_FILES['book_image']['name'];
        $file_tmp = $_FILES['book_image']['tmp_name'];
        $file_name_new = uniqid('', true) . '_' . $file_name;
        $file_destination = $upload_dir . $file_name_new;

        if (move_uploaded_file($file_tmp, $file_destination)) {
            // Image uploaded successfully
            $profile_image = $file_destination;
        } else {
            // Failed to upload image
            echo '<script>alert("Failed to upload image.");</script>';
            exit(); // Stop execution
        }
    }

    // Construct the SQL query to update the book details
    $update_query = "UPDATE books SET 
                     book_name = '$book_name',
                     author_id = '$book_author',
                     pub_id = '$book_publisher',
                     rack_id = '$book_rack',
                     cat_id = '$book_category',
                     book_desc = '$book_desc',
                     book_no = '$book_no'";

    // Add image update to the query if a new image is uploaded
    if ($profile_image !== null) {
        $update_query .= ", book_image = '$profile_image'";
    }

    $update_query .= " WHERE book_id = '$book_id'";

    // Execute the query
    $query_run = mysqli_query($connection, $update_query);

    // Check if the query was successful
    if ($query_run) {
        echo '<script>alert("Book details updated successfully!"); window.location.href = "updatebooks.php"; </script>';
        exit(); // Stop execution after redirection
    } else {
        echo '<script>alert("Failed to update book details.");</script>';
    }

    // Close connection
    mysqli_close($connection);
}
?>