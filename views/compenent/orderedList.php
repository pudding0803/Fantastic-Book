<ol>
    <?php foreach ($data['list'] as $li) { ?>
        <li><?= htmlspecialchars($li ?? '') ?></li>
    <?php } ?>
</ol>
