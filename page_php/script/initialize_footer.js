// 任意のHTML要素にクラスを追加する
function addClassName(_elmList, _className) {
    Array.prototype.forEach.call(_elmList, function (elm) {
        elm.className = elm.className + ' ' + _className;
    });
}

// フェードアニメーションを各要素に適用する
addClassName(document.getElementsByTagName("button"), "fadeDown_slow");
addClassName(document.getElementsByClassName("button-link"), "fadeDown_slow");