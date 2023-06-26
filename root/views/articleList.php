<!-- コンテンツタイトル -->
<div class="menu-category">
    <div class="content-title fadeDown">
        <span>Service</span>
    </div>

    <!-- ナビゲーションバー -->
    <ul class="product-navbar fadeDown">
        <?php foreach (Config::getMasterData("SERVICES") as $service): ?>
            <?php $selectService = (strtolower($service) === $currentService) ? '-selected' : '' ?>
            <li class="button-link-linear<?= $selectService ?>">
                <a href="/article/<?= strtolower($service) ?>" value="<?= $service ?>"><?= Config::getMasterData("SERVICE_ALIAS")[$service] ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</div>

<!-- メイン -->
<main>
    <!-- コンテンツタイトル -->
    <div class="content-title fadeDown_2">
        <span>
            <?= Config::getMasterData("SERVICE_ALIAS")[strtoupper($currentService)] ?>
        </span>
    </div>

    <!-- 記事一覧 -->
    <ul class="article-list fadeDown_2">
        <!-- 記事ブロック -->
        <!-- 「Zenn.dev」の場合 -->
        <?php if ($currentService === "zenn"): ?>

            <?php foreach ($articleList as $article): ?>
                <li class="article-block button-link-linear">
                    <a class="button-under-line"
                        href="<?= Config::getMasterData('SERVICE_URL')[strtoupper($currentService)] . $article['path'] ?>">

                        <!-- タイトルを出力 -->
                        <span class="block-title">
                            <?php echo ($article["title"]); ?>
                        </span>

                        <span class="block-updtime">
                            <?php
                            // 投稿日時と最終更新日を取得
                            $updTime = $article["body_updated_at"];
                            $postTime = $article["published_at"];
                            // 最終更新日を決定
                            $lastUpdTime = $updTime ?? $postTime;
                            $lastUpdTime = (new DateTime($lastUpdTime))->format('Y-m-d');
                            // 最終更新日を出力
                            echo ($lastUpdTime);
                            ?>
                        </span>
                    </a>
                </li>
            <?php endforeach; ?>

        <?php else: ?>

            <!-- 「Zenn.dev」以外の場合 -->
            <div class="msg_alert">
                <?= MSG_NO_ARTICLE ?>
            </div>
        <?php endif; ?>
    </ul>

    <div id="page-link" class="fadeDown_3">
        <!-- 前のページのリンク -->
        <div class="to-next-prev">
            <!-- 前のページが存在するかどうか -->
            <?php $exPrev = ($currentPage > 1) ?>

            <input type="hidden" name="page" value="<?= $currentPage - 1 ?>">
            <div class="button-link-linear">
                <a href="/article/<?= $currentService . "/" . ($currentPage - 1) ?>" <?= !$exPrev ? "class='invisible' disabled" : "type='submit'" ?>>
                    PREV
                </a>
            </div>
        </div>

        <?php for ($i = 1; $i <= ceil($totalCount / Config::getMasterData("CONTENT_PER_PAGE")); $i++): ?>
            <?php if ($i == $currentPage): ?>
                <!-- 現在のページの番号 -->
                <div class="button-link-linear-selected">
                    <a href="/article/<?= $currentService . "/" . $i ?>">
                        <?= $i ?>
                    </a>
                </div>

            <?php else: ?>
                <!-- ページのリンク -->
                <div class="button-link-linear">
                    <a href="/article/<?= $currentService . "/" . $i ?>">
                        <?= $i ?>
                    </a>
                </div>

            <?php endif; ?>

        <?php endfor; ?>

        <!-- 次のページのリンク -->
        <div class="to-next-prev">
            <!-- 次のページが存在するかどうか -->
            <?php $exNext = $currentPage < ceil($totalCount / Config::getMasterData("CONTENT_PER_PAGE")) ?>

            <input type="hidden" name="page" value="<?= $currentPage + 1 ?>">
            <div class="button-link-linear">
                <a href="/article/<?= $currentService . "/" . ($currentPage + 1) ?>" <?= !$exNext ? "class='invisible' disabled" : "" ?>>
                    NEXT
                </a>
            </div>
        </div>
    </div>

</main>