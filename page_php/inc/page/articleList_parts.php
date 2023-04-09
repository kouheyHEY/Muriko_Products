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
        <!-- 「Zenn.dev」の場合 -->
        <?php if($_SESSION["SERVICE"] == "ZENN") : ?>

            <?php foreach($_SESSION['ARTICLE_LIST'] as $article) : ?>
                <li class="article-block button-link-linear">
                    <a class="button-under-line" href="<?= $_SESSION['SERVICE_URL'][$_SESSION['SERVICE']] . $article['path'] ?>">
                        <!-- タイトルを出力 -->
                        <span class="block-title"><?php echo($article["title"]); ?></span>

                        <span class="block-updtime">
                        <?php 
                            // 投稿日時と最終更新日を取得
                            $updTime = $article["body_updated_at"];
                            $postTime = $article["published_at"];
                            // 最終更新日を決定
                            $lastUpdTime = $updTime ?? $postTime;
                            $lastUpdTime = (new DateTime($lastUpdTime))->format('Y-m-d');
                            // 最終更新日を出力
                            echo($lastUpdTime);
                        ?>
                        </span>
                    </a>
                </li>
            <?php endforeach ?>
        <?php else: ?>
        <!-- 「Zenn.dev」以外の場合 -->
            <div class="msg_alert"><?= MSG_NO_ARTICLE ?></div>
        <?php endif; ?>
    </ul>

</main>