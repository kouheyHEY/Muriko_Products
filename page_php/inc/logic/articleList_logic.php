<script type="text/javascript">
    (async () => {
        // 記事データを取得し、Json形式に変換
        let articleList_Zenn = await readArticleListZenn();

        // 取得した値を表示
        console.log(articleList_Zenn);
    })();


</script>

<?php
    // 記事の一覧を取得
    $articleList = "";
    
?>
