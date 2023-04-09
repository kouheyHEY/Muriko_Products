<?php
    // 記事サービスの設定
    if(isset($_GET["SERVICE"])){
        $_SESSION["SERVICE"] = $_GET["SERVICE"];
    }else if(!isset($_SESSION["SERVICE"])){
        initService();
    }
?>