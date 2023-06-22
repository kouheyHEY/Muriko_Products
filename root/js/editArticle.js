// 入力をクリアする
function clearInput() {
    $("#edit-title").val("");
    $("#edit-tag").val("");
    $("#edit-content").val("");
}

/**
 * タブキー押下時にタブを挿入する
 * @param {*} e 
 * @param {*} obj 
 * @returns 
 */
function OnTabKey(e, obj) {

    // タブキーが押された時以外は即リターン
    if (e.keyCode != 9) { return; }

    // タブキーを押したときのデフォルトの挙動を止める
    e.preventDefault();

    // 現在のカーソルの位置と、カーソルの左右の文字列を取得しておく
    var cursorPosition = obj.selectionStart;
    var cursorLeft = obj.value.substr(0, cursorPosition);
    var cursorRight = obj.value.substr(cursorPosition, obj.value.length);

    // テキストエリアの中身を、
    // 「取得しておいたカーソルの左側」+「タブ」+「取得しておいたカーソルの右側」
    // という状態にする。
    obj.value = cursorLeft + "\t" + cursorRight;

    // カーソルの位置を入力したタブの後ろにする
    obj.selectionEnd = cursorPosition + 1;
}

// 対象となるテキストエリアにonkeydownイベントを追加する
document.getElementById("edit-content").onkeydown = function (e) { OnTabKey(e, this); }
