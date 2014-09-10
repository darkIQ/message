<!DOCTYPE Html>
<html>
<head>
<meta charset="utf-8"/>
</head>
<body>
<?php 
$url = $_GET['url'];
$succes = $_GET['success'];
echo '少年，恭喜你，'.$succes;
?>
<script>
function redirect()
{
	location.replace("<?php echo $url;?>");
}
setTimeout(redirect, 2000, '操作成功：<?php echo $succes;?>');
</script>
</body>
</html>