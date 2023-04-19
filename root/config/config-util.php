<?php

/**
 * @param string $urlParts 
 * @return string '/param1/param2/...'
 */
function setUrl(string...$urlParts)
{
    $url = '';
    foreach ($urlParts as $parts) {
        $url = $url . '/' . $parts;
    }
    return $url;
}


/**
 * オブジェクトをソートする
 * @param $targetObjAry ソート対象のオブジェクト配列
 * @param $asc 昇順かどうか
 * @return $sortedObjAry ソート済み配列
 */
function sortObjAry($targetObjAry, $asc)
{

    // 配列をコピーして、変更されたくない元の配列を保護する
    $sortedList = array_merge([], $targetObjAry);

    // カスタムソート関数を定義する
    usort($sortedList, function ($a, $b) {
        // ソートキーを定義する
        $sortKey = "updDate";

        // $sortKeyがNULLの場合は$sortKeySubを代用する
        $elmA = $a[$sortKey];
        $elmB = $b[$sortKey];

        // 値を比較して、昇順に並べる
        return strtotime($elmA) <=> strtotime($elmB);
    });

    // 並び替えられた配列を返す
    if ($asc) {
        return $sortedList;
    } else {
        return array_reverse($sortedList);
    }
}

/**
 * オブジェクトをソートする(Zenn記事一覧用)
 * @param $targetObjAry ソート対象のオブジェクト配列
 * @param $asc 昇順かどうか
 * @return $sortedObjAry ソート済み配列
 */
function sortObjAryZenn($targetObjAry, $asc)
{
    // 配列をコピーして、変更されたくない元の配列を保護する
    $sortedList = array_merge([], $targetObjAry);

    // カスタムソート関数を定義する
    usort($sortedList, function ($a, $b) {
        // ソートキーを定義する
        $sortKey = "body_updated_at";
        $sortKeySub = "published_at";

        // $sortKeyがNULLの場合は$sortKeySubを代用する
        $timeA = $a[$sortKey] ?? $a[$sortKeySub];
        $timeB = $b[$sortKey] ?? $b[$sortKeySub];

        // 時間を比較して、昇順に並べる
        return strtotime($timeA) <=> strtotime($timeB);
    });

    // 並び替えられた配列を返す
    if ($asc) {
        return $sortedList;
    } else {
        return array_reverse($sortedList);
    }
}

/**
 * ファイルサイズを適切な単位に変換する
 * 
 */
function setFileSize($fileSize)
{
    $kb = 1024;
    $mb = pow($kb, 2);
    $gb = pow($kb, 3);

    if ($fileSize >= $gb) {
        $target = $gb;
        $unit = "GB";
    } else if ($fileSize >= $mb) {
        $target = $mb;
        $unit = "MB";
    } else if ($fileSize >= $kb) {
        $target = $kb;
        $unit = "KB";
    } else {
        $target = 1;
        $unit = "B";
    }

    $setSize = floor(($fileSize / $target) * 100) / 100;

    return $setSize . $unit;
}

?>