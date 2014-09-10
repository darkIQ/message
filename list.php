<!DOCTYPE Html>
<html>
<head>
<meta charset="utf-8"/>
<title>留言板</title>
</head>
<body>
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
$user_id = $_SESSION['id'];
//$sql = "select * from message where user_id = '$user_id' and pid = 0";
//$all = mysql_query($sql, $con);
//$count = mysql_num_rows($all);
//$list_rows = 5;//每页条数
//require 'Page.class.php';
//$page = new Page($count, $list_rows);
$sql = "select * from message left join user on message.user_id = user.user_id where message.user_id = '$user_id'
		and message.pid = 0 order by message.created desc";
		//将用户表user与message表进行联合查询，其中是以user_id相等作为左连条件，
		//查询user_id=当前用户id并且pid=0的留言,并按时间倒序排序
$result = mysql_query($sql, $con);
$arr = array();
while ($message = mysql_fetch_array($result, MYSQL_ASSOC)){//将结果集以关联数组的形式返回，以字段名为键名，字段值为键值
	if (!empty($message)) {
	    $message['reply'] = _tree($message['message_id'], $con);//递归查询留言的子留言
		$arr[] = $message;
	}
}
//var_dump($arr);
foreach ($arr as $k => $v){
	echo '--------------------------------<br />';
	echo $v['name'].'留言：'.$v['content'].'【'.$v['created'].'】<a href="reply.php?id='.$v['message_id'].'">回复Ta</a><br />';
	if (!empty($v['reply'])) {
	    _displayTree($v['reply'],$v['name'], $con);//递归显示留言的子留言
	}
}
function _tree($pid, $con)
{
	$sql = "select * from message where 
		message.pid = '$pid' order by message.created desc";
	$result = mysql_query($sql, $con);
	$arr = array();
	while ($reply = mysql_fetch_array($result, MYSQL_ASSOC)){
		if (!empty($reply)){
			$reply['reply'] = _tree($reply['message_id'], $con);
			$arr[] = $reply;
		}
	}
	return $arr;
}

function _displayTree($arr,$name, $con)
{
    foreach ($arr as $k => $v) {
		$sql = "select * from user where user_id='$v[user_id]'";
		$result = mysql_query($sql, $con);
		$user = mysql_fetch_array($result, MYSQL_ASSOC);
		echo $user['name'].'回复'.$name.':'.$v['content'].'【'.$v['created'].'】<a href="reply.php?id='.$v['message_id'].'">回复Ta</a><br />';
		if (!empty($v['reply'])) {
		    _displayTree($v['reply'], $user['name'], $con);
		}
    }
} 
mysql_close();
?>
<p>----------------------------------</p>
<p>新增留言：</P>

<form action="add_message.php" method="post">
<textarea rows=5 cols=20 name="content"></textarea><br />
<input type="submit" name="submit" value="留言"><br />
</form>
</body>
</html>
