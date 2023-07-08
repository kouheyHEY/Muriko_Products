<?php

    /**
     * @param string $_serviceName 記事一覧を取得するサービス名
     */
    function getArticleListByService($_serviceName){
        $articleList = array();
        $articleListTmp = array();

        // サービスがmuriproの時
        if ($_serviceName === "muripro") {
            // 記事ファイルのディレクトリを取得する
            $articleDir = DIRPATH_ARTICLE_JSON;

            // ディレクトリ配下にある記事ファイル（json）を再帰的に取得
            $articleFileList = array();
            
            // 各ファイルの内容をjson形式の配列にして格納していく
            foreach($articleFileList as $articleFile){
                // ファイル内容を読み込む
                $articleFileContent = null;
                
                // json形式からデコードする（json_decode）
                $articleListTmp = json_decode($articleFileContent, true);
                // 日付順にソートする
                $articleList = sortObjAryZenn($articleListTmp, false);
            }
        }

        // 記事一覧を返す
        return $articleList;
    }

?>