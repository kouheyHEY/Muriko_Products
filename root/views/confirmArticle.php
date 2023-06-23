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
    <div class="fadeDown_2" id="edit-form">

        <!-- 入力内容送信フォーム -->
        <form method="POST" name="editArticleForm" action="/edit/confirm">

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
                <?php endforeach ?>

            </div>

            <!-- 本文表示欄 -->
            <div class="edit-content">
                <div class="article-content">
                    <?= $editContent ?>
                </div>
            </div>

            <!-- 各種ボタン -->
            <ul class="product-navbar" id="edit-button">
                <li class="button-link-linear">
                    <a href="javascript:editArticleForm.submit()">post</a>
                </li>
                <!-- 編集画面に戻るボタンは非表示 -->
                <!--
                <li class="button-link-linear">
                    <a href="javascript:editArticleForm.submit()">back</a>
                </li>
                -->
            </ul>
        </form>

        <div class="button-back button-link-linear">
            <a class="button-under-line" href="/edit">
                Back
            </a>
        </div>

    </div>

</main>