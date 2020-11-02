<?php
$stack=array('self' => $_SERVER['PHP_SELF'], 'main' => '加新雲平台', 'info' => '雲平台');
$tharray = array('雲');
array_push($stack,array('titleinfo' => $tharray));
$infos = array();
$allinfo =array();
$data = array();
$cloud = getAll("cloud");
if($cloud) foreach ($cloud as $clouds):
	$infos = array($clouds['cloud_info']);
    $allinfo['infos']= $infos;
	$allinfo['id'] = $clouds['cloud_id'];
	$allinfo['name'] = 'cloud';
	array_push($data,$allinfo);
endforeach;
array_push($stack,array('allinfo' => $data));
require_once("twig_head.php");
twig_do('shows.twig',$stack);