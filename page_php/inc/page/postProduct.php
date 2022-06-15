<!-- 各phpファイル読み込み -->
<?php
    include_once("./inc/logic/productList_logic.php");
?>

<!-- メイン -->
<main>

    <!-- プロダクト情報入力 -->
    <form action="#" method="post" enctype="multipart/form-data" class="product-info">

        <!-- コンテンツタイトル -->
        <div class="content-title">
            <span>Summary</span>
        </div>

        <!-- プロダクト登録 -->
        <div class="product-summary">

            <!-- 基本情報 -->
            <p>
                <label class="input-title">Product Category </label>
                <input type="radio" name="category" value="GAME" checked>GAME
                <input type="radio" name="category" value="TOOL">TOOL
            </p>
            <p>
                <label class="input-title">Product Title</label>
                <input type="text" name="title" size="40" minlength="3">
            </p>
            <p>
                <label class="input-title">Creator Name</label>
                <input type="text" name="creator" size="40" minlength="1">
            </p>
            <p>
                <label class="input-title">link (GitHub)</label>
                <input type="text" name="github" size="40">
            </p>
            <p>
                <label class="input-title">link (ProductPage)</label>
                <input type="text" name="productPage" size="40">
            </p>
            <p>
                <label class="input-title">Product Explanation</label>
                <textarea name="productExp" cols="80" rows="10"></textarea>
            </p>
        </div>

        <!-- 詳細情報 -->
        <div class="content-title">
            <span>Product Files</span>
        </div>

        <div class="product-details">

            <!-- サムネイル -->
            <p class="fileChoose">
                <label class="input-title">thumbnail</label>
                <label class="file-upload-button">
                    select files<input type="file" name="thumbnail" onchange="selectFile('thumbnail', this)">
                </label>
                <span class="file-name" id="thumbnail">ファイルが選択されていません</span>
            </p>

            <!-- プロダクトファイル -->
            <p class="fileChoose">
                <label class="input-title">product files</label>
                <label class="file-upload-button">
                    select files<input type="file" name="productFile" onchange="selectFile('productFile', this)" multiple>
                </label>
                <span class="file-name" id="productFile">ファイルが選択されていませんああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ</span>
            </p>

        </div>

        <div class="button-post button-link">
            <button type="submit" name="postProduct" value="post">Post</button>
        </div>

    </form>

    <div class="button-back button-link">
        <a href="./index.php">Back</a>
    </div>

</main>