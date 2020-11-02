<?php
	$data=[];
	$act = $_GET['act'];
	if($act == "edit"){
		$id = $_GET['id'];
		$customer = get_info("customer", $id);
		$cloud_old_id = get_info("cloudaccount",$customer["cloudaccount_id"])['cloud_id'];
        $cloud_old_info = get_info("cloud",$cloud_old_id)['cloud_info'];
		$cloudaccount_old_info ='( 原本为 : '.$cloud_old_info.' : '.get_info("cloudaccount",$customer["cloudaccount_id"])['cloud_account'].' )';
		$do = "修改云账号资讯";
	} else {
		$cloudaccount_old_info ='';
		$do = "加入一笔新的账号云资讯";
		$id ='';
	}
	require_once("twig_head.php");
	$cloudaccount = getAll("cloudaccount");
	
	$stack=array('self' => $_SERVER['PHP_SELF'], 'do' => $do, 'id' => $id, 'act' => $act);
	twig_do('edit-head.twig',$stack);

	$stack=array('label' => '客户', 'name' => 'customer_account', 'value' => $customer['customer_account']);
	twig_do('edit-body.twig',$stack);
	
	$info = array();
	if($cloudaccount) foreach ($cloudaccount as $cloudaccounts):
		$cloud = get_info("cloud",$cloudaccounts["cloud_id"])['cloud_info'];
		if ($customer['cloudaccount_id'] ==  $cloudaccounts["cloudaccount_id"]) 
			{ $cloud_old_select = 'selected'; }
	    else 
			{$cloud_old_select = '';}
		array_push($info,array('id_info' => $cloudaccounts["cloudaccount_id"],  'old_select' => $cloud_old_select,
	    'source' => $cloud." : ", 'data_info' => $cloudaccounts["cloud_account"]));
	endforeach;

	$stack=array('label' => '云账号(云)', 'old_info' => $cloudaccount_old_info, 'id_name' => 'cloudaccount_id', 'infos' => $info);
	twig_do('edit-list.twig',$stack);

	$stack=array('label' => '当月告警金额', 'name' => 'alarm_amount', 'value' => $customer['alarm_amount']);
	twig_do('edit-body.twig',$stack);
	twig_do('edit-floor.twig', array('self' => $_SERVER['PHP_SELF']));
?>

	