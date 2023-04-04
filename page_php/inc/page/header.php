<html lang="ja">

<head>
    <meta charset="utf-8">
    <title><?= $_SESSION["SYSTEM_TITLE"] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/common.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../script/common.js"></script>
    
    <!-- OGPの設定 -->
    <head prefix="og: http://ogp.me/ns#">
    <meta property="og:url" content="http://vbbeat.php.xdomain.jp/index.php" />
    <meta property="og:title" content="Muriko Products" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Murikoが制作したプロダクトを紹介しています。" />
    <meta property="og:site_name" content="Muriko Products" />
    <meta property="og:image" content="http://vbbeat.php.xdomain.jp/img/other/eyecatch1.png" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@Murimuriko_" />

    <!-- cssファイルの読み込み -->
    <!-- <link rel="stylesheet" href="../css/reset.css"> -->
    <link rel="stylesheet" href="../css/productList.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/postProduct.css">
    <link rel="stylesheet" href="../css/articleList.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- jsファイルの読み込み -->
    <script type="text/javascript" src="../script/commonScript.js"></script>

</head>

<body>
    <!-- ヘッダー -->
    <header>
        <!-- タイトル -->
        <h1 class="header-title">
            <a href="./index.php"><span id="system_title"><?= $_SESSION["SYSTEM_TITLE"] ?></span></a>
        </h1>
        <h2 class="header-version">ver <span id="system_version"><?= $_SESSION["SYSTEM_VERSION"] ?></span></h2>
    </header>
