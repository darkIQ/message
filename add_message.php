<?php
session_start();//回话控制
if (!$_SESSION['id']) {//如果没有登录，转到登录界面
	header("location:error.php?url=index.php&error=you shall not pass！");
	exit;
}
require 'config.php';//加载配置文件
$con = mysql_connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PWD']) or die(mysql_error());//连接mysql数据库
mysql_select_db($config['DB_NAME'], $con);//选择数据库
mysql_query("set names utf8", $con);//设置编码为utf8
$user_id = $_SESSION['id'];//从session中获取用户ID
$pid = $_POST['pid']? $_POST['pid']:0;
$content = htmlspecialchars($_POST['content']);//特殊字符转换为html实体字符
$created = date('Y-m-d H:i:s');//得到当前时间
$sql = "insert into message(user_id, content, created, pid) values ('$user_id', '$content', '$created', '$pid')";
if (!mysql_query($sql, $con)) {
    header("location:error.php?url=list.php&error=留言不成功");//重定向到错误页面
	mysql_close();
	exit;
}else {
	header("location:success.php?url=list.php&success=留言成功");//重定向到成功页面
	mysql_close();
	exit;
}
?>