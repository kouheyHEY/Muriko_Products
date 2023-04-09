<?php
    // 初期化処理読み込み
    include_once($_SERVER["DOCUMENT_ROOT"] . "/inc/logic/initialize_logic.php");

    // 記事が読み込まれていない場合
    if (!isset($_SESSION['ARTICLE_LIST'])) {

        // JSONデータを受信した場合
        if(isset($_POST['ARTICLE_LIST'])){
            // 記事一覧を降順にソートし、セッション変数に格納
            $article_list_tmp = json_decode($_POST['ARTICLE_LIST'], true);
            $article_list = sortObjAryZenn($article_list_tmp['articles'], false);
            $_SESSION['ARTICLE_LIST'] = $article_list;
        }else{
            // 記事の取得ロジックを実行
            header('Location: ./functions/getArticleList.php');
            exit;
        }
    }
?>

<!-- ヘッダー読み込み -->
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/inc/page/header.php"); ?>

<!-- コンテンツメニュー読み込み -->
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/inc/page/menu_content.php"); ?>

<!-- 記事メニュー読み込み -->
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/inc/page/menu_article.php"); ?>

<!-- 記事一覧ページ読み込み -->
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/inc/page/articleList_parts.php"); ?>

<!-- フッター読み込み -->
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/inc/page/footer.php"); ?>