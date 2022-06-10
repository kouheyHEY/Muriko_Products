<!-- ヘッダー読み込み -->
<?php include("./inc/page/header.php"); ?>

<!-- 各phpファイル読み込み -->
<?php include("./inc/logic/product_logic.php"); ?>

<!-- メイン -->
<main>

    <!-- コンテンツタイトル -->
    <div class="content-title">
        <span><?= $product_info_json["title"] ?></span>
    </div>

    <!-- プロダクト説明 -->
    <div class="product-exp">
        <p><?= $product_info_json["exp"] ?></p>
        <?php if(isset($product_info_json["links"]["git"])) : ?>
            <div class="button-link">
                <a href="<?= $product_info_json['links']['git'] ?>">GitHub</a>
            </div>
        <?php endif; ?>
    </div>
    <div class="button-back button-link">
        <a href="./index.php">Back</a>
    </div>

</main>

<!-- フッター読み込み -->
<?php include("./inc/page/footer.php"); ?>