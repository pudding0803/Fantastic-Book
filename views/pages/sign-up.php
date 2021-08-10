<!DOCTYPE html>
<html lang="zh-TW">
    <head>
        <?= $data['head'] ?>
        <link href="assets/icon.ico" rel="icon" type="image/x-icon">
        <link href="css/eye-button.css" rel="stylesheet" type="text/css">
        <script src="js/eye-button.js"></script>
    </head>
    <body>
        <div class="m-5 p-5 border border-3 rounded-3 self-border">
            <form class="mx-4" action="/doSignUp" method="post">
                <div class="mb-4">
                    <label for="name" class="form-label fs-5">使用者名稱</label>
                    <input type="text" class="form-control self-border" aria-describedby="nameHelpBlock" id="name" name="name" placeholder="請輸入名稱" maxlength="20" required>
                    <div id="nameHelpBlock" class="form-text fs-6">
                        使用者名稱不得超過 20 字
                    </div>
                </div>
                <div class="mb-4">
                    <label for="account" class="form-label fs-5">使用者帳號</label>
                    <input type="text" class="form-control self-border" aria-describedby="accountHelpBlock" id="account" name="account" placeholder="請輸入帳號" maxlength="20" required>
                    <div id="accountHelpBlock" class="form-text fs-6">
                        使用者帳號不得超過 20 字
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label fs-5">使用者密碼</label>
                    <button type="button" class="hidden-button fs-5"><i class="fas fa-eye-slash"></i></button>
                    <input type="password" class="form-control self-border" aria-describedby="passwordHelpBlock" id="password" name="password" placeholder="請輸入密碼" maxlength="20" required>
                    <div id="passwordHelpBlock" class="form-text fs-6">
                        使用者密碼不得超過 20 字
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password2" class="form-label fs-5">確認使用者密碼</label>
                    <button type="button" class="hidden-button fs-5"><i class="fas fa-eye-slash"></i></button>
                    <input type="password" class="form-control self-border" aria-describedby="password2HelpBlock" id="password2" name="password2" placeholder="請再次輸入密碼" maxlength="20" required>
                    <div id="password2HelpBlock" class="form-text fs-6">
                        必須與輸入密碼相同
                    </div>
                </div>
                <div>
                    <button type="submit" class="me-3 btn self-button" id="submit-button"><i class="me-2 fas fa-user-plus"></i>註冊</button>
                    <a class="btn self-button" href="/sign-in" role="button"><i class="me-2 fas fa-sign-in-alt"></i>登入</a>
                </div>
            </form>
        </div>
    </body>
</html>
