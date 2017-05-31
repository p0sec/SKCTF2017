<!-- upload.php -->
<?php
    if(!isset($_GET['file']))
    {
        header('Location: ./index.php?file=hello.php');
        exit();
    }
    @$file = $_GET["file"];
    if(isset($file))
    {
        if (preg_match('/php:\/\/|http|data|ftp|input|%00/i', $file) || strstr($file,"..") !== FALSE || strlen($file)>=70)
        {
            echo "<h1>NAIVE!!!</h1>";
        }
        else
        {
            include($file);
        }
    }
?>
