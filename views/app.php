<!DOCTYPE html>
<html lang="<?= htmlspecialchars($data['lang'] ?? 'zh-TW') ?>">
    <head>
        <title><?= htmlspecialchars($data['title'] ?? 'App1') ?></title>
    </head>
    <body>
        <h2><?= htmlspecialchars($data['title'] ?? 'App1') ?></h2>
        <?= $data['list'] ?? '' ?>
    </body>
</html>
