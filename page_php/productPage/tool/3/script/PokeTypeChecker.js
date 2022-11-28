
setTargetInput();

/**
 * 入力をクリアする
 */
function clearTarget() {
    $("#target-list").children().remove();

    $("#target-list").append(
        "<li class='target-header'>\r\n" +
        "<label class='target-label'></label>\r\n" +
        "<div class='target-name'>名前</div>\r\n" +
        "<div class='target-type'>type1</div>\r\n" +
        "<div class='target-type'>type2</div>\r\n" +
        "</li>\r\n"
    );

    setTargetInput();
}

/**
 * タイプ相性をチェックする
 */
function executeTypeCheck() {

    for (let t = 1; t <= TARGET_NUM; t++) {
        $("#adv-" + t + " .type-list").children().remove();
        $("#dis-" + t + " .type-list").children().remove();
    }

    for (let t = 1; t <= TARGET_NUM; t++) {
        let typeInfoList = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
        let noType = true;
        let typeVal = -1;
        for (let i = 1; i <= 2; i++) {
            typeVal = $("#target-info-" + t + " .target-type-" + i).val();
            // タイプが設定されていない場合
            if (typeVal == -1 && noType) {
                break;
            } else if (typeVal != -1) {
                // タイプが設定されている場合
                noType = false;
                for (let j = 0; j < TYPE_NUM; j++) {
                    typeInfoList[j] *= TYPE_RATE[j][Number(typeVal)];
                }
            }
        }

        // 画面に設定
        for (let j = 1; j <= TYPE_NUM; j++) {
            if (typeInfoList[j] < 1.0) {
                $("#adv-" + t + " .type-list").append(
                    "<span class='type-block'>" + TYPE_LIST[j][IDX_TYPE_NAME] + "</span>"
                );
            } else if (typeInfoList[j] > 1.0) {
                $("#dis-" + t + " .type-list").append(
                    "<span class='type-block'>" + TYPE_LIST[j][IDX_TYPE_NAME] + "</span>"
                );
            }
        }
    }
}

/** タイプのプルダウンリストを作成する */
function setTargetInput() {
    for (let t = 1; t <= TARGET_NUM; t++) {
        $("#target-list").append(
            "<li class='target-info' id='target-info-" + t + "'></li>\r\n"
        );
        // 対象の連番を入力する
        $("#target-info-" + t).append(
            "<label class='target-label'>" + t + "</label>\r\n"
        );

        // 対象の名前入力欄を追加する
        $("#target-info-" + t).append(
            "<input type='text' maxlength='6' size='12' class='target'>\r\n"
        );

        // 対象のタイプ入力欄を追加する
        for (let j = 1; j <= 2; j++) {
            $("#target-info-" + t).append(
                "<select class='target-type-" + j + "'>\r\n" +
                "<option value='-1' selected> </option>\r\n" +
                "</select>\r\n"
            );
            for (let i = 0; i < TYPE_LIST.length; i++) {
                $("#target-info-" + t + " .target-type-" + j).append(
                    "<option value='" + TYPE_LIST[i][IDX_TYPE_ID] + "'>" + TYPE_LIST[i][IDX_TYPE_NAME] + "</option>\r\n"
                );
            }
        }

        // 対象の耐性の表示を作成する
        $("#target-list").append(
            "<li class='type-info' id='adv-" + t + "'>\r\n" +
            "<label class='type-label'></label>\r\n" +
            "<div class='adv-type'>耐性：</div>\r\n" +
            "<ul class='type-list'></ul>\r\n" +
            "</li>\r\n"
        );

        // 対象の弱点の表示を作成する
        $("#target-list").append(
            "<li class='type-info' id='dis-" + t + "'>\r\n" +
            "<label class='type-label'></label>\r\n" +
            "<div class='dis-type'>弱点：</div>\r\n" +
            "<ul class='type-list'></ul>\r\n" +
            "</li>\r\n"
        );
    }
}