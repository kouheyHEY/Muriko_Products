<html lang="ja">

<!-- headタグ読み込み -->
<?php include_once("partials/header-meta.php"); ?>

<body>

    <!-- ヘッダー -->
    <header>
        <!-- タイトル -->
        <h1 class="header-title">
            <a href="./index.php"><span id="system_title">
                    <?= $_SESSION["SYSTEM_TITLE"] ?>
                </span></a>
        </h1>
        <!-- バージョン -->
        <h2 class="header-version">ver <span id="system_version">
                <?= $_SESSION["SYSTEM_VERSION"] ?>
            </span></h2>
    </header>