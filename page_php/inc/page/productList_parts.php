<!-- 各phpファイル読み込み -->
<?php
    include_once("./inc/logic/productList_logic.php");
?>

<!-- メイン -->
<main class="fadeDown">

    <!-- コンテンツタイトル -->
    <div class="content-title">
        <span>Category</span>
    </div>

    <!-- ナビゲーションバー -->
    <form action="./index.php" method="get">
        <ul class="product-navbar">
            <?php foreach ($_SESSION["CATEGORIES"] as $category) : ?>
                <li class="button-link"><button type="submit" name="CATEGORY" value="<?= $category ?>" id="<?= $category ?>"><?= $category ?></button></li>
            <?php endforeach ?>
        </ul>
    </form>

    <!-- コンテンツタイトル -->
    <div class="content-title">
        <span><?= $_SESSION["CATEGORY_DISP_NAME"][$_SESSION['CATEGORY']] ?> Products</span>
    </div>

    <!-- プロダクト一覧 -->
    <form action="./product.php" method="get">
        <ul class="product-list">
            <!-- プロダクトブロック -->
            <?php foreach($product_list as $product) : ?>
                <li class="product-block button-link"><button type="submit" name="product_id" value="<?= $product["id"] ?>"><?= $product["title"] ?></button></li>
            <?php endforeach ?>
        </ul>
    </form>
</main>
<!-- 選択中のカテゴリの要素を色付けする -->
<script>
    $("#<?= $_SESSION['CATEGORY'] ?>").css('background-color','#d0efd0');
</script>