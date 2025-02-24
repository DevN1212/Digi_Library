<?php
require("functions.php");
session_start();
#fetch data from database
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");
$name = "";
$email = "";
$mobile = "";
$query = "select * from users where email = '$_SESSION[email]'";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
    $rollno = $row['rollno'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $profile_image = $row['image'];
    $fine = $row['fine'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books | LMS</title>
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
            font-weight: 500;
            color: white;
            padding: 5px;
        }

        .box {
            display: flex;
            flex-direction: column;
            margin: 50px 10px;
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

        .bookbtn {
            margin: 5px;
        }

        .bookbtn :hover {
            color: black;

        }

        .bookbtn a:hover {
            text-decoration: none;
        }

        .sort {
            margin-left: 20px;
            background-color: white;
            color: black;
            font-weight: 500;
            opacity: 0.85;
            border: 1px solid black;
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
    <!-- Sidebar included -->
    <?php include "./sidebar.php" ?>

    <!-- Main content section -->
    <section class="home-section">
        <!-- Heading -->
        <div class="heading">
            <h2>Find Books</h2>
        </div>

        <!-- Container for book listing -->
        <div class="box">
            <center>
                <h4>View Available Books</h4>
            </center>
            <div class="row">
                <div class="col-md-5">
                    <form action="" method="GET">
                        <div class="input-group ">
                            <input type="text" class="form-control" placeholder="Search by book name" name="search">
                            <div class="input-group-append">
                                <button style="margin-top:0px; height:38px;" class="btn btn-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Sorting options -->
            <div class="row">
                <div class="col-md-12">
                    <div aria-label="Sort by">
                        <button type="button" class="sort btn btn-secondary" onclick="sortBooks('book_name')">Sort by Name</button>
                        <button type="button" class="sort btn btn-secondary" onclick="sortBooks('aut_firstname')">Sort by Author</button>
                        <button type="button" class="sort btn btn-secondary" onclick="sortBooks('cat_name')">Sort by Category</button>
                    </div>
                </div>
            </div>

            <!-- Table to display books -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead class="thead thead-light">
                            <tr>
                                <th>Book image</th>
                                <th>Book ID</th>
                                <th>Book Name</th>
                                <th>Author Name</th>
                                <th>Category Name</th>
                                <th>Rack Name</th>
                                <th>Publisher Name</th>
                                <th>No of copies</th>
                                <th>Book Description</th>
                            </tr>
                        </thead>
                        <?php
                        // Fetch books with default sorting by book name
                        $sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'book_name'; // Default sorting by book name
                        $search_query = isset($_GET['search']) ? $_GET['search'] : '';
                        $query_books = "SELECT b.*, a.aut_firstname,a.aut_lastname, c.cat_name, r.rack_name, p.pub_name FROM books b
                                        LEFT JOIN authors a ON b.author_id = a.author_id
                                        LEFT JOIN category c ON b.cat_id = c.cat_id
                                        LEFT JOIN rack r ON b.rack_id = r.rack_id
                                        LEFT JOIN publishers p ON b.pub_id = p.pub_id
                                        WHERE b.book_name LIKE '%$search_query%' or a.aut_firstname LIKE '%$search_query%' or a.aut_lastname LIKE '%$search_query%' or c.cat_name LIKE '%$search_query%' or p.pub_name LIKE '%$search_query%'
                                        ORDER BY $sort_by"; // Sorting based on the parameter
                        $result_books = mysqli_query($connection, $query_books);
                        while ($row = mysqli_fetch_assoc($result_books)) {
                        ?>
                            <tr>
                                <td><img src="../adminportal/<?php echo $row['book_image']; ?>" alt="Book Image" style="margin-left:20px; width:110px; height:130px;"></td>
                                <td><?php echo $row['book_id']; ?></td>
                                <td><?php echo $row['book_name']; ?></td>
                                <td><?php echo $row['aut_firstname'] . $row['aut_lastname']; ?></td>
                                <td><?php echo $row['cat_name']; ?></td>
                                <td><?php echo $row['rack_name']; ?></td>
                                <td><?php echo $row['pub_name']; ?></td>
                                <td><?php echo $row['book_no']; ?></td>
                                <td>
                                    <div style="max-height: 130px; overflow: auto;">
                                        <?php echo $row['book_desc']; ?>
                                    </div>
                                </td>

                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript to handle sorting -->
    <script>
        function sortBooks(sortBy) {
            // Redirect to the same page with sorting parameter
            window.location.href = `searchbooks.php?sort_by=${sortBy}`;
        }
    </script>
</body>

</html>