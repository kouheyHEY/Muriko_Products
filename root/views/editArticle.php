<!-- コンテンツタイトル -->
<div class="menu-category">
    <div class="content-title fadeDown">
        <span>Edit Article</span>
    </div>
</div>

<!-- メイン -->
<main>
    <div class="fadeDown_2">
        <?php if ($product['id'] === ''): ?>
            <!-- 注意メッセージ表示 -->
            <div class="msg_alert">
                <?= "* is requied item." ?>
            </div>

        <?php endif; ?>

        <!-- プロダクト説明 -->
        <div class="product-exp">
            <input type="text" placeholder="Title" />

        </div>

        <div class="button-back button-link-linear">
            <a class="button-under-line" href="/product/<?= strtolower($currentCategory) ?>">
                Back
            </a>
        </div>

    </div>

</main>