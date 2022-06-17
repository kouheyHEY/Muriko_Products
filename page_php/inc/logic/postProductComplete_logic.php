<?php

    // プロダクト説明を整形
    // 改行を<br/>に変換する
    $_POST["productExp"] = str_replace("\r\n", "<br/>", $_POST["productExp"]);
?>