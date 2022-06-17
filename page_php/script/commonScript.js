
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