<!-- コンテンツタイトル -->
<div class="menu-category">
    <div class="content-title fadeDown">
        <span>Category</span>
    </div>

    <!-- ナビゲーションバー -->
    <ul class="product-navbar fadeDown">
        <?php foreach (Config::getMasterData('CATEGORIES') as $category): ?>
            <?php $selectCategory = ($category == strtoupper($currentCategory)) ? '-selected' : '' ?>
            <li class="button-link-linear<?= $selectCategory ?>">
                <a href="/product/<?= strtolower($category) ?>"><?= $category ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</div>

<!-- メイン -->
<main>
    <?php if ($currentCategory != "activity"): ?>
        <!-- カテゴリが「ACTIVITY」以外の場合 -->

        <!-- コンテンツタイトル -->
        <div class="content-title fadeDown_2">
            <span>
                <?= ucfirst($currentCategory) ?> Products
            </span>
        </div>

        <!-- プロダクト一覧 -->
        <form action="./product.php" method="get">
            <ul class="product-list fadeDown_2">
                <!-- プロダクトブロック -->
                <?php foreach (sortObjAry($productList, false) as $product): ?>
                    <li class="product-block button-link-linear">
                        <button class="button-under-line" type="submit" name="product_id" value="<?= $product["id"] ?>">
                            <span class="block-title">
                                <?= $product["title"] ?>
                            </span>
                            <span class="block-updtime">
                                <?= $product["updDate"] ?>
                            </span>
                        </button>
                    </li>
                <?php endforeach ?>
            </ul>
        </form>

    <?php else: ?>
        <!-- カテゴリが「ACTIVITY」の場合 -->
        <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/views/partials/github-info.php"); ?>

    <?php endif; ?>

</main>