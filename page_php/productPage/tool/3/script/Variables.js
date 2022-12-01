// タイプ相性の値
const TYPE_RATE = [
    //  無, 炎, 水, 草, 電, 飛, 岩, 地, 氷, 虫, 悪, 毒, 闘, 超, 霊, 鋼, 竜, 妖
    [1, 1, 1, 1, 1, 1, 0.5, 1, 1, 1, 1, 1, 1, 1, 0, 0.5, 1, 1],
    [1, 0.5, 0.5, 2, 1, 1, 0.5, 1, 2, 2, 1, 1, 1, 1, 1, 2, 0.5, 1],
    [1, 2, 0.5, 0.5, 1, 1, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 0.5, 1],
    [1, 0.5, 2, 0.5, 1, 0.5, 2, 2, 1, 0.5, 1, 0.5, 1, 1, 1, 0.5, 0.5, 1],
    [1, 1, 2, 0.5, 0.5, 2, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0.5, 1],
    [1, 1, 1, 2, 0.5, 1, 0.5, 1, 1, 2, 1, 1, 2, 1, 1, 0.5, 1, 1],
    [1, 2, 1, 1, 1, 2, 1, 0.5, 2, 2, 1, 1, 0.5, 1, 1, 0.5, 1, 1],
    [1, 2, 1, 0.5, 2, 0, 2, 1, 1, 0.5, 1, 2, 1, 1, 1, 2, 1, 1],
    [1, 0.5, 0.5, 2, 1, 2, 1, 2, 0.5, 1, 1, 1, 1, 1, 1, 0.5, 2, 1],
    [1, 0.5, 1, 2, 1, 0.5, 0.5, 1, 1, 1, 2, 0.5, 0.5, 2, 0.5, 0.5, 1, 0.5],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.5, 1, 0.5, 2, 2, 1, 1, 0.5],
    [1, 1, 1, 1, 1, 1, 0.5, 0.5, 1, 1, 1, 0.5, 1, 1, 0.5, 0, 1, 2],
    [2, 1, 1, 1, 1, 0.5, 2, 1, 2, 0.5, 2, 0.5, 1, 0.5, 0, 2, 1, 0.5],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 2, 2, 0.5, 1, 0.5, 1, 1],
    [0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.5, 1, 1, 2, 2, 1, 1, 1],
    [1, 0.5, 0.5, 1, 0.5, 1, 2, 1, 2, 1, 1, 1, 1, 1, 1, 0.5, 1, 2],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.5, 2, 0],
    [1, 0.5, 1, 1, 1, 1, 1, 1, 1, 1, 2, 0.5, 2, 1, 1, 0.5, 2, 1],
];

// タイプ一覧
const TYPE_LIST = [
    [0, "無", "#F5F5F5", "black"],
    [1, "炎", "#FF4500", "white"],
    [2, "水", "#4169E1", "white"],
    [3, "草", "#3CB371", "black"],
    [4, "電", "#FFD700", "black"],
    [5, "飛", "#33FFFF", "black"],
    [6, "岩", "#808000", "white"],
    [7, "地", "#EEE8AA", "black"],
    [8, "氷", "#E0FFFF", "black"],
    [9, "虫", "#9ACD32", "black"],
    [10, "悪", "#2F4F4F", "white"],
    [11, "毒", "#EE00EE", "black"],
    [12, "闘", "#FF8C00", "black"],
    [13, "超", "#EE82EE", "black"],
    [14, "霊", "#4B0082", "white"],
    [15, "鋼", "#C0C0C0", "black"],
    [16, "竜", "#191970", "white"],
    [17, "妖", "#FF69B4", "black"]
];
const TYPE_NUM = 18;
const IDX_TYPE_ID = 0;
const IDX_TYPE_NAME = 1;
const IDX_TYPE_COLOR = 2;
const IDX_TYPE_FCOLOR = 3;

// ターゲットの数
const TARGET_NUM = 6;

// エラーメッセージ
const MSG_ERR_CANNOT_ADD_MEMBER = "メンバーはこれ以上追加できません。";
const MSG_ERR_CANNOT_REMOVE_MEMBER = "メンバーはこれ以上削除できません。";
