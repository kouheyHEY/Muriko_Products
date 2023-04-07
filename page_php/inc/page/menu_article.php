<!-- 記事メニュー -->

<!-- 各phpファイル読み込み -->
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/inc/logic/articleList_logic.php"); ?>

<!-- コンテンツタイトル -->
<div class="menu-category">
    <div class="content-title fadeDown">
        <span>Service</span>
    </div>

    <!-- ナビゲーションバー -->
    <form action="./articleList.php" method="get">
        <ul class="product-navbar fadeDown">
            <?php foreach ($_SESSION["SERVICES"] as $service) : ?>
                <?php $selectService = ($service == $_SESSION["SERVICE"]) ? '-selected' : '' ?>
                <li class="button-link-linear<?= $selectService ?>">
                    <button type="submit" name="SERVICE" value="<?= $service ?>" id="<?= $service ?>"><?= $_SESSION["SERVICE_ALIAS"][$service] ?></button>
                </li>
            <?php endforeach ?>
        </ul>
    </form>
</div>
