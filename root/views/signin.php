<!-- メイン -->
<main>

    <div class="fadeDown_2">

        <!-- サインインフォーム -->
        <form method="POST" name="signinForm" action="/signin/auth">

            <!-- ユーザ名入力欄 --> 
            <div class="user-name"> 
                <div class="content-title"> 
                    <span>UserName</span> 
                </div> 
                <input id="" name="user-name" type="text" placeholder="ユーザ名" <?php if (isset($_SESSION['user-name'])) : ?> value="<?= $_SESSION['user-name'] ?>" <?php endif; ?> /> 
            </div>

            <!-- パスワード入力欄 --> 
            <div class="password"> 
                <div class="content-title"> 
                    <span>Password</span> 
                </div> 
                <input id="" name="password" type="password" /> 
            </div>

            <!-- 各種ボタン --> 
            <ul id="signin-button"> 
                <li class="button-link-linear"> 
                    <a href="javascript:signinForm.submit()">sign in</a> 
                </li> 
                <li class="button-link-linear"> 
                    <button onclick="clearInput();">clear</button> 
                </li> 
            </ul>
        </form>

    </div>

</main>