<!-- 個別PHPの読み込み -->
<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/libraries/PHPMarkdownLib/Michelf/Markdown.inc.php"); ?>

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
<!-- <div class="menu-category">
    <div class="content-title fadeDown">
        <span>Confirm Article</span>
    </div>
</div> -->

<!-- メイン -->
<main>
    <div class="fadeDown_2" id="edit-form">

        <!-- 入力内容送信フォーム -->
        <form method="POST" name="editArticleForm" action="/edit/confirm">

            <!-- タイトル表示欄 -->
            <div class="edit-title">
                <div class="content-title">
                    <span>Title</span>
                </div>
                <input id="edit-title" name="edit-title" type="text" placeholder="【PHP】入力フォームの改良" />
            </div>

            <!-- タグ表示欄 -->
            <div class="edit-tag">
                <div class="content-title">
                    <span>Tag</span>
                </div>
                <input id="edit-tag" name="edit-tag" type="text" placeholder="#PHP,#備忘録,#CSS" />
            </div>

            <!-- 本文表示欄 -->
            <div class="edit-content">
                <div class="content-title">
                    <span>Content</span>
                </div>
                <textarea id="edit-content" name="edit-content" type="textarea"
                    placeholder="ここに記事内容をMarkDown形式で記載"></textarea>
            </div>

            <!-- 各種ボタン -->
            <ul class="product-navbar" id="edit-button">
                <li class="button-link-linear">
                    <a href="javascript:editArticleForm.submit()">post</a>
                </li>
                <li class="button-link-linear">
                    <button onclick="clearInput();">back</button>
                </li>
            </ul>
        </form>

        <div class="button-back button-link-linear">
            <a class="button-under-line" href="/product/<?= strtolower($currentCategory) ?>">
                Back
            </a>
        </div>

    </div>

</main>