function toggleDrawMenu() {
    var drawMenuContent = document.querySelector('.drawMenuContent');
    drawMenuContent.classList.toggle('show');

    let menuBtn = document.querySelector('.drawMenuBtn');
    menuBtn.classList.toggle('show');

    if (menuBtn.classList.contains('show')) {
        // メニューが表示されている場合
        menuBtn.innerHTML = "描画メニューを閉じる";
    } else {
        // メニューが非表示の場合
        menuBtn.innerHTML = "描画メニューを開く";
    }

    console.log(drawMenuContent);
}