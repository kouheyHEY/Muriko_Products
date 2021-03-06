<!-- 各phpファイル読み込み -->
<?php
    include_once('./functions/const.php');
    include_once('./functions/commonUtil.php');
    include_once('./functions/ioUtil.php');
    include_once('./functions/categoryUtil.php');
    include_once('./functions/initialize.php');
?>

<html lang="ja">

<head>
    <meta charset="utf-8">
    <title><?= $_SESSION["SYSTEM_TITLE"] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/common.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- cssファイルの読み込み -->
    <link rel="stylesheet" href="../css/productList.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/postProduct.css">

    <!-- jsファイルの読み込み -->
    <script type="text/javascript" src="../script/commonScript.js"></script>
</head>

<body>
    <!-- ヘッダー -->
    <header>
        <!-- タイトル -->
        <h1 class="header-title"><span id="system_title"><?= $_SESSION["SYSTEM_TITLE"] ?></span></h1>
        <h2 class="header-version">ver <span id="system_version"><?= $_SESSION["SYSTEM_VERSION"] ?></span></h2>
    </header>
