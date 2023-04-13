<html lang="ja">

<!-- headタグ読み込み -->
<?php include_once("header-meta.php"); ?>

<body>

    <!-- ヘッダー -->
    <header>
        <!-- タイトル -->
        <h1 class="header-title">
            <a href="/about"><span id="system_title">
                    <?= Config::getMasterData("SYSTEM_TITLE") ?>
                </span></a>
        </h1>
        <!-- バージョン -->
        <h2 class="header-version">ver <span id="system_version">
                <?= Config::getMasterData("SYSTEM_VERSION") ?>
            </span></h2>
    </header>