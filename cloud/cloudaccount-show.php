<?php
$stack=array('self' => $_SERVER['PHP_SELF'], 'main' => '加新雲端帳號', 'info' => '雲端帳號');
$tharray = array('雲帳號','雲');
array_push($stack,array('titleinfo' => $tharray));
$infos = array();
$allinfo =array();
$data = array();
$cloudaccount = getAll("cloudaccount");
if($cloudaccount) foreach ($cloudaccount as $cloudaccounts):
	$infos = array($cloudaccounts['cloud_account'], get_info("cloud",$cloudaccounts['cloud_id'])['cloud_info']);
    $allinfo['infos']= $infos;
	$allinfo['id'] = $cloudaccounts['cloudaccount_id'];
	$allinfo['name'] = 'cloudaccount';
	array_push($data,$allinfo);
endforeach;
array_push($stack,array('allinfo' => $data));
require_once("twig_head.php");
twig_do('shows.twig',$stack);