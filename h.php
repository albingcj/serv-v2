	
	<?php
	$query = "SELECT * FROM faculty WHERE id='$s'";
    $query_run = mysqli_query($db, $query);
	if(mysqli_num_rows($query_run) > 0){
	$row = mysqli_fetch_assoc($query_run);
	$dept=$row['dept'];
	$de = $row['design'];
    $dep = "Department of " . $row['dept'];
	$role=$row['role'];
    echo "<script>console.log(".$role.")</script>";

	}
?>