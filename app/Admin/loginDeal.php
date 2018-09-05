<?php
require_once 'config.php';
$name = isset($_POST['name'])?$_POST['name']:'';
$password = isset($_POST['password'])?$_POST['password']:'';
if((trim($name) != ADMIN_NAME) || md5(md5(trim($password))) != ADMIN_PASSWORD){
    die(json_encode(array('s'=>10000,'message'=>'账号或密码错误')));
}
session_start();
$_SESSION['admin'] = $name;
die(json_encode(array('s'=>0,'url'=>'index.php')));
?>