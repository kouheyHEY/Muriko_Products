<?php
    // カテゴリの設定
    if(isset($_GET["CATEGORY"])){
        $_SESSION["CATEGORY"] = $_GET["CATEGORY"];
    }else if(!isset($_SESSION["CATEGORY"])){
        initCategory();
    }

    // 該当のカテゴリのプロダクト一覧が取得済みでない場合
    if(!isset($_SESSION["PRODUCT_LIST"][$_SESSION["CATEGORY"]])){
        // プロダクト一覧をソートし、セッション変数に格納する
        $_SESSION["PRODUCT_LIST"][$_SESSION["CATEGORY"]] =
            sortObjAry($_SESSION["PRODUCT_LIST_JSON"][$_SESSION["CATEGORY"]], false);
    }
?>