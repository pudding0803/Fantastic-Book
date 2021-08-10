<?php
foreach ($data['comments'] as $comment) {
    $emojis = $comment['emojis'];
    $replies = $comment['replies'];
?>
<div class="mx-5 mb-5 px-5 py-5 border border-3 rounded-3 self-border" id="comment-<?= $comment['id'] ?>">
    <div class="comment-content">
        <div class="d-flex">
            <div class="me-auto mb-4 fs-4">
                <a href="/profile/<?= $comment['user_id'] ?>" class="user-link">
                    <i class="me-2 fas fa-user"></i><?= htmlspecialchars($comment['name']) ?>
                </a>
            </div>
            <div class="mb-4 fs-4"><i class="me-2 fas fa-clock"></i><?= htmlspecialchars($comment['time']) ?></div>
        </div>
        <div class="mb-4 fs-4"><i class="me-2 fas fa-comment-dots"></i><?= htmlspecialchars($comment['content']) ?></div>
    </div>
    <form action="/doSetEmoji" method="post">
        <input type="hidden" name="comment_emoji" value="<?= $comment['id'] ?>-0">
        <div class="my-3 btn-group container" role="group" aria-label="Basic outlined">
            <button type="button" class="btn py-2 emoji-btn" id="<?= $comment['id'] ?>-1">
                <div class="col text-center fs-3">&#128077;</div>
                <div class="col text-center fs-4"><?= $emojis[0] ?></div>
            </button>
            <button type="button" class="btn py-2 emoji-btn" id="<?= $comment['id'] ?>-2">
                <div class="col text-center fs-3">&#10084;</div>
                <div class="col text-center fs-4"><?= $emojis[1] ?></div>
            </button>
            <button type="button" class="btn py-2 emoji-btn" id="<?= $comment['id'] ?>-3">
                <div class="col text-center fs-3">&#128514;</div>
                <div class="col text-center fs-4"><?= $emojis[2] ?></div>
            </button>
            <button type="button" class="btn py-2 emoji-btn" id="<?= $comment['id'] ?>-4">
                <div class="col text-center fs-3">&#128558;</div>
                <div class="col text-center fs-4"><?= $emojis[3] ?></div>
            </button>
            <button type="button" class="btn py-2 emoji-btn" id="<?= $comment['id'] ?>-5">
                <div class="col text-center fs-3">&#128546;</div>
                <div class="col text-center fs-4"><?= $emojis[4] ?></div>
            </button>
            <button type="button" class="btn py-2 emoji-btn" id="<?= $comment['id'] ?>-6">
                <div class="col text-center fs-3">&#128545;</div>
                <div class="col text-center fs-4"><?= $emojis[5] ?></div>
            </button>
        </div>
    </form>
    <hr>
    <?php
    $odd = false;
    foreach ($replies as $reply) {
    ?>
    <div class="p-3 reply-content <?= ($odd = !$odd) ? 'reply-light' : 'reply-dark' ?>">
        <div class="d-flex">
            <div class="me-auto mb-2 fs-6">
                <a href="/profile/<?= $reply['user_id'] ?>" class="user-link">
                    <i class="me-2 fas fa-user"></i><?= htmlspecialchars($reply['name']) ?>
                </a>
            </div>
            <div class="mb-2 fs-6"><i class="me-2 fas fa-clock"></i><?= htmlspecialchars($reply['time']) ?></div>
        </div>
        <div class="fs-6"><i class="me-2 fas fa-comment-dots"></i><?= htmlspecialchars($reply['content']) ?></div>
    </div>
    <hr>
    <?php
    }
    ?>
    <form action="/doAddReply" method="post">
        <input type="hidden" id="comment_id" name="comment_id" value="<?= $comment['id'] ?>">
        <div class="d-flex">
            <div class="form-floating me-auto col-10">
                <textarea class="form-control self-border" placeholder="輸入回覆內容" id="reply" name="reply" style="resize: none;" maxlength="140" required></textarea>
                <label for="reply">輸入回覆內容</label>
            </div>
            <div class="d-flex align-items-center">
                <button type="submit" class="me-3 btn fs-5 self-button"><i class="me-2 fas fa-reply"></i>回覆</button>
            </div>
        </div>
    </form>
</div>
<?php
}
?>
