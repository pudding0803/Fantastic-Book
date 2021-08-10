<?php
namespace App\Views;

use App\View;
use App\Controllers\CommentController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CompenentRender
{
    public static function getHead(): string
    {
        return View::render('compenents/head.php');
    }

    public static function getAddComment(): string
    {
        return View::render('compenents/addComment.php');
    }

    public static function getAllComment(): string
    {
        return View::render('compenents/comments.php', [
            'comments' => CommentController::getAllComments(),
        ]);
    }

    public static function getPersonalComment($userId): string
    {
        return View::render('compenents/comments.php', [
            'comments' => CommentController::getPersonalCommentsById($userId),
        ]);
    }
}
