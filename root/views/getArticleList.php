<!-- 記事一覧送信用のフォーム -->
<form action="/article/zenn" method="post" enctype="application/json" name="articleListForm">
    <input type="hidden" name="articleList">
</form>

<script type="text/javascript">
    
    // 一定時間待機用関数
    const sleep = waitTime => new Promise( resolve => setTimeout(resolve, waitTime) );

    // 記事一覧を取得する
    async function getArticleListZenn() {

        // 一定時間待機することで、エラーだと思わせない
        await sleep( 1000 );

        let articleList = await readArticleListZenn();

        // formに値を設定
        document.forms["articleListForm"].elements["articleList"].value = articleList;

        // formを送信
        document.forms["articleListForm"].submit();
    }

    getArticleListZenn();

</script>

<main>
    <div class="msg_alert">
        <?= "NOW LOADING..." ?>
    </div>
</main>