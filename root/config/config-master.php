<?php

class Config
{
    // キャッシュデータを格納する変数
    private static $cache = [];

    // マスターファイルからデータを取得する関数
    public static function getMasterData($key)
    {
        // キャッシュにデータがあれば、それを返す
        if (isset(self::$cache[$key])) {
            return self::$cache[$key];
        }

        // マスターファイルを読み込む
        $masterData = json_decode(
            file_get_contents(FILEPATH_MASTER),
            true
        );

        // キーが存在しない場合はnullを返す
        if (!isset($masterData[$key])) {
            return null;
        }

        // 取得したデータをキャッシュに保存して返す
        self::$cache[$key] = $masterData[$key];
        return self::$cache[$key];
    }
}

?>