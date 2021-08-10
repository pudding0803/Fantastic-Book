<!DOCTYPE html>
<html lang="zh-TW" style="scroll-behavior: auto;">
    <head>
        <?= $data['head'] ?>
        <link href="../assets/icon.ico" rel="icon" type="image/x-icon">
        <link href="../css/style.css" rel=stylesheet type="text/css">
        <link href="../css/navbar.css" rel=stylesheet type="text/css">
        <link href="../css/comment.css" rel=stylesheet type="text/css">
        <link href="../css/emoji.css" rel=stylesheet type="text/css">
        <script src="../js/navbar.js"></script>
        <script src="../js/emoji.js"></script>
    </head>
    <body>
        <?= $data['navbar'] ?>
        <div class="m-5 p-4 border border-3 rounded-3 self-border">
            <div class="mx-4 mb-4">
                <div class="mb-4 fs-4">個人資料</div>
                <div class="mb-2 fs-5"><i class="me-2 fas fa-user"></i><?= htmlspecialchars($data['user']['name']) ?></div>
                <div class="mb-2 fs-5"><i class="me-2 fas fa-user-clock"></i><?= htmlspecialchars($data['user']['create_time']) ?></div>
            </div>
        </div>
        <hr>
        <?= $data['user']['id'] === $_SESSION['user_id'] ? $data['addComment'] : '' ?>
        <div class="mx-5 my-4 fs-2">
            個人留言
        </div>
        <?= $data['comments'] ?>
    </body>
</html>
