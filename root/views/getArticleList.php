<!-- 記事一覧送信用のフォーム -->
<form action="/article/zenn" method="post" enctype="application/json" name="articleListForm">
    <input type="hidden" name="articleList">
</form>

<script type="text/javascript">
    // 記事一覧を取得する
    async function getArticleListZenn() {
        let articleList = await readArticleListZenn();

        // formに値を設定
        document.forms["articleListForm"].elements["articleList"].value = articleList;
        // formを送信
        document.forms["articleListForm"].submit();
    }

    getArticleListZenn();

</script>