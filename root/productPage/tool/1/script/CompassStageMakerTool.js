/* マウスの状態取得用 */
var isMouseDown = false;
window.onmousedown = eve => isMouseDown = true;
window.onmouseup = eve => isMouseDown = false;

/* 初期処理 */
initMapArray();

/**
 * 描画モードを設定する
 * @param modeId 描画モードId
 */
function setMode(modeId) {
    writeModeId = modeId;
    document.getElementById("modeName").innerHTML = MODE_NAME[modeId];

}

/**
 * 任意の位置に円を描画する
 * @param offsetCol 描画列
 * @param offsetRow 描画行
 */
function writeEllipse(offsetCol, offsetRow) {
    var widthR = parseInt(document.getElementById("ModeParamValue1").value) / 2;
    var heightR = parseInt(document.getElementById("ModeParamValue2").value) / 2;

    var x = 0;
    var y = 0;
    for (var r = 0; r <= 360; r++) {
        var x = widthR * Math.cos(Math.PI * r / 180) + offsetCol;
        var y = heightR * Math.sin(Math.PI * r / 180) + offsetRow;
        var writeX;
        var writeY;
        if (writeX <= offsetCol) {
            writeX = Math.ceil(x);
        } else {
            writeX = Math.floor(x);
        }
        if (writeY <= offsetRow) {
            writeY = Math.ceil(y);
        } else {
            writeY = Math.floor(y);
        }

        if (writeX + mapOffsetCol < 0 || writeX + mapOffsetCol >= MAP_COLS_MAX || writeY + mapOffsetRow < 0 || writeY + mapOffsetRow >= MAP_ROWS_MAX) {
            continue;
        }

        writeCell(writeX, writeY);
    }
}

/**
 * 任意の位置に四角形を描画する
 * @param offsetCol 描画列
 * @param offsetRow 描画行
 */
function writeRectangle(offsetCol, offsetRow) {
    var widthR = parseInt(document.getElementById("ModeParamValue1").value) / 2;
    var heightR = parseInt(document.getElementById("ModeParamValue2").value) / 2;

    var minX = Math.ceil(offsetCol - widthR);
    var minY = Math.ceil(offsetRow - heightR);
    var maxX = minX + widthR * 2 - 1;
    var maxY = minY + heightR * 2 - 1;
    var x = minX;
    var y = minY;

    if (maxX - minX == 0 &&
        maxY - minY == 0) {
        writeCell(minX, minY);
        return;
    }

    for (; x < maxX; x++) {
        if (y + mapOffsetRow < 0 ||
            y + mapOffsetRow >= MAP_ROWS_MAX ||
            x + mapOffsetCol < 0 ||
            x + mapOffsetCol >= MAP_COLS_MAX
        ) {
            continue;
        }
        writeCell(x, y);
    }
    for (; y < maxY; y++) {
        if (y + mapOffsetRow < 0 ||
            y + mapOffsetRow >= MAP_ROWS_MAX ||
            x + mapOffsetCol < 0 ||
            x + mapOffsetCol >= MAP_COLS_MAX
        ) {
            continue;
        }
        writeCell(x, y);
    }
    for (; x > minX; x--) {
        if (y + mapOffsetRow < 0 ||
            y + mapOffsetRow >= MAP_ROWS_MAX ||
            x + mapOffsetCol < 0 ||
            x + mapOffsetCol >= MAP_COLS_MAX
        ) {
            continue;
        }
        writeCell(x, y);
    }
    for (; y > minY; y--) {
        if (y + mapOffsetRow < 0 ||
            y + mapOffsetRow >= MAP_ROWS_MAX ||
            x + mapOffsetCol < 0 ||
            x + mapOffsetCol >= MAP_COLS_MAX
        ) {
            continue;
        }
        writeCell(x, y);
    }
}

/**
 * 任意の二点間に線を描画する
 * @param col1 開始点の描画列
 * @param row1 開始点の描画行
 * @param col2 終了点の描画列
 * @param row2 終了点の描画行
 */
function writeLine(col1, row1, col2, row2) {
    var m = 0;
    var dx = 0;
    var dy = 0;
    var xstart = 0;
    var xend = 0;
    var ystart = 0;
    var yend = 0;

    if (col1 <= col2) {
        dx = col2 - col1;
        xstart = col1;
        xend = col2;
    } else {
        dx = col1 - col2;
        xstart = col2;
        xend = col1;
    }

    if (row1 <= row2) {
        dy = row2 - row1;
        ystart = row1;
        yend = row2;
    } else {
        dy = row1 - row2;
        ystart = row2;
        yend = row1;
    }

    for (var x = xstart; x < xend; x++) {
        var plotY = (dy / dx) * (xend - xstart) + ystart;
        writeCell(x, plotY);
    }
}

