<?php
	//SESSION VALIDATION
	if(!$_SESSION['user']){
		header('location: index.php?status=invalid');
	}
?>
