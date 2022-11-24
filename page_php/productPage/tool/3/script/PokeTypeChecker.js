// グループ分け結果
var groupList = [];
var remain = [];

// 各パラメータ
// グループごとの人数
var memberPerGroup = MEMBER_PER_GROUP_MIN;
// グループ数
var groupNum = GROUP_NUM_MIN;

/**
 * グループ分けを実行する
 */
function executeGrouping() {

    // 前回の結果を廃棄し初期化する
    initGroupList();

    // 各パラメータを取得する
    memberPerGroup = $("#memberPerGroup").val();
    groupNum = $("#groupNum").val();

    console.log(memberPerGroup);
    console.log(groupNum);

    // グループ分けの対象となるメンバーを配列で取得する
    let memberList = $('.targetMember').map(
        function (index, element) { return element.value; }
    ).get();

    memberList = memberList.filter(Boolean);

    // 人数不足の場合
    if (memberList.length < memberPerGroup) {
        window.alert("メンバー数が不足しています。" + memberPerGroup + "名以上のメンバーを入力してください。");
        return;
    }

    // メンバーの順番を並べ替える
    let memberListRnd = [];
    for (let i = memberList.length - 1; i >= 0; i--) {
        let rndIdx = Math.floor(Math.random() * (i + 1));

        memberListRnd.push(memberList.splice(rndIdx, 1)[0]);
    }

    let group = [];
    // メンバーをグループに分類する
    for (let i = 0; i < groupNum; i++) {
        // グループが作れる場合
        if (memberListRnd.length >= memberPerGroup) {
            group.push(memberListRnd.splice(0, memberPerGroup));
        } else {
            break;
        }
    }

    console.log(group);

    // 設定された値を変数にセットし、画面に表示する
    groupList = group;
    remain = memberListRnd;

    for (let i = 1; i <= groupList.length; i++) {

        // 結果表示用文字列
        let resultTableString = "<li>\r\n" +
            "<table class='group-result-table'>\r\n" +
            "<tr>\r\n" +
            "<td rowspan='" + (memberPerGroup + 1) + "' class='group-id'>グループ" + i + "</td>\r\n" +
            "<td class='member-list-header'>メンバー一覧</td>\r\n" +
            "</tr>\r\n";

        // 結果表示用リストに、グループ分けされたメンバーを追加する
        for (let j = 1; j <= memberPerGroup; j++) {
            resultTableString +=
                "<tr>\r\n" +
                "<td>" + groupList[i - 1][j - 1] + "</td>\r\n" +
                "</tr>\r\n";
        }

        resultTableString +=
            "</table>\r\n" +
            "</li>\r\n";

        // グループを表示する
        $("#grouping-result").append(resultTableString);

    }

    // 余りのメンバーを表示する
    let remainString = "<li id='remain-header'>残りメンバー</li>\r\n";

    for (let i = 0; i < remain.length; i++) {
        remainString += "<li>" + remain[i] + "</li>";
    }
    $("#remain").append(remainString);

}

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
 * メンバーの行を追加する
 */
function addMemberInput() {
    let memberNum = $("#target-member-list li").length;
    // メンバーの行数が上限数以上の場合
    if (memberNum >= MEMBER_NUM_MAX) {
        window.alert(MSG_ERR_CANNOT_ADD_MEMBER);
        return;
    }
    // メンバーを追加する
    $("#target-member-list").append(
        "<li>\r\n" +
        "<label class='member-label'>メンバー" + (memberNum + 1) + "：</label>\r\n" +
        "<input type='text' maxlength='12' class='targetMember'>\r\n" +
        "</li>\r\n"
    );
}

/**
 * メンバーの行を削除する
 */
function removeMemberInput() {
    let memberNum = $("#target-member-list li").length;
    // メンバーの行数が下限数以下の場合
    if (memberNum <= MEMBER_NUM_MIN) {
        window.alert(MSG_ERR_CANNOT_REMOVE_MEMBER);
        return;
    }

    // メンバーを削除する
    $("#target-member-list").children().eq(memberNum - 1).remove();
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