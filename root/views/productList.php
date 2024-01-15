<!-- インフォメーション -->
<div class="information fadeDown">
    <div class="content-title">
        <span>Information</span>
    </div>

    <ul class="info-list">
        <li>2024-01-01 サイトのリニューアルを開始しました。</li>
    </ul>
</div>


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
        <ul class="product-list fadeDown_2">
            <!-- プロダクトブロック -->
            <?php foreach (sortObjAry($productList, false) as $product): ?>
                <li class="product-block button-link-linear">
                    <a class="button-under-line aline-left"
                        href="/product/<?= strtolower($currentCategory) . "/" . $product["id"] ?>">
                        <img class="block-thumbneil" src="/img/product/test.png" alt="サムネイルなし">
                        <span class="block-title">
                            <?= $product["title"] ?>
                        </span>
                        <!--                         
                        <span class="block-updtime">
                            <?= $product["updDate"] ?>
                        </span>
                         -->
                    </a>
                </li>
            <?php endforeach ?>
        </ul>

    <?php else: ?>
        <!-- カテゴリが「ACTIVITY」の場合 -->
        <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/views/partials/github-info.php"); ?>

    <?php endif; ?>

</main>