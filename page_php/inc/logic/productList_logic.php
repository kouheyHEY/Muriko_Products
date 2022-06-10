<?php
    // カテゴリの設定
    if(isset($_GET["CATEGORY"])){
        $_SESSION["CATEGORY"] = $_GET["CATEGORY"];
    }else{
        initCategory();
    }

    // プロダクト一覧の読み込み
    $product_list_json = jsonToObj(FILEPATH_PRODUCT_LIST);
    $product_list = $product_list_json[$_SESSION["CATEGORY"]];
?>