<?php
    if(isset($_GET['url'])){
        // URLを取得
        $url = $_GET['url'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        echo $response;
    }
    else{
        echo 'Error: URL is not specified.';
    }
?>