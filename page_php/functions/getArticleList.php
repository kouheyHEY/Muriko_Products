<?php
    // 初期化処理読み込み
    include_once("../inc/logic/initialize_logic.php");

    // セッションにデータが格納されている場合
    if (isset($_SESSION['articleList'])) {
        header('Location: ../articleList.php');
        exit;
    }
?>
<html>
    <head>
        <script type="text/javascript" src="../script/common.js"></script>
        <script type="text/javascript" src="../script/commonScript.js"></script>
    </head>
    <body>
        <!-- 記事一覧送信用のフォーム -->
        <form action="../articleList.php" method="post" enctype="application/json" name="articleListForm">
            <input type="hidden" name="articleList">
        </form>

        <script type="text/javascript">
            // 記事一覧を取得する
            async function getArticleListZenn() {
                let articleList = await readArticleListZenn();
                console.log(articleList);

                // formに値を設定
                document.forms["articleListForm"].elements["articleList"].value = articleList;
                // formを送信
                document.forms["articleListForm"].submit();
            }

            getArticleListZenn();

        </script>
    </body>
</html>