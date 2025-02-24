<?php
	function get_fine_count($rollno){
		$connection = mysqli_connect("localhost","root","","lms");
		$fine_count = 0;
		$query = "select count(*) as fine_count from users where fine>0 and rollno='$rollno'";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$fine_count = $row['fine_count'];
		}
		return($fine_count);
	}

	function get_requested_count($rollno){
		$connection = mysqli_connect("localhost","root","","lms");
		$book_count = 0;
		$query = "select count(*) as book_count from requestbooks where rollno='$rollno'";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$book_count = $row['book_count'];
		}
		return($book_count);
	}

	function get_issue_book_count($rollno){
		$connection = mysqli_connect("localhost","root","","lms");
		$issue_book_count = 0;
		$query = "select count(*) as issue_book_count from issued_books where rollno='$rollno'";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$issue_book_count = $row['issue_book_count'];
		}
		return($issue_book_count);
	}
?>