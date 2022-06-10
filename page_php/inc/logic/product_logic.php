<?php
    // プロダクトidの取得
    if(isset($_GET["product_id"])){
        $product_id = $_GET["product_id"];
    }

    // プロダクトファイルの読み込み
    $product_filepath = DIRPATH_PRODUCT_JSON . "/" . $_SESSION["CATEGORY"] . "/" . $_GET["product_id"] . ".json";
    $product_info_json = jsonToObj($product_filepath);
?>