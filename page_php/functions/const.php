<?php
    // 各パス（マスタファイル、各プロダクトファイル）の定義
    define('FILEPATH_MASTER', $_SERVER["DOCUMENT_ROOT"] . '/data/master/mst_all.json');
    define('FILEPATH_MASTER_PAGING', $_SERVER["DOCUMENT_ROOT"] . '/data/master/mst_paging.json');
    define('DIRPATH_PRODUCT_JSON', $_SERVER["DOCUMENT_ROOT"] . '/data/product');
    define('DIRPATH_PRODUCT_THUMBNAIL', $_SERVER["DOCUMENT_ROOT"] . '/img/product');
    define('DIRPATH_PRODUCT_PAGE', $_SERVER["DOCUMENT_ROOT"] . '/productPage');
    define('DIRPATH_ARTICLE_JSON', $_SERVER["DOCUMENT_ROOT"] . '/data/article');

    // 各メッセージの定義
    define('MSG_NO_PRODUCT_ID', 'product id is not set.');
    define('MSG_NO_ARTICLE_ID', 'article id is not set.');
    define('MSG_NO_ARTICLE', 'article not posted.');

    // １ページ当たりの表示ブロックする
    define('PRODUCT_PER_PAGE', '10');

    // 各マスタのスプレッドシートのリンクとID
    // define('SHEET_ID_MASTER', '10C9Wiy3GU2a_TF_TtHEFyiWyZjupaCEXnLZxFpizBQ0');
    // define('SHEET_ORDER_SYSTEM_MASTER', '0');
    // define('SHEET_ORDER_SYSTEM_CATEGORY', '1779165441');
    // define('SHEET_ORDER_SYSTEM_PRODUCTS', '622108851');
?>