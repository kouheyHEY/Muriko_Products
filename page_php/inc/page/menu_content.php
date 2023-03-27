<!-- コンテンツメニュー -->    
<!-- タイトル -->
<div class="menu-content">

    <!-- ナビゲーションバー -->
    <form action="./index.php" method="get">
        <ul class="product-navbar fadeDown">
            <?php foreach ($_SESSION["CONTENTS"] as $content) : ?>
                <?php $transparent = ($content !== $_SESSION["CONTENT"]) ? 'font-transparent' : '' ?>
                <li class="button-link-linear">
                    <button class="<?= $transparent ?>" type="submit" name="CONTENT" value="<?= $content ?>" id="<?= $content ?>"><?= $content ?></button>
                </li>
            <?php endforeach ?>
        </ul>
    </form>
</div>
