<!-- メイン -->
<main>

    <!-- コンテンツタイトル -->
    <div class="content-title">
        <span>Product Category</span>
    </div>

    <!-- ナビゲーションバー -->
    <ul class="product-navbar">
        <?php foreach (CATEGORIES as $category) : ?>
            <li class="button-link"><a href="<?= $category ?>"><?= $category ?></a></li>
        <?php endforeach ?>
    </ul>

    <!-- コンテンツタイトル -->
        <div class="content-title">
            <span>Game Products</span>
        </div>

    <!-- プロダクト一覧 -->
    <ul class="product-list">
        <!-- プロダクトブロック -->
        <li class="product-block button-link"><a href="../product.php">ゲーム1</a></li>
        <li class="product-block button-link"><a href="../product.php">ゲーム2</a></li>
        <li class="product-block button-link"><a href="../product.php">ゲーム3</a></li>
        <li class="product-block button-link"><a href="../product.php">ゲーム4</a></li>
    </ul>

</main>