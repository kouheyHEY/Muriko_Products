<?php

    /**
     * @param string $_serviceName 記事一覧を取得するサービス名
     */
    function getArticleListByService($_serviceName){
        $articleList = array();
        $articleListTmp = array();

        // サービスがmuriproの時
        if ($_serviceName === "muripro") {
            // 記事ディレクトリ配下にある日時フォルダを再帰的に取得
            $articleDirList = glob(DIRPATH_ARTICLE_JSON . '/*', GLOB_ONLYDIR);
            
            // 各ファイルの内容をjson形式の配列にして格納していく
            foreach($articleDirList as $articleDir){
                // ファイル内容を読み込む
                $articleFileContent = file_get_contents(glob($articleDir . "/*.json")[0]);

                $articleFileContent = mb_convert_encoding(
                    $articleFileContent, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN'
                );
                
                // json形式からデコードする（json_decode）
                array_push($articleListTmp, json_decode($articleFileContent, true));
            }

            // 日付順にソートする
            $articleList = sortObjAry($articleListTmp, false);
        }

        // 記事一覧を返す
        return $articleList;
    }

?>