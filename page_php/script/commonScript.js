
/** 
 * ファイル選択時のファイル名表示処理
 * @param id ファイル選択フォームのid
 * @param input ファイル選択フォーム本体
 * */
function selectFile(id, input) {
    var files = input.files;
    var fileNames = "";
    var fileCount = files.length;

    for (var i = 0; i < fileCount; i++) {
        fileNames += (files[i].name + "<br>");
    }

    document.getElementById(id).innerHTML = fileNames;
}

/**
 * zennの記事をjson形式で取得する
 * @returns zennの記事（json形式）
 */
function readArticleListZenn() {
    let result = "";
    // zenn apiのurlからjsonの値を取得する
    fetch(`${ZENN_API_URL}/${ZENN_API_QUERY}`)
        .then(response => {
            result = response.json();
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.log("失敗しました");
            console.log(error);
        });

    console.log(result);

    return result;
}