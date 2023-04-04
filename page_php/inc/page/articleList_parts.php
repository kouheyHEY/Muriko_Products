<!-- 各phpファイル読み込み -->
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/inc/logic/articleList_logic.php"); ?>

<!-- メイン -->
<main>

    <!-- コンテンツタイトル -->
    <div class="content-title fadeDown_2">
        <span><?= $_SESSION["SERVICE_ALIAS"][$_SESSION['SERVICE']] ?></span>
    </div>

    <!-- 記事一覧 -->
    <ul class="article-list fadeDown_2">
        <!-- 記事ブロック -->
        <?php foreach($article_list as $article) : ?>
            <li class="article-block button-link-linear">
                <a href="<?= $_SESSION['SERVICE_URL'][$_SESSION['SERVICE']] . $article['path'] ?>"><?= $article["title"] ?></a>
            </li>
        <?php endforeach ?>
    </ul>

</main>