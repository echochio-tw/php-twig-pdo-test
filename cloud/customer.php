<?php
	require_once("includes/header.php");
    if (isset($_POST['save'])){
		require_once("save.php");
		require_once("customer-show.php");
	} else {
		if (isset($_GET['act'])) {
			if (($_GET['act']) == 'delete'){
				require_once("save.php");
				require_once("customer-show.php");
			}else {
				require_once("edit-customer.php");
			}
		} else {
			require_once("customer-show.php");
		}
	}
?>
		