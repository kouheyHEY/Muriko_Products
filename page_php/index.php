<!-- ヘッダー読み込み -->
<?php include_once("./inc/page/header.php"); ?>

<?php
    if(isset($_GET["CONTENT"])){
        $_SESSION["CONTENT"] = $_GET["CONTENT"];
    }

    // コンテンツがABOUT以外の場合
    if($_SESSION["CONTENT"] != $_SESSION["CONTENTS"][0]){
        header('Location: ./' . $_SESSION["CONTENT_URL_NAME"][$_SESSION["CONTENT"]] . '.php');
        exit;
    }
?>

<!-- コンテンツメニュー読み込み -->
<?php include_once("./inc/page/menu_content.php"); ?>

<!-- ABOUTメニュー読み込み -->
<?php include_once("./inc/page/about_parts.php"); ?>

<!-- フッター読み込み -->
<?php include_once("./inc/page/footer.php"); ?>