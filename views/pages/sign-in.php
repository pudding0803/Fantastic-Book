<!DOCTYPE html>
<html lang="zh-TW">
    <head>
        <?= $data['head'] ?>
        <link href="assets/icon.ico" rel="icon" type="image/x-icon">
        <link href="css/style.css" rel=stylesheet type="text/css">
        <link href="css/eye-button.css" rel="stylesheet" type="text/css">
        <script src="js/eye-button.js"></script>
    </head>
    <body>
        <div class="m-5 p-5 border border-3 rounded-3 self-border">
            <form class="mx-4" action="/doSignIn" method="post">
                <div class="mb-4">
                    <label for="account" class="form-label fs-5">使用者帳號</label>
                    <input type="text" class="form-control self-border" id="account" name="account" placeholder="請輸入帳號" maxlength="20" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label fs-5">使用者密碼</label>
                    <button type="button" class="hidden-button fs-5"><i class="fas fa-eye-slash"></i></button>
                    <input type="password" class="form-control self-border" id="password" name="password" placeholder="請輸入密碼" maxlength="20" required>
                </div>
                <div>
                    <button type="submit" class="me-3 btn self-button"><i class="me-2 fas fa-sign-in-alt"></i>登入</button>
                    <a class="btn self-button" href="/sign-up" role="button"><i class="me-2 fas fa-user-plus"></i>註冊</a>
                </div>
            </form>
        </div>
    </body>
</html>
