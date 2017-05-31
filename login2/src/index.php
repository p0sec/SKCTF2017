<?php
session_start();
if($_SESSION['login'] !== 1){
	header('Location: login.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <title>进程监控系统</title>
</head>
<body style="margin:0 auto; text-align:center">
<h1>进程监控系统</h1>
<form method="post" action="" >
  <p>输入需要检测的服务</p>
  <input name="c" type="text" placeholder="Apache">
  <button type="submit">执行</button>
</form>
<div>
<?php
if(isset($_POST['c'])){
	$cmd = $_POST['c'];
	exec('ps -aux | grep '.$cmd, $result);
	foreach($result as $k){
		if(strpos($k, $cmd)){
			echo $k.'<br>';
		}
	}
}
?>

</div>
</body>
</html>