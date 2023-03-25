<!-- コンテンツメニュー -->    
    <!-- タイトル -->
    <div class="menu-content">

        <!-- ナビゲーションバー -->
        <form action="./productList.php" method="get">
            <ul class="product-navbar fadeDown">
                <?php foreach ($_SESSION["CONTENTS"] as $content) : ?>
                    <li class="button-link-linear"><button type="submit" name="CONTENT" value="<?= $content ?>" id="<?= $content ?>"><?= $content ?></button></li>
                <?php endforeach ?>
            </ul>
        </form>
    </div>
