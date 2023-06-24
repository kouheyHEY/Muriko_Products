<!-- 個別CSSの読み込み -->
<script type="text/javascript">
    let link = document.createElement('link');
    link.href = '/css/confirmArticle.css';
    link.rel = 'stylesheet';
    link.type = 'text/css';
    let head = document.getElementsByTagName('head')[0];
    head.appendChild(link);
</script>

<!-- 個別JSの読み込み -->
<script type="text/javascript" src="/js/confirmArticle.js"></script>

<!-- コンテンツタイトル -->
<div class="menu-category">
    <div class="content-title fadeDown">
        <span>Confirm Article</span>
    </div>
</div>

<!-- メイン -->
<main>
    <div class="fadeDown_2" id="post-form">

        <!-- 入力内容送信フォーム -->
        <form method="POST" name="postArticleForm" action="/edit/post">

            <!-- タイトル表示欄 -->
            <div class="edit-title">
                <div class="content-title">
                    <span>
                        <?= $editTitle ?>
                    </span>
                </div>
            </div>

            <!-- タグ表示欄 -->
            <div class="edit-tag">
                <?php foreach ($editTag as $tag): ?>
                    <div class="edit-tag-block">
                        <span>
                            <?= $tag ?>
                        </span>
                    </div>
                <?php endforeach; ?>

            </div>

            <!-- 本文表示欄 -->
            <div class="edit-content">
                <div class="article-content">
                    <?= $editContent ?>
                </div>
            </div>

            <!-- 各変数のセット -->
            <input type="hidden" name="post-title" value="<?=  $editTitle ?>"/>
            <input type="hidden" name="post-tag" value="<?=  $editTag ?>"/>
            <input type="hidden" name="post-content" value="<?=  $editContent ?>"/>

            <!-- 各種ボタン -->
            <ul class="product-navbar" id="post-button">
                <li class="button-link-linear">
                    <a href="javascript:postArticleForm.submit()">post</a>
                </li>
            </ul>
        </form>

        <div class="button-back button-link-linear">
            <a class="button-under-line" href="/edit/post">
                Back
            </a>
        </div>

    </div>

</main>