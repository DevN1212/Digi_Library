<?php
require("functions.php");
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard | LMS</title>
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

		@keyframes fade-bottom {
			0% {
				opacity: 0;
				transform: translateY(100px);
			}

			100% {
				opacity: 1;
				transform: translateY(0);
			}
		}

		@keyframes fade {
			0% {
				opacity: 0;
			}

			100% {
				opacity: 1;
			}
		}

		.row {
			margin-top: 30px;
		}
		
		.row1{
			animation: fade-bottom 1s ease-out forwards;
			animation-delay: 0s;
		}

		.row2{
			opacity: 0;
			animation: fade-bottom 1s ease-out forwards;
			animation-delay: 0.2s;
		}
		
		.row3{
			opacity: 0;
			animation: fade-bottom 1s ease-out forwards;
			animation-delay: 0.4s;
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

		}

		.home-content {
			display: flex;
			align-items: center;
			flex-wrap: wrap;
		}

		.home-section .home-content .text {
			font-size: 26px;
			font-weight: 600;
			color: #11101d;
		}

		.card {
			border: 1px solid black;
			color: black;
			background: white;
			opacity: 0.75;
		}

		.dashboard {
			width: 50%;
			float: left;
		}

		.calendar {
			margin-top: 100px;
			opacity: 0;
			width: 50%;
			float: right;
			height: 45vh;
			animation: fade-bottom 1s ease-in-out forwards;
		}

		.elegant-calencar {
			box-shadow: 0px 0px 10px black;
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

		.notify {
			position: absolute;
			top: 90px;
			right: 30px;
			z-index: 999;
			font-size: 25px;
			animation: fade-bottom 1s ease-in-out forwards;
		}

		.remind:hover {
			color: white;
			opacity: 1;
		}

		.remind {
			margin-top: 10px;
			width: 50px;
			height: 50px;
			color: black;
			border-radius: 50%;
			background-color: white;
			opacity: 0.85;
		}

		.notification-box {
			position: absolute;
			top: 70px;
			right: -3px;
			width: 400px;
			height: auto;
			max-height: 300px;
			overflow-y: auto;
			padding: 10px;
			opacity: 0.92;
			background: white;
			backdrop-filter: blur(10px);
			border: 2px solid black;
			border-radius: 5px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
			display: none;
			z-index: 999;
		}

		.notification-box p {
			color: black;
			font-size: 15px;
		}
	</style>
</head>

<body>
	<?php include "./sidebar.php" ?>
	<section class="home-section">
		<div class="heading">
			<h2>Dashboard</h2>
		</div>
		<div class="dashboard">
			<div class="row row1">
				<div class="col-md-3" style="margin: 0px 130px 0px 0px"> <!-- Added margin -->
					<div class="card" style="width: 270px">
						<div class="card-header">Books Issued</div>
						<div class="card-body">
							<p class="card-text">No of book issued: <?php echo get_issue_book_count(); ?></p>
							<a class="btn btn-success" href="viewissuedbook.php">View Issued Books</a>
						</div>
					</div>
				</div>
				<div class="col-md-3" style="margin: 0px"> <!-- Added margin -->
					<div class="card" style="width: 270px">
						<div class="card-header">Total Books</div>
						<div class="card-body">
							<p class="card-text">No of books available: <?php echo get_book_count(); ?></p>
							<a class="btn btn-danger" href="updatebooks.php">View All Books</a>
						</div>
					</div>
				</div>
			</div><br><br>
			<div class="row row2" style="margin-top: 0px">
				<div class="col-md-3" style="margin: 0px 130px 0px 0px"> <!-- Added margin -->
					<div class="card" style="width: 270px">
						<div class="card-header">Book Categories</div>
						<div class="card-body">
							<p class="card-text">Total Categories: <?php echo get_category_count(); ?></p>
							<a class="btn btn-warning" href="updatecat.php">View Categories</a>
						</div>
					</div>
				</div>
				<div class="col-md-3" style="margin: 0px"> <!-- Added margin -->
					<div class="card" style="width: 270px">
						<div class="card-header">
							<p class="card-text">Available Authors</p>
						</div>
						<div class="card-body">
							<p class="card-text">Total registered Authors: <?php echo get_author_count(); ?></p>
							<a class="btn btn-primary" href="updateauthors.php">View Authors</a>
						</div>
					</div>
				</div>
			</div><br><br>
			<div class="row row3" style="margin-top: 0px">
				<div class="col-md-3" style="margin: 0px 130px 0px 0px"> <!-- Added margin -->
					<div class="card" style="width: 270px">
						<div class="card-header">Registered Students</div>
						<div class="card-body">
							<p class="card-text">Total Students: <?php echo get_user_count(); ?></p>
							<a class="btn btn-success" href="viewusers.php">View Registered Users</a>
						</div>
					</div>
				</div>
				<div class="col-md-3" style="margin: 0px"> <!-- Added margin -->
					<div class="card" style="width: 270px">
						<div class="card-header">Fine on late returns</div>
						<div class="card-body">
							<p class="card-text">Total fine: <?php echo get_fine_count(); ?></p>
							<a class="btn btn-danger" href="viewfine.php">View fine</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="notify" name="reminder">
			<button class="remind btn btn-secondary" name="reminder"><i class="bx bxs-bell-ring"></i></button>
			<div class="notification-box" id="notificationBox" style="display: none;">
				<?php
				$currentDate = date('Y-m-d');
				$query = "SELECT ib.*, b.book_name FROM issued_books ib LEFT JOIN books b ON ib.book_id = b.book_id where STR_TO_DATE(ib.return_date, '%d-%m-%Y') = '$currentDate' ";
				$result = mysqli_query($connection, $query);

				if (mysqli_num_rows($result) > 0) {
					echo '<p class="remindheading" style="font-size:20px; font-weight:500;">' . mysqli_num_rows($result) . ' books to be returned today</p>';
					while ($row = mysqli_fetch_assoc($result)) {
						echo '<p style="font-weight:500;" class="notification-item">';
						echo 'Student ID: ' . $row['rollno'] . '<br>';
						echo 'Book name: ' . $row['book_name'] . '<br>';
						echo '</p>';
					}
				} else {
					echo '<h5>No books to be returned today!</h5>';
				}
				?>
			</div>
		</div>
		<div class="calendar">
			<div class="col-md-12">
				<div class="elegant-calencar d-md-flex">
					<div class="wrap-header d-flex align-items-center img" style="background-image: url(images/bg.jpg);">
						<p id="reset">Today</p>
						<div id="header" class="p-0">
							<div class="head-info">
								<div class="head-month"></div>
								<div class="head-day"></div>
							</div>
						</div>
					</div>
					<div class="calendar-wrap" style="opacity: 0.7;">
						<div class="w-100 button-wrap">
							<div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div>
							<div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div>
						</div>
						<table id="calendar">
							<thead>
								<tr>
									<th>Sun</th>
									<th>Mon</th>
									<th>Tue</th>
									<th>Wed</th>
									<th>Thu</th>
									<th>Fri</th>
									<th>Sat</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		$(document).ready(function() {
			// Toggle notification box when the remind button is clicked
			$('.remind').click(function() {
				$('.notification-box').toggle();
			});
		});
	</script>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>


</html>