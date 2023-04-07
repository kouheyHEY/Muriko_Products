<?php

    /**
     * オブジェクトをソートする
     * @param $targetObjAry ソート対象のオブジェクト配列
     * @param $sortKey ソート対象のキー
     * @param $asc 昇順かどうか
     * @return $sortedObjAry ソート済み配列
     */
    function sortObjAry($targetObjAry, $sortKey, $asc){
        $sortedObjIdAry = [];
        $sortedObjAry = [];

        foreach($targetObjAry as $targetObj){

            if(count($sortedObjIdAry) == 0){
                // ソート済み配列が空の場合

                // ソート済み配列に値を挿入する
                array_push($sortedObjIdAry, $targetObj["id"]);
            }else{
                // ソート済み配列が空でない場合

                $aryCnt = count($sortedObjIdAry);
                for($i = 0; $i < $aryCnt; $i++){
                    if($targetObj[$sortKey] < $targetObjAry[$sortedObjIdAry[$i]][$sortKey]){
                        // ソート済み配列の値よりも小さい場合

                        // ソート済み配列に値を挿入する
                        array_splice($sortedObjIdAry, $i, 0, $targetObj["id"]);

                        break;
                    }

                    // ループの最後まで処理した場合
                    if($i == count($sortedObjIdAry) - 1){

                        // ソート済み配列に値を挿入する
                        array_push($sortedObjIdAry, $targetObj["id"]);
                    }
                }
            }
        }

        foreach($sortedObjIdAry as $id){
            array_push($sortedObjAry, $targetObjAry[$id]);
        }

        if($asc){
            // 昇順の場合

            // ソート済み配列をreturnする
            return $sortedObjAry;
        }else{
            // 降順の場合

            // ソート済み配列（逆順）をreturnする
            return array_reverse($sortedObjAry);
        }

    }

    /**
     * オブジェクトをソートする(Zenn記事一覧用)
     * @param $targetObjAry ソート対象のオブジェクト配列
     * @param $asc 昇順かどうか
     * @return $sortedObjAry ソート済み配列
     */
    function sortObjAryZenn($targetObjAry, $asc){
        $sortedObjIdAry = [];
        $sortedObjAry = [];
        $sortKey = "body_updated_at";
        $sortKeySub = "published_at";

        foreach($targetObjAry as $targetObj){

            if(count($sortedObjIdAry) == 0){
                // ソート済み配列が空の場合

                // ソート済み配列に値を挿入する
                array_push($sortedObjIdAry, count($sortedObjIdAry));
            }else{
                // ソート済み配列が空でない場合

                $aryCnt = count($sortedObjIdAry);
                for($i = 0; $i < $aryCnt; $i++){
                    // 比較用の日付を取得する
                    $targetValue = ($targetObj[$sortKey] != NULL)
                        ? $targetObj[$sortKey]
                        : $targetObj[$sortKeySub];

                    $targetAryValue = ($targetObjAry[$sortedObjIdAry[$i]][$sortKey] != NULL)
                        ? $targetObjAry[$sortedObjIdAry[$i]][$sortKey]
                        : $targetObjAry[$sortedObjIdAry[$i]][$sortKeySub];

                    if($targetValue < $targetAryValue){
                        // ソート済み配列の値よりも小さい場合

                        // ソート済み配列に値を挿入する
                        array_splice($sortedObjIdAry, $i, 0, $aryCnt);

                        break;
                    }

                    // ループの最後まで処理した場合
                    if($i == count($sortedObjIdAry) - 1){

                        // ソート済み配列に値を挿入する
                        array_push($sortedObjIdAry, $i);
                    }
                }
            }
        }

        foreach($sortedObjIdAry as $id){
            array_push($sortedObjAry, $targetObjAry[$id]);
        }

        if($asc){
            // 昇順の場合

            // ソート済み配列をreturnする
            return $sortedObjAry;
        }else{
            // 降順の場合

            // ソート済み配列（逆順）をreturnする
            return array_reverse($sortedObjAry);
        }

    }

    /**
     * ファイルサイズを適切な単位に変換する
     * 
     */
    function setFileSize($fileSize){
        $kb = 1024;
        $mb = pow($kb, 2);
        $gb = pow($kb, 3);

        if($fileSize >= $gb){
            $target = $gb;
            $unit = "GB";
        }else if($fileSize >= $mb){
            $target = $mb;
            $unit = "MB";
        }else if($fileSize >= $kb){
            $target = $kb;
            $unit = "KB";
        }else{
            $target = 1;
            $unit = "B";
        }

        $setSize = floor(($fileSize / $target) * 100) / 100;

        return $setSize . $unit;
    }
?>