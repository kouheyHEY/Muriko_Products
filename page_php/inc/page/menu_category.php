<!-- カテゴリメニュー -->    
    <!-- コンテンツタイトル -->
    <div class="menu-category">
        <div class="content-title fadeDown">
            <span>Category</span>
        </div>

        <!-- ナビゲーションバー -->
        <form action="./index.php" method="get">
            <ul class="product-navbar fadeDown">
                <?php foreach ($_SESSION["CATEGORIES"] as $category) : ?>
                    <li class="button-link"><button type="submit" name="CATEGORY" value="<?= $category ?>" id="<?= $category ?>"><?= $category ?></button></li>
                <?php endforeach ?>
            </ul>
        </form>
    </div>
