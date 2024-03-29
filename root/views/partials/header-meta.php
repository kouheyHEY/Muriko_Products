<head prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8">

    <!-- ビューポート設定 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jsの読み込み -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/common.js"></script>
    <script type="text/javascript" src="/js/commonScript.js"></script>

    <!-- OGPの設定 -->
    <meta property="og:url" content="<?= $_SERVER['REQUEST_URI'] ?>" />
    <meta property="og:title" content="Muriko Products | <?= $_SESSION['OG_TITLE'] ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="<?= $_SESSION['OG_DESCRIPTION'] ?>" />
    <meta property="og:site_name" content="Muriko Products" />
    <meta property="og:image" content="http://vbbeat.php.xdomain.jp/img/other/eyecatch1.png" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@Murimuriko_" />

    <!-- cssファイルの読み込み -->
    <!-- <link rel="stylesheet" href="../css/reset.css"> -->
    <link rel="stylesheet" href="/css/pageLink.css">
    <link rel="stylesheet" href="/css/productList.css">
    <link rel="stylesheet" href="/css/product.css">
    <link rel="stylesheet" href="/css/postProduct.css">
    <link rel="stylesheet" href="/css/articleList.css">
    <link rel="stylesheet" href="/css/common.css">
    <link rel="stylesheet" href="/css/information.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- タイトル設定 -->
    <title>
        <?= Config::getMasterData("SYSTEM_TITLE") ?>
    </title>

</head>