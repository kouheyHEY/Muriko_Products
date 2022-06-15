function selectFile(id, input) {
    var files = input.files;
    var fileNames = "";
    var fileCount = files.length;

    for (var i = 0; i < fileCount; i++) {
        fileNames += (files[i].name + ", ");
    }

    fileNames.slice(0, -2);

    document.getElementById(id).innerHTML = fileNames;
}