<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="description" content="Login">
    <meta name="author" content="Webdesigntuts+">
    <link rel="stylesheet" type="text/css" href="css/style.css" />

</head>
 
<body>

<?php

function dbconnection()
{
        @$con = mysql_connect("localhost","root","c2FkZmFnZGZkc3Nm");
        // Check connection
        if (!$con)
        {
                echo "Failed to connect to MySQL: " . mysql_error();
        }
        @mysql_select_db("blindsql",$con) or die ( "Unable to connect to the database");
        mysql_query("SET character set 'UTF8'");
}

function blacklist($id)
{
if(preg_match("/ |\*|\+|;|,|=|is|union|like|where|for|and|file|`|".urldecode('%09')."|".urldecode("%0a")."|".urldecode("%0b")."|".urldecode('%0c')."|".urldecode('%0d')."|".urldecode('%a0')."/i", $id))
	return True;
else
	return False;
}


if(isset($_POST['username'])&&isset($_POST['password']))
{
		$hit = '';
        dbconnection();
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(blacklist($username)){
			$hit = "illegal character";
		}else{
			$sql="SELECT password FROM admin WHERE username='".$username."'";
			$result=mysql_query($sql);
			@$row = mysql_fetch_array($result);
			if(!$row){
				$hit = "username does not exist!";
			}else{
				if ($row['password']===md5($password)){
					$hit = 'Oh you get it SKCTF{b1iNd_SQL_iNJEcti0n!}';
				}else{
					$hit = "password error!";
				}
			}
		}
        mysql_close();
}
?>
	
    <form method="post" action="index.php" id="slick-login">
    	<h1 style="font-size:34px;text-align:center;color:#fff;">Login</h1><br><br>
    	
	<?php if(isset($hit))echo "<font color='#FFE7BA'><p align='center'>$hit</p></font>";?>
        <label for="username">username</label><input type="text" name="username" class="placeholder" placeholder="username">
        <label for="password">password</label><input type="password" name="password" class="placeholder" placeholder="password">
        <input type="submit" value="Log In">
    </form>
</body>
 
</html>