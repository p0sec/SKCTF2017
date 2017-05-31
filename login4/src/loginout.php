<?php
    session_start();
    session_destroy();
    setcookie('iv',"",time()-1);
    setcookie('cipher',"",time()-1);
    header("location: ./index.php");
