<!DOCTYPE html>
<html lang="zh-TW" style="scroll-behavior: auto;">
    <head>
        <?= $data['head'] ?>
        <link href="assets/icon.ico" rel="icon" type="image/x-icon">
        <link href="css/style.css" rel=stylesheet type="text/css">
        <link href="css/navbar.css" rel=stylesheet type="text/css">
        <link href="css/comment.css" rel=stylesheet type="text/css">
        <link href="css/emoji.css" rel=stylesheet type="text/css">
        <script src="js/navbar.js"></script>
        <script src="js/emoji.js"></script>
    </head>
    <body>
        <?= $data['navbar'] ?>
        <div id="content">
            <?= $data['addComment'] ?>
            <div class="mx-5 my-4 fs-2">
                留言區
            </div>
            <?= $data['comments'] ?>
        </div>
    </body>
</html>
