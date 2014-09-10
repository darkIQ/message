<?php
session_start();//会话开始
if (!isset($_POST['submit'])) {
	header("location:error.php?url=insertindex.php&error=非法注册！");
	exit;
}
if (empty($_POST['name'])) {
	header("location:error.php?url=insertindex.php&error=用户名必须！");
	exit;
}
if (empty($_POST['pwd'])) {
	header("location:error.php?url=insertindex.php&error=密码必须！");
	exit;
}
if (empty($_POST['rpwd'])) {
	header("location:error.php?url=insertindex.php&error=未确认密码！");
	exit;
}
if ($_POST['pwd'] != $_POST['rpwd']){
	header("location:error.php?url=insertindex.php&error=密码不一致！");
	exit;
}
if (empty($_POST['yz'])) {
	header("location:error.php?url=insertindex.php&error=验证码为空！");
	exit;
}
if (!"<script>validate()</script>") {
	header("location:error.php?url=insertindex.php&error=验证码错误！");
	exit;
}
require 'config.php';
$con = mysql_connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PWD']) or die(mysql_errno());
mysql_select_db($config['DB_NAME'], $con);
mysql_query("set names utf8", $con);
$user_name = mysql_real_escape_string($_POST['name']);
//转义sql语句
//将数据库的编码格式设置成utf-8
$sql = "select * from user where name= '$user_name'";
$result = mysql_query($sql, $con);
$user = mysql_fetch_array($result, MYSQL_ASSOC);
if ($user['name'] === $_POST['name']) {
	
	header("location:error.php?url=insertindex.php&error=用户名已存在！");
	mysql_close();
	exit;
}
else{
	$pwd=md5($_POST['pwd']);
	$sql="insert into user (name,pwd) values ('{$_POST['name']}','{$pwd}')";
	mysql_query($sql);
	$sql = "select * from user where name= '$user_name'";
	$result = mysql_query($sql, $con);
	$user = mysql_fetch_array($result, MYSQL_ASSOC);
	$_SESSION['id'] = $user['user_id'];
	$_SESSION['name'] = $user['name'];
	header("location:success.php?url=list.php&success=注册成功！即将跳转至留言板页面... ...！");
	
	
	
}


?>

