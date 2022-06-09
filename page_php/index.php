<!-- 各phpファイル読み込み -->
<?php
    require_once('./functions/const.php');
    require_once('./functions/ioUtil.php');
    require_once('./functions/initialize.php');
?>

<!-- ヘッダー読み込み -->
<?php include("./inc/page/header.php"); ?>

<!-- プロダクト一覧ページ読み込み -->
<?php include("./inc/page/productList.php"); ?>

<!-- フッター読み込み -->
<?php include("./inc/page/footer.php"); ?>