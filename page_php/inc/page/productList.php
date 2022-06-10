<?php
    // カテゴリの設定
    if(isset($_GET["CATEGORY"])){
        $_SESSION["CATEGORY"] = $_GET["CATEGORY"];
    }else{
        initCategory();
    }
?>

<!-- メイン -->
<main>

    <!-- コンテンツタイトル -->
    <div class="content-title">
        <span>Product Category</span>
    </div>

    <!-- ナビゲーションバー -->
    <form action="./index.php" method="get">
        <ul class="product-navbar">
            <?php foreach (CATEGORIES as $category) : ?>
                <li class="button-link"><button type="submit" name="CATEGORY" value="<?= $category ?>"><?= $category ?></button></li>
            <?php endforeach ?>
        </ul>
    </form>

    <!-- コンテンツタイトル -->
    <div class="content-title">
        <span><?= CATEGORY_DISP_NAME[$_SESSION['CATEGORY']] ?> Products</span>
    </div>

    <!-- プロダクト一覧 -->
    <form action="./product.php" method="get">
        <ul class="product-list">
            <!-- プロダクトブロック -->
            <li class="product-block button-link"><button type="submit" name="game1" value="game1">ゲーム1</button></li>
            <li class="product-block button-link"><button type="submit" name="game2" value="game2">ゲーム2</button></li>
            <li class="product-block button-link"><button type="submit" name="game3" value="game3">ゲーム3</button></li>
            <li class="product-block button-link"><button type="submit" name="game4" value="game4">ゲーム4</button></li>
        </ul>
    </form>
</main>