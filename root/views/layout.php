<!-- ヘッダー読み込み -->
<?php include_once("partials/header.php"); ?>

<!-- コンテンツメニュー -->
<!-- タイトル -->
<div class="menu-content">

    <!-- ナビゲーションバー -->
    <form action="./index.php" method="get">
        <ul class="product-navbar fadeDown">
            <?php foreach (Config::getMasterData("CONTENTS") as $content): ?>
                <?php $selectContent = ($content == "ABOUT") ? '-selected' : '' ?>
                <li class="button-link-linear<?= $selectContent ?>">
                    <button type="submit" name="CONTENT" value="<?= $content ?>" id="<?= $content ?>"><?= $content ?></button>
                </li>
            <?php endforeach ?>
        </ul>
    </form>
</div>

<!-- メインコンテンツ読み込み -->
<?= $mainContent ?>

<!-- フッター読み込み -->
<?php include_once("partials/footer.php"); ?>