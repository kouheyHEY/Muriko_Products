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
async function readArticleListZenn() {
    // zenn apiのurlからjsonの値を取得する
    let proxyURL = './' + PROXY_PHP + '?url=' + ZENN_API_URL + '/' + ZENN_API_QUERY;
    let dataJson = '';

    await fetch(proxyURL, { mode: 'cors' })
        .then(
            function (response) {
                responseClone = response.clone();
                return response.json();
            }
            // response => response.json()
        )
        .then(data => {
            dataJson = data;
            console.log(data);
        })
        .catch(error => {
            console.log('エラーが発生しました。');
            console.log(responseClone.ok);
            console.log(responseClone.status);
            console.log(responseClone.statusText);
            console.log(responseClone.text());
            console.log(error);
        });

    return JSON.stringify(dataJson);
}