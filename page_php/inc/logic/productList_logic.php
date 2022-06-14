<?php
    // カテゴリの設定
    if(isset($_GET["CATEGORY"])){
        $_SESSION["CATEGORY"] = $_GET["CATEGORY"];
    }else if(!isset($_SESSION["CATEGORY"])){
        initCategory();
    }

    // プロダクト一覧のソート
    $product_list = sortObjAry($_SESSION["PRODUCT_LIST_JSON"][$_SESSION["CATEGORY"]], "updDate", true);
?>