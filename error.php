<!DOCTYPE Html>
<html>
<head>
<meta charset="utf-8"/>
</head>
<body>
<?php 
$url = $_GET['url'];
$error = $_GET['error'];
echo '少年，'.$error;
?>
<script type="text/javascript">
function redirect()
{
	location.replace("<?php echo $url;?>");
}
setTimeout(redirect, 2000, '操作失误');
</script>
</body>
</html>