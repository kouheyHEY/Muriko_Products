<!-- home.php -->

<?php include_once 'partials/header.php'; ?>

<!-- メイン -->
<main>

    <div class="fadeDown_2">

        <!-- コンテンツタイトル -->
        <div class="content-title">
            <span>
                <?= $about_info_json["title"] ?>
            </span>
        </div>

        <!-- 当サイト説明 -->
        <div class="product-exp">
            <p>
                <?= $about_info_json["exp"] ?>
            </p>
        </div>

    </div>

</main>

<?php include_once 'partials/footer.php'; ?>