<!-- 各種SNSボタンを設定 -->
<ul class="sns-list fadeDown_3">
    <?php foreach (Config::getMasterData("SNS_BUTTON") as $btn): ?>
        <li class="sns-link">
            <a id="<?= $btn['name'] ?>" href="<?= $btn['href'] ?>"><?= $btn["name"] ?></a>
        </li>
        <!-- 各ボタンのスタイル設定 -->
        <script>
            var snsBtn = $('#<?= $btn["name"] ?>');

            snsBtn.css('border-color', '<?= $btn["style"]["font_color"] ?>');
            snsBtn.css('color', '<?= $btn["style"]["font_color"] ?>');
            snsBtn.css('background-color', '<?= $btn["style"]["button_color"] ?>');

            // マウスオーバー時の処理
            snsBtn.hover(

                function () {
                    $(this).css('color', '<?= $btn["style"]["font_color_hover"] ?>');
                    $(this).css('background-color', '<?= $btn["style"]["button_color_hover"] ?>');
                },

                function () {
                    $(this).css('color', '<?= $btn["style"]["font_color"] ?>');
                    $(this).css('background-color', '<?= $btn["style"]["button_color"] ?>');
                }

            )
        </script>
    <?php endforeach; ?>
</ul>