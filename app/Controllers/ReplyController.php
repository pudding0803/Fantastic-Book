<?php
namespace App\Controllers;

use App\Models\Database;
use Slim\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use PDO;

class ReplyController
{
    public static function addReply(Request $request, Response $response): Response
    {
        $req = $request->getParsedBody();
        if (!isset($_POST['reply'])) {
            echo '回覆內容不得為空';
            return $response->withHeader('Location', '/');
        }

        $commentId = $_POST['comment_id'];
        $content = $_POST['reply'];
        $sql = 'INSERT INTO `reply`(`user_id`, `comment_id`, `content`) VALUES (:user_id, :comment_id, :content)';
        $sth = Database::getConnect()->prepare($sql);
        $sth->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $sth->bindValue(':comment_id', $commentId, PDO::PARAM_INT);
        $sth->bindValue(':content', $content, PDO::PARAM_STR);
        $sth->execute();
        return $response->withHeader('Location', '/#comment-' . $commentId);
    }

    public static function getRepliesByCommentId($commentId): array
    {
        $sql = 'SELECT `user`.`name`, `reply`.`id`, `reply`.`user_id`, `reply`.`content`, `reply`.`time` FROM `user`
                RIGHT JOIN `reply` ON `user`.`id` = `reply`.`user_id`
                WHERE `reply`.`comment_id` = :comment_id ORDER BY `time` ASC';
        $stmt = Database::getConnect()->prepare($sql);
        $stmt->bindValue(':comment_id', $commentId, PDO::PARAM_INT);
        $stmt->execute();
        $replies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $replies ?? array();
    }
}
