<?php

/**
 * サインインの処理を行う
 * @param string $_userName ユーザ名
 * @param string $_password パスワード
 * @return string $errMsg エラーメッセージ
 */
function checkSignin(string $_userName, string $_password){
    // エラーメッセージ
    $errMsg = '';

    // ユーザリストを取得
    $userList = json_decode(
        file_get_contents(FILEPATH_USERLIST),
        true
    );

    // ユーザ名存在チェック
    $errFlg = true;
    foreach ($userList as $userInfo) {
        if ($userInfo['userName'] === $_userName) {
            $errFlg = false;
            break;
        }
    }

    // ユーザが存在しない場合
    if ($errFlg) {
       $errMsg = sprintf('「%s」 is unregistered user.', $_userName) ;
        return $errMsg;
    }
 
    // パスワードチェック
    $errMsg = 'password is invalid.' ;

    return $errMsg;

}

?>