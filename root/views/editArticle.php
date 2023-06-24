<!-- 個別PHPの読み込み -->
<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/libraries/PHPMarkdownLib/Michelf/Markdown.inc.php"); ?>

<!-- 個別CSSの読み込み -->
<script type="text/javascript">
    let link = document.createElement('link');
    link.href = '/css/editArticle.css';
    link.rel = 'stylesheet';
    link.type = 'text/css';
    let head = document.getElementsByTagName('head')[0];
    head.appendChild(link);
</script>

<!-- メイン -->
<main>
    <div class="fadeDown_2" id="edit-form">

        <!-- 注意メッセージ表示 -->
        <?php if (isset($errorList)) : ?>
            <?php foreach ($errorList as $error) : ?>
                <div class="msg_alert">
                    <?= $error ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- 入力内容送信フォーム -->
        <form method="POST" name="postArticleForm" action="/edit/post">

            <!-- タイトル入力欄 -->
            <div class="edit-title">
                <div class="content-title">
                    <span>Title</span>
                </div>
                <input id="edit-title" name="edit-title" type="text" placeholder="【PHP】入力フォームの改良" <?php if (isset($_SESSION['edit-title'])) : ?> value="<?= $_SESSION['edit-title'] ?>" <?php endif; ?> />
            </div>

            <!-- タグ入力欄 -->
            <div class="edit-tag">
                <div class="content-title">
                    <span>Tag</span>
                </div>
                <input id="edit-tag" name="edit-tag" type="text" placeholder="#PHP,#備忘録,#CSS" <?php if (isset($_SESSION['edit-tag'])) : ?> value="<?= $_SESSION['edit-tag'] ?>" <?php endif; ?> />
            </div>

            <!-- 本文入力欄 -->
            <div class="edit-content">
                <div class="content-title">
                    <span>Content</span>
                </div>
                <textarea id="edit-content" name="edit-content" type="textarea" placeholder="ここに記事内容をMarkDown形式で記載">
                <?php if (isset($_SESSION['edit-content'])) : ?>
                <?= $_SESSION['edit-content'] ?>
                <?php endif; ?>
                </textarea>
            </div>

            <!-- 各種ボタン -->
            <ul class="product-navbar" id="edit-button">
                <li class="button-link-linear">
                    <a href="javascript:postArticleForm.submit()">confirm</a>
                </li>
                <li class="button-link-linear">
                    <button onclick="clearInput();">clear</button>
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

<!-- 個別JSの読み込み -->
<script type="text/javascript" src="/js/editArticle.js"></script>