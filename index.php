<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="./css/base.css" />
		<link rel="stylesheet" type="text/css" href="./css/fcskin2.css" />
		<script src="./js/dlyz.js" type="text/javascript"></script> 
<title>留言板</title>
</head>
<body>
<div id="container"><div id="header">
<h1>一个简单的留言板</h1></div>
<p>需要登录后才能留言</p>
<form action="login.php" method="post" onsubmit="return checkform()">
<p>用户名：<input type="text" name="name" id="username"></p>
<p>密&nbsp;&nbsp;码：<input type="password" name="pwd" id="password"></p>
<p><input type="submit" name="submit" value="登录">
<input type="button" value="注册" onclick="window.location='register.php'" /></p>
</form>
</div>
</body>
</html>