/**
 * 塗りつぶしを行う
 * @param col 描画列
 * @param row 描画行
 * @returns     
 */
function writeRange(col, row) {
    if (blockNum >= BLOCK_NUM_MAX ||
        col < 0 ||
        col >= MAP_COLS_MAX ||
        row < 0 ||
        row >= MAP_ROWS_MAX ||
        mapArray[row + mapOffsetRow][col + mapOffsetCol] == 1
    ) {
        return;
    }
    writeCell(col, row);

    if (col > 0 && mapArray[row + mapOffsetRow][col - 1 + mapOffsetCol] == 0) {
        writeRange(col - 1, row);
    }

    if (col <= MAP_COLS_MAX && mapArray[row + mapOffsetRow][col + 1 + mapOffsetCol] == 0) {
        writeRange(col + 1, row);
    }

    if (row > 0 && mapArray[row - 1 + mapOffsetRow][col + mapOffsetCol] == 0) {
        writeRange(col, row - 1);
    }

    if (row <= MAP_ROWS_MAX && mapArray[row + 1 + mapOffsetRow][col + mapOffsetCol] == 0) {
        writeRange(col, row + 1);
    }

    return;
}

/**
 * 塗りつぶし（消しゴム）を行う
 * @param col 描画列
 * @param row 描画行
 */
function elaseRange(col, row) {
    if (blockNum <= 0 ||
        col < 0 ||
        col >= MAP_COLS_MAX ||
        row < 0 ||
        row >= MAP_ROWS_MAX ||
        mapArray[row + mapOffsetRow][col + mapOffsetCol] == 0
    ) {
        return;
    }
    elaseCell(col, row);

    if (col > 0 && mapArray[row + mapOffsetRow][col - 1 + mapOffsetCol] == 1) {
        elaseRange(col - 1, row);
    }

    if (col <= MAP_COLS_MAX && mapArray[row + mapOffsetRow][col + 1 + mapOffsetCol] == 1) {
        elaseRange(col + 1, row);
    }

    if (row > 0 && mapArray[row - 1 + mapOffsetRow][col + mapOffsetCol] == 1) {
        elaseRange(col, row - 1);
    }

    if (row <= MAP_ROWS_MAX && mapArray[row + 1 + mapOffsetRow][col + mapOffsetCol] == 1) {
        elaseRange(col, row + 1);
    }

    return;
}

/**
 * 任意のセルをオンにする
 * @param col 描画列
 * @param row 描画行
 */
function writeCell(col, row) {
    if (mapArray[row + mapOffsetRow][col + mapOffsetCol] == 0 && blockNum < BLOCK_NUM_MAX) {
        blockNum++;
        mapArray[row + mapOffsetRow][col + mapOffsetCol] = 1;
    }
}

/**
 * 任意のセルをオフにする
 * @param col 描画列
 * @param row 描画行
 */
function elaseCell(col, row) {
    if (mapArray[row + mapOffsetRow][col + mapOffsetCol] == 1 && blockNum > 0) {
        blockNum--;
        mapArray[row + mapOffsetRow][col + mapOffsetCol] = 0;
    }
}

/**
 * マップを初期化する
 */
function initMapArray() {
    blockNum = 0;
    mapArray = [];

    for (var i = 0; i < MAP_ROWS_MAX; i++) {
        mapArray.push([]);
        for (var j = 0; j < MAP_COLS_MAX; j++) {
            if (i >= CENTER_BLOCK_ROW_TOP &&
                i < CENTER_BLOCK_ROW_BOTTOM &&
                j >= CENTER_BLOCK_COL_LEFT &&
                j < CENTER_BLOCK_COL_RIGHT
            ) {
                mapArray[i].push(1);
                blockNum++;
            } else {
                mapArray[i].push(0);
            }
        }
    }
    setBlockNum();

    writeMap();
}

/**
 * 履歴を取得する
 */
function getHistory() {
    for (var i = 0; i < MAP_ROWS_MAX; i++) {
        mapArrayHistory[i] = mapArray[i].slice(0, mapArray[i].length);
    }
    blockNumHistory = blockNum;
}

/**
 * マップを履歴の状態に戻す
 */
function returnHistory() {
    for (var i = 0; i < MAP_ROWS_MAX; i++) {
        mapArray[i] = mapArrayHistory[i].slice(0, mapArrayHistory[i].length);
    }
    blockNum = blockNumHistory;

    // 描画
    writeMap();
    setBlockNum();
}

/**
 * マップを描画する（オフセット考慮）
 */
