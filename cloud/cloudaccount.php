<?php
	require_once("includes/header.php");
    if (isset($_POST['save'])){
		require_once("save.php");
		require_once("cloudaccount-show.php");
	} else {
		if (isset($_GET['act'])) {
			if (($_GET['act']) == 'delete'){
				require_once("save.php");
				require_once("cloudaccount-show.php");
			}else {
				require_once("edit-cloudaccount.php");
			}
		} else {
			require_once("cloudaccount-show.php");
		}
	}
?>
		