<?php
	$data=[];
	$act = $_GET['act'];
	if($act == "edit"){
		$id = $_GET['id'];
		$cloud = get_info("cloud", $id);
		$do = "修改云资讯";
	} else {
		$do = "加入一笔新的云资讯";
	}
	require_once("twig_head.php");
	$stack=array('self' => $_SERVER['PHP_SELF'], 'do' => $do, 'id' => $id, 'act' => $act);
	twig_do('edit-head.twig',$stack);

	$stack=array('label' => '云资讯', 'name' => 'cloud_info', 'value' => $cloud['cloud_info']);
	twig_do('edit-body.twig',$stack);

	twig_do('edit-floor.twig', array('self' => $_SERVER['PHP_SELF']));
	
	?>
	