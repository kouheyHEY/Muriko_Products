const PUZZLE_COL = 3;
const PUZZLE_ROW = 3;
const PUZZLE_COLOR_TRUE = "#22FF22";
const PUZZLE_COLOR_FALSE = "#DDFFDD";
const PUZZLE_COLOR_NEUTRAL = "#00FFFF";

var gameStartTime_ms;
var gameEndTime_ms;
var currentReverseNum;
var gameClearFlg;
var gameStartFlg;

var clearEasyFlg = false;
var clearNormalFlg = false;
var clearHardFlg = false;
var openSuperHardModeFlg = false;

var puzzle;