<?php
// 各パス（マスタファイル、各プロダクトファイル）の定義
define('FILEPATH_MASTER', $_SERVER["DOCUMENT_ROOT"] . '/data/master/master.json');
define('FILEPATH_PRODUCT_LIST', $_SERVER["DOCUMENT_ROOT"] . '/data/product/product_list.json');
define('FILEPATH_ABOUT', $_SERVER["DOCUMENT_ROOT"] . '/data/article/about.json');
define('FILEPATH_EDIT', $_SERVER["DOCUMENT_ROOT"] . '/data/master/edit.json');
define('FILEPATH_USERLIST', $_SERVER["DOCUMENT_ROOT"] . '/data/master/userList.json');

define('DIRPATH_PRODUCT_JSON', $_SERVER["DOCUMENT_ROOT"] . '/data/product');
define('DIRPATH_PRODUCT_THUMBNAIL', $_SERVER["DOCUMENT_ROOT"] . '/img/product');
define('DIRPATH_PRODUCT_PAGE', $_SERVER["DOCUMENT_ROOT"] . '/productPage');
define('DIRPATH_ARTICLE_JSON', $_SERVER["DOCUMENT_ROOT"] . '/data/article');

// 各メッセージの定義
define('MSG_NO_PRODUCT_ID', 'product id is not set.');
define('MSG_NO_ACTIVITY', 'there are no recent major activities.');
define('MSG_NO_ARTICLE_ID', 'article id is not set.');
define('MSG_NO_ARTICLE', 'article not posted.');

define('MSG_NO_TITLE_INPUT', 'title is required item.');
define('MSG_NO_TAG_INPUT', 'tag is required item.');
define('MSG_NO_CONTENT_INPUT', 'content is required item.');

// １ページ当たりの表示するブロック
define('PRODUCT_PER_PAGE', '10');

?>