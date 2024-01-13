<!-- ヘッダー読み込み -->
<?php include_once("partials/header.php"); ?>

<!-- コンテンツメニュー -->
<!-- タイトル -->
<div>
    <!-- ナビゲーションバー -->
    <ul class="product-navbar fadeDown">
        <?php foreach (Config::getMasterData("CONTENTS") as $content): ?>
            <?php $selectContent = ($content == $currentContent) ? '-selected' : '' ?>
            <li class="button-link-linear<?= $selectContent ?>">
                <a href="/<?= Config::getMasterData("CONTENT_URL_NAME")[$content] ?>"><?= $content ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</div>

<!-- インフォメーション -->
<div class="information fadeDown">
    <div class="content-title">
        <span>Information</span>
    </div>

    <ul class="info-list">
        <li>2024-01-01 サイトのリニューアルを開始しました。</li>
    </ul>
</div>

<!-- メインコンテンツ読み込み -->
<?= $mainContent ?>

<!-- フッター読み込み -->
<?php include_once("partials/footer.php"); ?>