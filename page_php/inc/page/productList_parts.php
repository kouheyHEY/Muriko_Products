<!-- 各phpファイル読み込み -->
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/inc/logic/product_logic.php"); ?>

<!-- メイン -->
<main>
    <?php if ($_SESSION["CATEGORY"] != "ACTIVITY") : ?>
        <!-- カテゴリが「ACTIVITY」以外の場合 -->

        <!-- コンテンツタイトル -->
        <div class="content-title fadeDown_2">
            <span><?= $_SESSION["CATEGORY_DISP_NAME"][$_SESSION['CATEGORY']] ?> Products</span>
        </div>

        <!-- プロダクト一覧 -->
        <form action="./product.php" method="get">
            <ul class="product-list fadeDown_2">
                <!-- プロダクトブロック -->
                <?php foreach($_SESSION["PRODUCT_LIST"][$_SESSION["CATEGORY"]] as $product) : ?>
                    <li class="product-block button-link-linear">
                        <button class="button-under-line" type="submit" name="product_id" value="<?= $product["id"] ?>">
                            <span class="block-title"><?= $product["title"] ?></span>
                            <span class="block-updtime"><?= $product["updDate"] ?></span>
                        </button>
                    </li>
                <?php endforeach ?>
            </ul>
        </form>
    
    <?php else : ?>
        <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/inc/page/github_info.php"); ?>

    <?php endif; ?>

</main>