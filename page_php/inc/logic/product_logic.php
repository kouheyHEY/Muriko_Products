<?php
    // [分岐] プロダクトidによって分岐
    if(isset($_GET["product_id"])){
        // プロダクトidが指定されている場合

        // プロダクトidの設定
        $product_id = $_GET["product_id"];

        // プロダクトファイルの読み込み
        $product_filepath = DIRPATH_PRODUCT_JSON . "/" . $_SESSION["CATEGORY"] . "/" . $_GET["product_id"] . ".json";
        $product_info_json = jsonToObj($product_filepath);
    }else{
        // プロダクトidが指定されていない場合

        // プロダクトidの設定
        $product_id = "";
    }
?>