<?php
    // 初期化処理読み込み
    include_once("./inc/logic/initialize_logic.php");

    if(isset($_GET["CONTENT"])){
        $_SESSION["CONTENT"] = $_GET["CONTENT"];
    }

    // コンテンツがABOUT以外の場合
    if($_SESSION["CONTENT"] != $_SESSION["CONTENTS"][0]){
        // header関数を使用しているので、これ以前に
        // 出力（改行やコメント含む）をしてはいけない。
        header('Location: ./' . $_SESSION["CONTENT_URL_NAME"][$_SESSION["CONTENT"]] . '.php');
        exit;
    }
?>

<!-- ヘッダー読み込み -->
<?php include_once("./inc/page/header.php"); ?>

<!-- コンテンツメニュー読み込み -->
<?php include_once("./inc/page/menu_content.php"); ?>

<!-- ABOUTメニュー読み込み -->
<?php include_once("./inc/page/about_parts.php"); ?>

<!-- フッター読み込み -->
<?php include_once("./inc/page/footer.php"); ?>