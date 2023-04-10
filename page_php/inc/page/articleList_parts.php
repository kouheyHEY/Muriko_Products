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

            <?php foreach($articleList as $article) : ?>
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
            <?php endforeach; ?>

        <?php else: ?>

        <!-- 「Zenn.dev」以外の場合 -->
            <div class="msg_alert"><?= MSG_NO_ARTICLE ?></div>
        <?php endif; ?>
    </ul>

    <div id="page-link" class="fadeDown_3">
        <!-- 前のページのリンク -->
        <form action="" method="get" class="to-next-prev">
            <!-- 前のページが存在するかどうか -->
            <?php $exPrev = ($currentPage > 1) ?>

            <input type="hidden" name="page" value="<?= $currentPage - 1 ?>">
            <div class="button-link-linear">
                <button <?= !$exPrev ? "class='invisible' disabled" : "type='submit'" ?>>
                    PREV
                </button>
            </div>
        </form>

        <?php for($i = 1; $i <= ceil($totalCount / $_SESSION["CONTENT_PER_PAGE"]); $i++) : ?>
            <?php if($i == $currentPage) : ?>
                <!-- 現在のページの番号 -->
                <div class="button-link-linear-selected"><button disabled><?= $i ?></button></div>

            <?php else: ?>
                <!-- ページのリンク -->
                <form action="" method="get">
                    <input type="hidden" name="page" value="<?= $i ?>">
                    <div class="button-link-linear">
                        <button type="submit"><?= $i ?></button>
                    </div>
                </form>

            <?php endif; ?>

        <?php endfor; ?>

        <!-- 次のページのリンク -->
        <form action="" method="get" class="to-next-prev">
            <!-- 次のページが存在するかどうか -->
            <?php $exNext = $currentPage < ceil($totalCount / $_SESSION["CONTENT_PER_PAGE"]) ?>

            <input type="hidden" name="page" value="<?= $currentPage + 1 ?>">
            <div class="button-link-linear">
                <button type="submit" <?= !$exNext ? "class='invisible' disabled" : "" ?>>
                    NEXT
                </button>
            </div>
        </form>
    </div>

</main>