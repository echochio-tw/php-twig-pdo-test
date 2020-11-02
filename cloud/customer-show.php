<?php
$stack=array('self' => $_SERVER['PHP_SELF'], 'main' => '加新客戶资讯', 'info' => '客戶资讯');
$tharray = array('客戶','雲帳號','雲','月初至今已使用費用','當月告警金額');
array_push($stack,array('titleinfo' => $tharray));
$infos = array();
$allinfo =array();
$data = array();
$customer = getAll("customer");
if($customer) foreach ($customer as $customers):
	$cloudaccount =  get_info("cloudaccount",$customers['cloudaccount_id']);
	$infos = array($customers['customer_account'], $cloudaccount['cloud_account'],
	get_info("cloud",$cloudaccount['cloud_id'])['cloud_info'],
	get_info('amountinfo',$customers['amountinfo_id'])['amount'],
	$customers['alarm_amount']);
    $allinfo['infos']= $infos;
	$allinfo['id'] = $customers['customer_id'];
	$allinfo['name'] = 'customer';
	array_push($data,$allinfo);
endforeach;
array_push($stack,array('allinfo' => $data));
require_once("twig_head.php");
twig_do('shows.twig',$stack);