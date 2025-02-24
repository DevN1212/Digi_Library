<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$query = "delete from publishers where pub_id = $_GET[pid]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Category Deleted successfully...");
	window.location.href = "updatepub.php";
</script>