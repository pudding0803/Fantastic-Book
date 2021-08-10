<?php
namespace App\Controllers;

use App\Controllers\ReplyController;
use App\Models\Database;
use App\Models\Session;
use Slim\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use PDO;

class CommentController
{
    public static function addComment(Request $request, Response $response): Response
    {
        $req = $request->getParsedBody();
        if (!isset($req['comment'])) {
            echo '留言內容不得為空';
            return $response->withHeader('Location', '/');
        }

        $content = $_POST['comment'];
        $sql = 'INSERT INTO `comment`(`user_id`, `content`) VALUES (:user_id, :content)';
        $sth = Database::getConnect()->prepare($sql);
        $sth->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $sth->bindValue(':content', $content, PDO::PARAM_STR);
        $sth->execute();
        return $response->withHeader('Location', '/#comment-' . Database::getConnect()->lastInsertId());
    }

    public static function getAllComments(): array
    {
        $sql = 'SELECT `user`.`name`, `comment`.`id`, `comment`.`user_id`, `comment`.`content`, `comment`.`time` FROM `user`
                RIGHT JOIN `comment` ON `user`.`id` = `comment`.`user_id`
                ORDER BY `time` DESC LIMIT 100';
        $stmt = Database::getConnect()->prepare($sql);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($comments); $i++) {
            $comments[$i]['emojis'] = self::getEmojiByCommentId($comments[$i]['id']);
            $comments[$i]['replies'] = ReplyController::getRepliesByCommentId($comments[$i]['id']);
        }
        return $comments ?? array();
    }

    public static function getPersonalCommentsById($userId): array
    {
        $sql = 'SELECT `user`.`name`, `comment`.`id`, `comment`.`user_id`, `comment`.`content`, `comment`.`time` FROM `user`
                RIGHT JOIN `comment` ON `user`.`id` = `comment`.`user_id`
                WHERE `comment`.`user_id` = :user_id ORDER BY `time` DESC LIMIT 100';
        $stmt = Database::getConnect()->prepare($sql);
        $stmt->bindValue(':user_id', $userId);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($comments); $i++) {
            $comments[$i]['emojis'] = self::getEmojiByCommentId($comments[$i]['id']);
            $comments[$i]['replies'] = ReplyController::getRepliesByCommentId($comments[$i]['id']);
        }
        return $comments ?? array();
    }

    public static function setEmoji(Request $request, Response $response): Response
    {
        if (!isset($_POST['comment_emoji'])) {
            return $response->withHeader('Location', '/');
        }

        $commentId = explode('-', $_POST['comment_emoji'])[0];
        $emoji = explode('-', $_POST['comment_emoji'])[1];

        $sql = 'SELECT `user_id`, `comment_id`, `emoji` FROM `emoji` WHERE `user_id`=:user_id AND `comment_id`=:comment_id';
        $stmt = Database::getConnect()->prepare($sql);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->bindValue(':comment_id', $commentId, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount()) {
            $sql = 'UPDATE `emoji` SET `user_id`=:user_id, `comment_id`=:comment_id, `emoji`=:emoji WHERE `user_id`=:user_id AND `comment_id`=:comment_id';
            $sth = Database::getConnect()->prepare($sql);
            $sth->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
            $sth->bindValue(':comment_id', $commentId, PDO::PARAM_INT);
            $sth->bindValue(':emoji', $emoji, PDO::PARAM_INT);
            $sth->execute();
        } else {
            $sql = 'INSERT INTO `emoji`(`user_id`, `comment_id`, `emoji`) VALUES (:user_id, :comment_id, :emoji)';
            $sth = Database::getConnect()->prepare($sql);
            $sth->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
            $sth->bindValue(':comment_id', $commentId, PDO::PARAM_INT);
            $sth->bindValue(':emoji', $emoji, PDO::PARAM_INT);
            $sth->execute();
        }

        return $response->withHeader('Location', '/#comment-' . $commentId);
    }

    public static function getPersonalEmoji(): array
    {
        $sql = 'SELECT `comment_id`, `emoji` FROM `emoji` WHERE `user_id` = :user_id';
        $stmt = Database::getConnect()->prepare($sql);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();
        $emojis = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $emojis ?? array();
    }

    public static function getEmojiByCommentId($commentId): array
    {
        $emojis = array();
        for ($index = 1; $index <= 6; $index++) {
            $sql = 'SELECT COUNT(*) FROM `emoji` WHERE `comment_id` = :comment_id AND `emoji` = :index LIMIT 1';
            $stmt = Database::getConnect()->prepare($sql);
            $stmt->bindValue(':comment_id', $commentId, PDO::PARAM_INT);
            $stmt->bindValue(':index', $index, PDO::PARAM_INT);
            $stmt->execute();
            $count = $stmt->fetch(PDO::FETCH_NUM)[0];
            array_push($emojis, $count);
        }
        return $emojis ?? array();
    }
}
