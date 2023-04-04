<?php
    // 初期化処理読み込み
    include_once($_SERVER["DOCUMENT_ROOT"] . "/inc/logic/initialize_logic.php");

    // 記事が読み込まれていない場合
    if (!isset($_SESSION['articleList'])) {

        // JSONデータが受信できた場合
        if(isset($_POST['articleList'])){
            // セッション変数に格納
            $_SESSION['articleList'] = json_decode($_POST['articleList'], true);
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

<!-- プロダクト一覧ページ読み込み -->
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/inc/page/articleList_parts.php"); ?>

<!-- フッター読み込み -->
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/inc/page/footer.php"); ?>