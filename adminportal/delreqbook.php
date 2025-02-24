<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$query = "delete from requestbooks where requestid = $_GET[requestid]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Requested book Deleted successfully...");
	window.location.href = "reqbooks.php";
</script>