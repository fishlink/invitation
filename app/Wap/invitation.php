<?php
header ( "Content-type:text/html;charset=utf-8" );
include_once '../../mysql/Mysql.php';
$data = $_POST;
$realname = isset($data['realname'])?$data['realname']:'';
$mobile = isset($data['mobile'])?$data['mobile']:'';

if(!preg_match("/^([\x{4e00}-\x{9fa5}]{1,})$/u", $realname))die(json_encode(['s'=>10000,'message'=>'请输入您的中文姓名']));
if(!preg_match("/^1[345789]{1}\d{9}$/", $mobile))die(json_encode(['s'=>10000,'message'=>'请输入您的正确手机号']));
$sql = "select `id` from `user` where `mobile` = '{$mobile}'";
$res = (new Mysql())->select($sql);
if($res)die(json_encode(['s'=>10000,'message'=>'改手机号已经报名成功']));

$now = date('Y-m-d H:i:s');
$sql = "insert into `user` (`realname`,`mobile`,`update_time`,`add_time`) value ('{$realname}','{$mobile}','{$now}','{$now}')";
$res = (new Mysql())->add($sql);

if($res < 1)die(json_encode(['s'=>10000,'message'=>'对不起，报名失败']));
die(json_encode(['s'=>0,'message'=>'报名成功']));
