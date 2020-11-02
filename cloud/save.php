<?php
$cat = $_POST['cat'];
$cat_get = $_GET['cat'];
$act = $_POST['act'];
$act_get = $_GET['act'];
$id = $_POST['id'];
$id_get = $_GET['id'];
if($cat == "cloud" || $cat_get == "cloud"){
	$cloud_id = htmlentities($_POST["id"]);
	$cloud_info = htmlentities($_POST["cloud_info"]);
	global $mypdo;
	if($act == "add"){
		$stmt = $mypdo->prepare('INSERT INTO cloud (`cloud_info`) VALUES (:cloud_info)');
		$stmt->execute(array(':cloud_info' => $cloud_info));
	} elseif ($act == "edit"){
		$stmt = $mypdo->prepare('UPDATE `cloud` SET `cloud_info`=:cloud_info WHERE `cloud_id`=:cloud_id');
		$stmt->execute(array(':cloud_info' => $cloud_info, ':cloud_id' => $cloud_id));
	} elseif ($act_get == "delete"){
		// error_log("delete get ".$_GET["id"]);
		$cloud_id = htmlentities($_GET["id"]);
		$stmt = $mypdo->prepare('DELETE FROM `cloud` WHERE `cloud_id`=:cloud_id');
		$stmt->execute(array(':cloud_id' => $cloud_id));
	}
}

if($cat == "cloudaccount" || $cat_get == "cloudaccount"){
    $cloudaccount_id = htmlentities($_POST["id"]);
	$cloud_account = htmlentities($_POST["cloud_account"]);
	$cloud_id = htmlentities($_POST["cloud_id"]);
	//error_log("cloudaccount_id ".$cloudaccount_id);
	//error_log("cloud_account ".$cloud_account);
	//error_log("cloud_id ".$cloud_id);
	global $mypdo;
	if($act == "add"){
		$stmt = $mypdo->prepare('INSERT INTO cloudaccount (`cloud_account`, `cloud_id`) VALUES (:cloud_account, :cloud_id)');
		// INSERT INTO cloudaccount (`cloud_account`, `cloud_id`) VALUES ("test@gmail.com", 2)
		$stmt->execute(array(':cloud_account' => $cloud_account, ':cloud_id' => $cloud_id));
	} elseif ($act == "edit"){
		$stmt = $mypdo->prepare('UPDATE `cloudaccount` SET `cloud_account`=:cloud_account, `cloud_id`=:cloud_id WHERE `cloudaccount_id`=:cloudaccount_id');
		// UPDATE `cloudaccount` SET `cloud_account`="resr@gmail.com", `cloud_id`= 8 WHERE `cloudaccount_id`=10
		$stmt->execute(array(':cloud_account' => $cloud_account, ':cloud_id' => $cloud_id, ':cloudaccount_id' => $cloudaccount_id));
	} elseif ($act_get == "delete"){
		error_log("delete get ".$_GET["id"]);
		$cloudaccount_id = htmlentities($_GET["id"]);
		$stmt = $mypdo->prepare('DELETE FROM `cloudaccount` WHERE `cloudaccount_id`=:cloudaccount_id');
		$stmt->execute(array(':cloudaccount_id' => $cloudaccount_id));
	}
}

if($cat == "customer" || $cat_get == "customer"){
	$customer_id = htmlentities($_POST["id"]);
	$customer_account = htmlentities($_POST["customer_account"]);
	$cloudaccount_id = htmlentities($_POST["cloudaccount_id"]);
	$alarm_amount = htmlentities($_POST["alarm_amount"]);
	global $mypdo;
	if($act == "add"){
		$stmt = $mypdo->prepare('INSERT INTO customer (`customer_account`, `cloudaccount_id`, `amountinfo_id`, `alarm_amount`) VALUES (:customer_account, :cloudaccount_id, :amountinfo_id, :alarm_amount)');
		$stmt->execute(array(':customer_account' => $customer_account, ':cloudaccount_id' => $cloudaccount_id, ':amountinfo_id' => isset($val) ? $val : null, ':alarm_amount' => $alarm_amount));
	} elseif ($act == "edit"){
		error_log("customer_id ".$customer_id);
		error_log("customer_account ".$customer_account);
		error_log("cloudaccount_id ".$cloudaccount_id);
		error_log("alarm_amount ".$alarm_amount);
		$stmt = $mypdo->prepare('UPDATE `customer` SET `customer_account`=:customer_account, `cloudaccount_id`=:cloudaccount_id, `alarm_amount`=:alarm_amount WHERE `customer_id`=:customer_id');
		$stmt->execute(array(':customer_account' => $customer_account, ':cloudaccount_id' => $cloudaccount_id, ':alarm_amount' => $alarm_amount, ':customer_id' => $customer_id));
	} elseif ($act_get == "delete"){
		error_log("delete get ".$_GET["id"]);
		$customer_id = htmlentities($_GET["id"]);
		$stmt = $mypdo->prepare('DELETE FROM `customer` WHERE `customer_id`=:customer_id');
		$stmt->execute(array(':customer_id' => $customer_id));
	}
}