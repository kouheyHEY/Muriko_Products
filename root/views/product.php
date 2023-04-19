<!-- メイン -->
<main>

    <div class="fadeDown_2">
        <?php if ($id === ""): ?>
            <!-- 注意メッセージ表示 -->
            <div class="msg_alert">
                <?= MSG_NO_PRODUCT_ID ?>
            </div>

        <?php else: ?>
            <!-- コンテンツタイトル -->
            <div class="content-title">
                <span>
                    <?= $title ?>
                </span>
            </div>

            <!-- プロダクト説明 -->
            <div class="product-exp">
                <p>
                    <?= $exp ?>
                </p>

                <!-- githubボタン表示 -->
                <?php if (isset($links["git"])): ?>
                    <div class="button-link-linear button-github">
                        <a class="button-under-line" href="<?= $links['git'] ?>">
                            GitHub
                        </a>
                    </div>
                <?php endif; ?>

                <!-- ページ遷移ボタン表示 -->
                <?php if (isset($links["site"])): ?>
                    <div class="button-link-linear button-topage">
                        <a class="button-under-line" href="<?= $links['site'] ?>">
                            ページを表示
                        </a>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>
        <div class="button-back button-link-linear">
            <a class="button-under-line" href="/index.php">
                Back
            </a>
        </div>

    </div>

</main>