<html>
<?php $site='172.16.12.20:49169' ?>
<head>
	<link rel="icon" href="http://<?php echo $site ?>/logo.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="http://<?php echo $site ?>/about/main.css" type="text/css" />
	<meta charset="utf-8">
	<title>外网站点移动端预览</title>
</head>
<body class="mysite">
<center><br><div id="titlea">外网站点移动端预览</div><center>
<ul id="sdust">
<li><a href="http://<?php echo $site ?>/index.php">INDEX</a></li>
<li><a href="http://<?php echo $site ?>/index.php?url=https://www.baidu.com/link?url=9hN8_k2-wbBzP6tniJNqdrKkXOb2CN6mHGvlI6XbwRl3mPZzBjGTD1Lag57SUNCL&wd=&eqid=b15d08100004d2b7000000025919b417">FreeBuf</a></li>
<li><a href="http://<?php echo $site ?>/index.php?url=https://www.baidu.com/link?url=Ikt27jznb7N8TvV7hBQSGEkwQCDmq5yEMQql2S8tGQy&wd=&eqid=c96db17a000454e9000000025919b43c">安全客</a></li>
</ul>
<br><br><br>
	<center><form method="GET" name="search" action="http://<?php echo $site ?>/index.php">

	<table border="0" align="center" cellpadding="0" cellspacing="0" class="tab_search">
  <tr>
		<td>
			<input type="text" name="url" class="searchinput" size="50" placeholder="https://www.baidu.com" />
		</td>
		<td>
			<input type="submit" class="searchsubmit" value=''/>
		</td>
	</tr>
</table>
<br><br><br>


<?php
	error_reporting(0);
	function check_302($url){
		$ch = curl_init($url);
		curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,  CURLOPT_FOLLOWLOCATION, 1); // 302 redirect
		curl_exec($ch);
		$info =  curl_getinfo($ch);
		curl_close($ch);
		return $info['url'];
	}

	if(isset($_GET['url'])){
		$url = $_GET['url'];
		if(strpos($url,'http://127.0.0.1/') === 0 || strpos($url,'http://localhost/') === 0)
			exit("<script>alert('SKCTF WAF!')</script>");
		if(!preg_match('/^(http|https):\/\/[_a-zA-Z0-9-]+(.[_a-zA-Z0-9-]+)*/i',$url))
			exit("<script>alert('SKCTF WAF!')</script>");

		$url = check_302($url);
		echo $url;
		$ch = curl_init($url);
		curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$result = curl_exec($ch);
		curl_close($ch);

		echo "<div class='yulan'><head> <base href='".$url."/'>  </head><!--  以下是正文     --><br>".$result."</div>";
	}else{
		echo "<div class='yulan'><h2>Hello</h2></div>";
	}

?>
</body>
</html>
