<!-- カテゴリメニュー -->

<!-- 各phpファイル読み込み -->
<?php include_once("./inc/logic/productList_logic.php"); ?>

<!-- コンテンツタイトル -->
<div class="menu-category">
    <div class="content-title fadeDown">
        <span>Category</span>
    </div>

    <!-- ナビゲーションバー -->
    <form action="./productList.php" method="get">
        <ul class="product-navbar fadeDown">
            <?php foreach ($_SESSION["CATEGORIES"] as $category) : ?>
                <?php $selectCategory = ($category == $_SESSION["CATEGORY"]) ? '-selected' : '' ?>
                <li class="button-link-linear<?= $selectCategory ?>">
                    <button type="submit" name="CATEGORY" value="<?= $category ?>" id="<?= $category ?>"><?= $category ?></button>
                </li>
            <?php endforeach ?>
        </ul>
    </form>
</div>
