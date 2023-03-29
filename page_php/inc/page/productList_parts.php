<!-- メイン -->
<main>

    <?php if ($_SESSION["CATEGORY"] != "ACTIVITY") : ?>
        <!-- カテゴリが「ACTIVITY」以外の場合 -->

        <!-- コンテンツタイトル -->
        <div class="content-title fadeDown_2">
            <span><?= $_SESSION["CATEGORY_DISP_NAME"][$_SESSION['CATEGORY']] ?> Products</span>
        </div>

        <!-- プロダクト一覧 -->
        <form action="./product.php" method="get">
            <ul class="product-list fadeDown_2">
                <!-- プロダクトブロック -->
                <?php foreach($product_list as $product) : ?>
                    <li class="product-block button-link-linear">
                        <button type="submit" name="product_id" value="<?= $product["id"] ?>"><?= $product["title"] ?></button>
                    </li>
                <?php endforeach ?>
            </ul>
        </form>
    
    <?php else : ?>
        <!-- カテゴリが「ACTIVITY」の場合 -->
        <div class="fadeDown_2">
            <div class="content-title">
                <span>Contributions</span>
            </div>

            <!-- Githubの草 -->
            <div class="product-exp github-info">
                <div class="github-link">
                    <i class="fab fa-github-square"></i>
                    <a href="https://github.com/kouheyHEY" target="_blank">kouheyHEY</a>
                </div>
                <a href="https://github.com/kouheyHEY" target="_blank">
                    <img class="github-glaph" src="https://grass-graph.appspot.com/images/kouheyHEY.png">
                </a>
            </div>
        </div>

    <?php endif; ?>

</main>