function writeMap() {

    // 描画
    for (var i = 0; i < MAP_ROWS; i++) {
        for (var j = 0; j < MAP_COLS; j++) {
            var mapColor = CELL_COLOR_BLANK;

            if (i + mapOffsetRow >= CENTER_BLOCK_ROW_TOP &&
                i + mapOffsetRow < CENTER_BLOCK_ROW_BOTTOM &&
                j + mapOffsetCol >= CENTER_BLOCK_COL_LEFT &&
                j + mapOffsetCol < CENTER_BLOCK_COL_RIGHT
            ) {
                mapColor = CELL_COLOR_DEFAULT;
            }

            if (mapArray[i + mapOffsetRow][j + mapOffsetCol] == 1) {
                mapColor = CELL_COLOR_WRITE;
            }
            document.getElementById(i + "_" + j).style.backgroundColor = mapColor;
        }
    }
}

/**
 * セルをクリックしたときにモードに応じて描画する
 * @param col 描画列
 * @param row 描画行
 */
function writeCellDirect(col, row) {

    if (writeModeId == MODE_ELLIPSE) {
        getHistory();
        writeEllipse(col, row);
    } else if (writeModeId == MODE_RECTANGLE) {
        getHistory();
        writeRectangle(col, row);
    } else if (writeModeId == MODE_RANGE) {
        getHistory();
        writeRange(col, row);
    } else if (writeModeId == MODE_ELASE_RANGE) {
        getHistory();
        elaseRange(col, row);
    } else if (writeModeId == MODE_FREE) {
        getHistory();
        if (mapArray[row + mapOffsetRow][col + mapOffsetCol] == 0) {
            writeCell(col, row);
        } else {
            if (row + mapOffsetRow < CENTER_BLOCK_ROW_TOP ||
                row + mapOffsetRow >= CENTER_BLOCK_ROW_BOTTOM ||
                col + mapOffsetCol < CENTER_BLOCK_COL_LEFT ||
                col + mapOffsetCol >= CENTER_BLOCK_COL_RIGHT
            ) {
                document.getElementById(row + "_" + col).style.backgroundColor = CELL_COLOR_BLANK;
            } else {
                document.getElementById(row + "_" + col).style.backgroundColor = CELL_COLOR_DEFAULT;
            }
            elaseCell(col, row);
        }
    }

    // 描画
    writeMap();
    setBlockNum();
}

/**
 * ブロックの数を画面にセットする
 */
function setBlockNum() {
    document.getElementById("blockNum").value = blockNum;
}

/**
 * マップのオフセットを設定する
 * @param offsetRow オフセット（行）
 * @param offsetCol オフセット（列）
 */
function setMapOffset(offsetRow, offsetCol) {
    mapOffsetCol += MOVE_AMOUNT * offsetCol;
    mapOffsetRow += MOVE_AMOUNT * offsetRow;
    mapOffsetCol = Math.max(0, mapOffsetCol);
    mapOffsetCol = Math.min(mapOffsetCol, MAP_COLS_MAX - MAP_COLS);
    mapOffsetRow = Math.max(0, mapOffsetRow);
    mapOffsetRow = Math.min(mapOffsetRow, MAP_ROWS_MAX - MAP_ROWS);

    writeMap();
}

/**
 * マップ配列の暗号化を行い画面に表示する
 */
function saveMap() {
    // 配列を文字列化
    var mapStr = "";
    for (var i = 0; i < MAP_ROWS_MAX; i++) {
        for (var j = 0; j < MAP_COLS_MAX; j++) {
            mapStr = mapStr + String(mapArray[i][j]);
        }
    }

    // マップのバイナリ配列を暗号化
    var mapCode = encodeURIComponent(mapStr);
    mapCode = RawDeflate.deflate(mapCode);
    mapCode = btoa(mapCode);

    // マップコードを画面に表示
    document.getElementById("mapCode").value = mapCode;

}

/**
 * 暗号化されたマップコードをマップ配列に変換する
 */
function loadMap() {

    // マップコードを取得
    var mapCode = document.getElementById("mapCode").value;

    // マップのバイナリ配列を復号化
    var mapStr = atob(mapCode);
    mapStr = RawDeflate.inflate(mapStr);
    mapStr = decodeURIComponent(mapStr);

    // マップコードを配列に変換
    blockNum = 0;
    for (var i = 0; i < MAP_ROWS_MAX; i++) {
        for (var j = 0; j < MAP_COLS_MAX; j++) {
            mapArray[i][j] = mapStr.charAt(i * MAP_COLS_MAX + j);
            blockNum += Number(mapStr.charAt(i * MAP_COLS_MAX + j));
        }
    }

    // マップを再描画
    writeMap();
    setBlockNum();
}