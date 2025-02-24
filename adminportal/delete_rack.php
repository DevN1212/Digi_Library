<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$query = "delete from rack where rack_id = $_GET[rid]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Category Deleted successfully...");
	window.location.href = "updaterack.php";
</script>