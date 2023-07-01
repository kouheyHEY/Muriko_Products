<!-- 個別CSSの読み込み -->
<!-- 
<script type="text/javascript">
    let link = document.createElement('link');
    link.href = '/css/postArticle.css';
    link.rel = 'stylesheet';
    link.type = 'text/css';
    let head = document.getElementsByTagName('head')[0];
    head.appendChild(link);
</script> -->

<!-- 個別JSの読み込み -->
<script type="text/javascript" src="/js/postArticle.js"></script>

<!-- メイン -->
<main>
    <div class="fadeDown_2">

        <!-- コンテンツタイトル -->
        <div class="content-title">
            <span>
                <?= $pageTitle ?>
            </span>
        </div>

        <!-- 記事投稿説明 -->
        <div class="product-exp">
            <?php if($postErrorFlg) : ?>
                <p>
                    エラーが発生しました。
                </p>
            <?php else : ?>
                <p>
                    以下のタイトルの記事を投稿しました。
                </p>
                <p>
                    <?= $postTitle ?>
                </p>
            <?php endif; ?>
            <p>
                3秒後に別ページへ遷移します。
            </p>
        </div>

        <div class="button-back button-link-linear">
            <a class="button-under-line" href="/edit">
                Back
            </a>
        </div>

    </div>
</main>

<!-- 3秒後にリダイレクト -->
<meta http-equiv="refresh" content="3;url=/product">
