<!-- 各phpファイル読み込み -->
<?php
    include_once("./inc/logic/postProductComplete_logic.php");
?>

<!-- メイン -->
<main>

    <!-- プロダクト情報 -->

    <!-- コンテンツタイトル -->
    <div class="content-title">
        <span>Summary</span>
    </div>

    <!-- プロダクト内容 -->
    <div class="product-summary">

        <!-- 基本情報 -->
        <p>
            <label class="input-title">Product Category </label>
            <span><?= $_POST["category"] ?></span>
        </p>
        <p>
            <label class="input-title">Product Title</label>
            <span><?= $_POST["title"] ?></span>
        </p>
        <p>
            <label class="input-title">Creator Name</label>
            <span><?= $_POST["creator"] ?></span>
        </p>
        <p>
            <label class="input-title">link (GitHub)</label>
            <span><?= $_POST["github"] ?></span>
        </p>
        <p>
            <label class="input-title">link (ProductPage)</label>
            <span><?= $_POST["productPage"] ?></span>
        </p>
        <p>
            <label class="input-title">Product Explanation</label>
        </p>
        <p>
            <span><?= $_POST["productExp"] ?></span>
        </p>
    </div>

    <!-- 詳細情報 -->
    <div class="content-title">
        <span>Product Files</span>
    </div>

    <div class="product-details">

        <!-- サムネイル -->
        <p class="fileChoose">
            <label class="input-title">thumbnail</label>
        </p>
        <p>
            <span class="file-name" id="thumbnail">
                <?= $_FILES["thumbnail"]["name"] ?>(<?= setFileSize($_FILES["thumbnail"]["size"]) ?>)
            </span>
        </p>

        <!-- プロダクトファイル -->
        <p class="fileChoose">
            <label class="input-title">product files</label>
        </p>
        <p>
            <span class="file-name" id="productFile">
                <?php for($i = 0; $i < count($_FILES["productFile"]["name"]); $i++) : ?>
                    <?= $_FILES["productFile"]["name"][$i] ?>(<?= setFileSize($_FILES["productFile"]["size"][$i]) ?>)<br>
                <?php endfor; ?>
            </span>
        </p>

    </div>

    <div class="button-back button-link">
        <a href="./index.php">Back</a>
    </div>

</main>