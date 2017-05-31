<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>UPLOAD</title>
</head>
<form action="" enctype="multipart/form-data" method="post"
name="upload">file:<input type="file" name="file" /><br>
<input type="submit" value="upload" /></form>
请上传jpg gif png 格式的文件  文件大小不能超过100KiB<br>
<?php
//error_reporting(0);
if(!empty($_FILES["file"]))
{
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    @$temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
    if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
    || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
    || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
    && (@$_FILES["file"]["size"] < 102400) && in_array($extension, $allowedExts))
    {
        $filename = date('Ymdhis').rand(1000, 9999).'.'.$extension;
        if(move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $filename)){
		$url="upload/".$filename;
		$content = file_get_contents($url);
        $content = preg_replace('/<\?php|\?>/i', '_', $content);
        file_put_contents('upload/'.$filename, $content);
        echo "file upload successful!Save in:  " . "upload/" . $filename;

	}else{
        	echo "upload failed!";
	}
    }
    else
    {
        echo "upload failed! allow only jpg,png,gif,jpep";
    }
}
?>
