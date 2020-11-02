<?php
$data=[];

$act = $_GET['act'];
if($act == "edit"){
	$id = $_GET['id'];
	$cloudaccount = get_info("cloudaccount", $id);
	$cloud_old_info = '( 原本为 : '.get_info("cloud",$cloudaccount["cloud_id"])['cloud_info'].' )';
	$do = "修改云账号资讯";
} else {
	$cloud_old_info = '';
	$do = "加入一笔新的账号云资讯";
}
$cloud = getAll("cloud");
require_once("twig_head.php");

$stack=array('self' => $_SERVER['PHP_SELF'], 'do' => $do, 'id' => $id, 'act' => $act);
twig_do('edit-head.twig',$stack);

$stack=array('label' => '云账号', 'name' => 'cloud_account', 'value' => $cloudaccount['cloud_account']);
twig_do('edit-body.twig',$stack);

$info = array();
if($cloud) foreach ($cloud as $clouds):
	if ($cloudaccount['cloud_id'] ==  $clouds["cloud_id"]) 
		{ $cloud_old_select = 'selected'; }
	else 
		{$cloud_old_select = '';}
	array_push($info,array('id_info' => $clouds["cloud_id"],  'old_select' => $cloud_old_select,
	'source' => '', 'data_info' => $clouds["cloud_info"]));
endforeach;

$stack=array('label' => '云', 'old_info' => $cloud_old_info, 'id_name' => 'cloud_id', 'infos' => $info);
twig_do('edit-list.twig',$stack);

twig_do('edit-floor.twig', array('self' => $_SERVER['PHP_SELF']));

?>

			