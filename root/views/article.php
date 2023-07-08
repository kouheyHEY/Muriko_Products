<!-- 個別CSSの読み込み -->
<script type="text/javascript">
    let link = document.createElement('link');
    link.href = '/css/articleDetail.css';
    link.rel = 'stylesheet';
    link.type = 'text/css';
    let head = document.getElementsByTagName('head')[0];
    head.appendChild(link);
</script>

<!-- メイン -->
<main>

    <div class="fadeDown_2">

        <!-- コンテンツタイトル -->
        <div class="content-title">
            <span><?= $article["title"] ?></span>
        </div>

        <!-- プロダクト説明 -->
        <div class="article-content">
            <p><?= $article["content"] ?></p>
        </div>

        <div class="button-back button-link-linear">
            <a class="button-under-line" href="/article/<?= strtolower($currentService) ?>">
                Back
            </a>
        </div>
        
    </div>

</main>
