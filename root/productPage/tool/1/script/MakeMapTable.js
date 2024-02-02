document.write("<table class='MapTable'>");
for (var i = 0; i < MAP_ROWS; i++) {
    document.write("<tr>");
    for (var j = 0; j < MAP_COLS; j++) {
        document.write("<td class='mapCell' id='" + i + "_" + j + "'></td>");
    }
    document.write("</tr>");
}
document.write("</table>");

var mapTable = document.getElementsByClassName('MapTable')[0];
var mapCell = document.getElementsByClassName('mapCell');

// 各セルの、マウス（またはタップ）の状態に対する操作を定義する
for (let i = 0; i < mapCell.length; i++) {

    let row = Math.floor(i / MAP_COLS);
    let col = i % MAP_COLS;

    // マウスクリック時またはタッチ時
    mapCell[i][window.ontouchstart === undefined ? 'onclick' : 'ontouchstart'] = e => {
        // タッチ時
        if (window.ontouchstart === 'ontouchstart') {
            // デフォルトの動作をキャンセル
            e.preventDefault();
        }
        // セルの描画
        writeCellDirect(col, row);
    }

    // マウスがのっかっている場合
    mapCell[i].addEventListener('mouseover', function () {
        this.style.backgroundColor = CELL_COLOR_CURSOR;
        if (isMouseDown) {
            if (writeModeId == MODE_FREE) {
                writeCell(col, row);
                setBlockNum();

            } else if (writeModeId == MODE_ELASE_FREE) {
                elaseCell(col, row);
                setBlockNum();
            }
        }
    });

    // マウスが離れた場合
    mapCell[i].addEventListener('mouseleave', function () {
        let mapColor = CELL_COLOR_BLANK;

        if (row + mapOffsetRow >= CENTER_BLOCK_ROW_TOP &&
            row + mapOffsetRow < CENTER_BLOCK_ROW_BOTTOM &&
            col + mapOffsetCol >= CENTER_BLOCK_COL_LEFT &&
            col + mapOffsetCol < CENTER_BLOCK_COL_RIGHT
        ) {
            mapColor = CELL_COLOR_DEFAULT;
        }

        if (mapArray[row + mapOffsetRow][col + mapOffsetCol] == 1) {
            mapColor = CELL_COLOR_WRITE;
        }

        this.style.backgroundColor = mapColor;
    });
}

// タッチ移動時の処理
mapTable.addEventListener('touchmove', function (e) {
    // デフォルトの動作をキャンセル
    e.preventDefault();

    // タッチされているセルの取得
    let cell = document.elementFromPoint(e.touches[0].clientX, e.touches[0].clientY);
    // セルが存在すれば、処理を行う
    if (cell) {
        console.log(i + ", " + j);

        let cellStr = cell.id.split("_");
        let touchRow = Number(cellStr[0]);
        let touchCol = Number(cellStr[1]);

        if (writeModeId == MODE_FREE) {
            writeCell(touchCol, touchRow);
            setBlockNum();

        } else if (writeModeId == MODE_ELASE_FREE) {
            elaseCell(touchCol, touchRow);
            setBlockNum();
        }

        writeMap();
    }
});
