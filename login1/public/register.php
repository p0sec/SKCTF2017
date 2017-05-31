
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>SKCTF管理系统</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="stylesheet" href="css/style.css"/>
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }
  </style>
</head>
<body>
<div class="header">
  <div class="am-g">
    <h1>SKCTF管理系统</h1>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <h2>注册</h2>
    <p style='text-align:center;color:#1C86EE;font-size:20px;'>
<?php
	header('content-type:text/html;charset=utf-8');

	if(isset($_POST['sub'])){
		if(isset($_POST['username']) && isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			if(!(strlen($password)>=6 && preg_match('/[0-9]/', $password) && preg_match('/[a-z]/', $password) && preg_match('/[A-Z]/', $password))){
				echo '密码必须大于6位，包含大写字母，小写字母和数字';
			}else{
				if($username === 'admin'){
					echo 'admin已存在';
				} else {
					$pdo = new PDO('mysql:dbname=test;host=127.0.0.1', 'root', 'cTf_p@ssw0rD', array(PDO::ATTR_PERSISTENT=>true));
					$pdo->exec("SET names utf8");
					$sql = "INSERT INTO user VALUES(?,?,?)";
					$stmt = $pdo->prepare($sql);
					$stmt->execute(array(NULL, $username, md5($password)));

					if($stmt->rowCount()){
						echo '注册成功';
						exit('<meta http-equiv="refresh" content="3;url=index.php"/>');
					} else {
						echo '注册失败';
					}
				}
			}
		}else{
			echo '用户名或密码不能为空';
		}
	}
?>
	</p>
    <form method="post" class="am-form">
      <label for="uname">用户名:</label>
      <input type="text" name="username" id="email" value="">
      <br>
      <label for="password">密码:</label>
      <input type="password" name="password" id="password" value="" placeholder="大于6位，包含大写字母，小写字母和数字" >

      <br />
      <div class="am-cf">
        <input type="submit" name="sub" value="注 册" class="am-btn am-btn-primary am-btn-sm am-fl">
        <li class="am-btn am-btn-default am-btn-sm am-fr"><a href="index.php">已有账号 ^_^?</a></li>

      </div>
    </form>
    <hr>
    <p>© SKCTF管理系统.</p>
  </div>
</div>
</body>
</html>


