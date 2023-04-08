<!-- 各phpファイル読み込み -->
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/inc/logic/about_logic.php"); ?>

<!-- メイン -->
<main>

<div class="fadeDown_2">

    <!-- コンテンツタイトル -->
    <div class="content-title">
        <span><?= $about_info_json["title"] ?></span>
    </div>

    <!-- 当サイト説明 -->
    <div class="product-exp">
        <p><?= $about_info_json["exp"] ?></p>
    </div>
    
</div>

</main>
