<?php
//会话：session和cookie
//session:保存在服务器端，更安全
//cookie:保存在浏览器端，可以被禁用
session_start();//开始会话
//判断是否由表单提交
if (!isset($_POST['submit'])) {
	header("location:error.php?
	url=index.php&error=非法登录！");
	exit;
}
//判断用户名是否为空
if (empty($_POST['name'])) {
	header("location:error.php?
	url=index.php&error=用户名必须！");
	exit;
}
//判断密码是否为空
if (empty($_POST['pwd'])) {
	header("location:error.php?url=index.php&error=密码必须！");
	exit;
}
require 'config.php';//加载数据库配置文件
$con = mysql_connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PWD']) or die(mysql_error());//连接数据库
mysql_select_db($config['DB_NAME'], $con);//选择数据库
mysql_query("set names utf8", $con);//发送一个sql请求，将数据库编码设置为utf-8
$user_name = mysql_real_escape_string($_POST['name']);//转义sql特殊字符
//echo $user_name;
//die;
$sql = "select * from user where name='$user_name'";//从user表中查询name=$user_name的记录
$result = mysql_query($sql, $con);
//$user = mysql_fetch_array($result, MYSQL_ASSOC);
//echo $result;
//die;
if (!$result) {//如果用户名不存在
	header("location:error.php?url=index.php&error=用户名不存在或密码错误！");//转到错误页面
	mysql_close();
	exit;
}else {//如果用户名存在
	$user = mysql_fetch_array($result, MYSQL_ASSOC);
	//判断提交的密码是否与数据库的一致
	if ($user['pwd'] !== md5($_POST['pwd'])) {//如果不一致
		header("location:error.php?url=index.php&error=用户名不存在或密码错误！");//转到错误页面
		mysql_close();
		exit;
	}else {//登录成功
		$_SESSION['id'] = $user['user_id'];//向session中写入登录信息
		$_SESSION['name'] = $user['name'];
		header("location:success.php?url=list.php&success=登录成功！");//转到成功页面
		mysql_close();
	}
}
?>