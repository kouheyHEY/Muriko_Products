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

                for($i = 0; $i < count($sortedObjIdAry); $i++){
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
            return $array_reverse($sortedObjAry);
        }

    }
?>