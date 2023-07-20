<?php

/**
 * サインインの処理を行う
 * @param string $_userName ユーザ名
 * @param string $_password パスワード
 * @param array $_errMsgList エラーメッセージリスト
 * @return string $errMsg エラーメッセージ
 */
function checkSignin(string $_userName, string $_password, array &$_errMsgList){
    // エラーメッセージ
    $errMsg = '';

    // ユーザリストを取得
    $userList = json_decode(
        file_get_contents(FILEPATH_USERLIST),
        true
    )['USER'];

    // ユーザ名存在チェック
    $matchUserInfo = null;
    foreach ($userList as $userInfo) {
        if ($userInfo['USERNAME'] === $_userName) {
            $matchUserInfo = $userInfo;
            break;
        }
    }

    // ユーザが存在しない場合
    if (empty($matchUserInfo)) {
       array_push($_errMsgList, sprintf('「%s」 is unregistered user.', $_userName));
       return false;
    }
 
    // パスワードチェック
    if($matchUserInfo['PASSWORD'] !== $_password){
        array_push($_errMsgList, 'password is invalid.');
        return false;
    }


    // セッションにユーザ情報を追加
    $_SESSION['signin-user'] = $matchUserInfo

    return true;

}

?>