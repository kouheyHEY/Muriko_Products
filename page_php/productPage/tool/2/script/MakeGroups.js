// グループ分け結果
var groupList = [];

// 各パラメータ
// グループごとの人数
var memberPerGroup = MEMBER_PER_GROUP_MIN;
// グループ数
var groupNum = GROUP_NUM_MIN;

// 余りメンバーの扱い
var optionRem = OPTION_REMAINING_GROUP;

/**
 * グループ分けを実行する
 */
function executeGrouping() {

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

    // メンバーをグループに分類する
    for (let i = 0; i < memberPerGroup; i++) {
        // グループを作成していく
    }
}

/**
 * グループを初期化する
 */
function initGroupList() {
    groupList = [];
}