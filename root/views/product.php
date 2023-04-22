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
    <div class="fadeDown_2">
        <?php if ($product['id'] === ''): ?>
            <!-- 注意メッセージ表示 -->
            <div class="msg_alert">
                <?= MSG_NO_PRODUCT_ID ?>
            </div>

        <?php else: ?>
            <!-- コンテンツタイトル -->
            <div class="content-title">
                <span>
                    <?= $product['title'] ?>
                </span>
            </div>

            <!-- プロダクト説明 -->
            <div class="product-exp">
                <p>
                    <?= $product['exp'] ?>
                </p>

                <!-- githubボタン表示 -->
                <?php if (isset($product['links']['git'])): ?>
                    <div class="button-link-linear button-github">
                        <a class="button-under-line" href="<?= $product['links']['git'] ?>">
                            GitHub
                        </a>
                    </div>
                <?php endif; ?>

                <!-- ページ遷移ボタン表示 -->
                <?php if (isset($product['links']['site'])): ?>
                    <div class="button-link-linear button-topage">
                        <a class="button-under-line" href="<?= $product['links']['site'] ?>">
                            ページを表示
                        </a>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>
        <div class="button-back button-link-linear">
            <a class="button-under-line" href="/product/<?= strtolower($currentCategory) ?>">
                Back
            </a>
        </div>

    </div>

</main>