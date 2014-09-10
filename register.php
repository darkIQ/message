<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="./css/base.css" />
		<link rel="stylesheet" type="text/css" href="./css/fcskin.css" />
    <script src="./js/yz.js" type="text/javascript"></script>
    <script src="./js/zcyz.js" type="text/javascript"></script>

<title>留言板</title>
</head>
<body onload="createCode()">
<div id="container">
   <div id="header">
      <h1 class="head">注册页面</h1>
   </div>
   <div id="input">
      <form action="add_user.php" method="post" onsubmit="return checkform()">
          <p class="input1">用&nbsp;户&nbsp;名&nbsp;：<input type="text" name="name" id="username"></p>
          <p class="input2">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="pwd" id="password"></p>
          <p class="input3">确认密码：<input type="password" name="rpwd" id="rpassword"></p>
          <p class="input5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                          验&nbsp;证&nbsp;码&nbsp;：
                            <input  type="text"   id="yz" name="yz">  
                            <input type="text" onclick="createCode()" readonly="readonly" id="checkCode" class="unchanged" style="width: 80px"  />
                            <br /> 
                            </p>
          <p><input type="submit" name="submit" value="注册"></p>
          <a class="input4" href="index.php" >返回登陆界面</a>
      </form>
   </div>
</div>
</body>
</html>