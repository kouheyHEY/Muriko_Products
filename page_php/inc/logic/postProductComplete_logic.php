<?php

    // プロダクト説明を整形
    // 改行を<br/>に変換する
    $_POST["productExp"] = str_replace("\r\n", "<br/>", $_POST["productExp"]);

    // プロダクトを登録
    // プロダクト一覧のjsonファイルの内容を読み込み
    $productListObj = jsonToObj(FILEPATH_PRODUCT_LIST);

    // プロダクトidとカテゴリを設定
    $productCategory = $_POST["category"];
    $productId = $productListObj[$productCategory];
    
    // プロダクト情報をプロダクト一覧に登録
    array_push(
        $productListObj[$_POST["category"]],
        array(
        "title" => $_POST["title"],
        "id" => count($productListObj[$_POST["category"]]),
        "updDate" => date("Y-m-d"),
        "updUser" => $_POST["creator"]
    )
    );
    objToJson($productListObj, FILEPATH_PRODUCT_LIST);

    // プロダクトのjsonオブジェクトを追加
    $productObj = array(
        "title" => $_POST["title"],
        "exp" => $_POST["productExp"],
        "links" => array(),
        "updDate" => date("Y-m-d"),
        "updUser" => $_POST["creator"]
    );

    if(isset($_POST["productPage"]) && $_POST["productPage"] != ""){
        $productObj["links"]["site"] = $_POST["productPage"];
    }

    if(isset($_POST["github"]) && $_POST["github"] != ""){
        $productObj["links"]["git"] = $_POST["github"];
    }

    objToJson(
        $productObj,
        DIRPATH_PRODUCT_JSON . "/" . $productCategory . "/" . $productId . ".json"
    );

    // 指定されたフォルダにサムネイル画像を移動
    if(isset($_POST["thumbnail"]) && $_POST["thumbnail"] != ""){
        move_uploaded_file(
            $_FILES["thumbnail"]["tmp_name"],
            DIRPATH_PRODUCT_THUMBNAIL . "/" . $productCategory . "/" . $productId . "/" . pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION)
        );
    }

    // 指定されたフォルダにプロダクトファイルを全て移動
    for($i = 0; $i < count($_FILES["productFile"]["name"]); $i++){
        move_uploaded_file(
            $_FILES["productFile"]["tmp_name"][$i],
            DIRPATH_PRODUCT_PAGE . "/" . $productCategory . "/" . $productId . "/" . $_FILES["productFile"]["name"][$i]
        );
    }

?>