<!DOCTYPE HTML>
<html>
<head>
<title>回复留言</title>
<meta charset="utf-8"/>
</head>
<body>
<div align="center">
<?php 
session_start();//回话控制
if (!$_SESSION['id']) {//如果没有登录，转到登录界面
	header("location:error.php?url=index.php&error=you shall not pass！");
	exit;
}
?>
<p>回复留言：</p>
<form action="add_message.php" method="post">
<textarea rows=7 cols=50 name="content"></textarea><br />
<input type="hidden" name="pid" value="<?php echo $_GET['id'];?>">
<input type="submit" name="submit" value="回复"><br />
</form>
</div>
</body>
</html>