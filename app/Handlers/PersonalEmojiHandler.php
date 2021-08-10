<?php
namespace App\Handlers;

use App\Controllers\CommentController;
use App\Models\Session;
use Slim\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PersonalEmojiHandler
{
    public static function handle(Request $request, Response $response): Response
    {
        Session::start();
        echo json_encode(CommentController::getPersonalEmoji());
        return $response->withHeader('Content-Type', 'application/json');
    }
}
