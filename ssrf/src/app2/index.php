<?php
class copy_file{
    public $path = 'upload/';
    public $file;
    public $url;
    function __destruct(){
        if(strpos($this -> url,'http://127.0.0.1') === 0){
            file_put_contents($this -> path.$this -> file, file_get_contents($this -> url));
            echo $this -> path.$this -> file." update successed!)<br>";
        }else{
            echo "Hello CTFer";
        }
    }
}

if(isset($_GET['data'])){
    $data = $_GET['data'];
    unserialize($data);
}else{
    echo "<h2>Welcome to SKCTF<h2>";
}
?>
