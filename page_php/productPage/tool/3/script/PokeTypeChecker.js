/**
 * グループを初期化する
 */
function initGroupList() {
    groupList = [];
    remain = [];

    $("#grouping-result").children().remove();
    $("#remain").children().remove();
}

/**
 * 入力をクリアする
 */
function clearMemberInput() {
    let memberNum = $("#target-member-list li").length;

    $("#target-member-list").children().remove();

    for (let i = 0; i < memberNum; i++) {
        // メンバーを追加する
        $("#target-member-list").append(
            "<li>\r\n" +
            "<label class='member-label'>メンバー" + (i + 1) + "：</label>\r\n" +
            "<input type='text' maxlength='12' class='targetMember'>\r\n" +
            "</li>\r\n"
        );
    }
}

/** タイプのプルダウンリストを作成する */
function setTypeList() {

}