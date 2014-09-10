<script type="text/javascript">
function checkform(){
  //验证用户名
  if($("username").value == ""){
    alert("用户名不可以为空");
    $("username").select();
    $("username").focus();
    return false;
  }else{
    if($("username").value.length < 6){
      alert("用户名必须大于6个字符");
      $("username").select();
      $("username").focus();
      return false;
    }
  }
  //验证密码
  if($("password").value == ""){
    alert("密码不可以为空");
    $("password").select();
    $("password").focus();
    return false;
  }else{
    if($("password").value.length < 10){
      alert("密码必须大于10个字符");
      $("password").select();
      $("password").focus();
      return false;
    }
  }
  //.....（下面的可以以此类推）
  return true;
}

function $(id){
  return document.getElementById(id);
} 
</script>