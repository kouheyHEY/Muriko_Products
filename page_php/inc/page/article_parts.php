<!-- 各phpファイル読み込み -->
<?php include_once("./inc/logic/article_logic.php"); ?>

<!-- メイン -->
<main>

<div class="fadeDown_slow content-box">

    <?php if($article_id === "") : ?>

        <!-- 注意メッセージ表示 -->
        <div class="msg_alert"><?= MSG_NO_ARTICLE_ID ?></div>

    <?php else : ?>
        <!-- コンテンツタイトル -->
        <div class="content-title">
            <span><?= $article_info_json["title"] ?></span>
        </div>

        <!-- プロダクト説明 -->
        <div class="product-exp">
            <p><?= $article_info_json["exp"] ?></p>
        </div>

    <?php endif; ?>

    <div class="button-back button-link">
        <a href="./index.php">Back</a>
    </div>
    
</div>

</main>
