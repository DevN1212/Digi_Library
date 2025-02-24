<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$query = "delete from users where rollno = $_GET[rid]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Student Deleted successfully...");
	window.location.href = "viewusers.php";
</script>