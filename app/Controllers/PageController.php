<?php
namespace App\Controllers;

use App\View;
use App\Views\CompenentRender;
use App\Views\LayoutRender;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PageController
{
    public static function showHome(Request $request, Response $response, $args): Response
    {
        $page = View::render('pages/index.php', [
            'head' => CompenentRender::getHead(),
            'comments' => CompenentRender::getAllComment(),
            'addComment' => CompenentRender::getAddComment(),
            'navbar' => LayoutRender::getNavbar(),
            'user' => UserController::getDataByUserId($_SESSION['user_id']),
            'emoji' => CommentController::getPersonalEmoji($_SESSION['user_id']),
        ]);
        $response->getBody()->write($page);
        return $response;
    }

    public static function showProfile(Request $request, Response $response, $args): Response
    {
        $page = View::render('pages/profile.php', [
            'head' => CompenentRender::getHead(),
            'comments' => CompenentRender::getPersonalComment($args['userId']),
            'addComment' => CompenentRender::getAddComment(),
            'navbar' => LayoutRender::getNavbar(),
            'user' => UserController::getDataByUserId($args['userId']),
        ]);
        $response->getBody()->write($page);
        return $response;
    }

    public static function showSignUp(Request $request, Response $response, $args): Response
    {
        $page = View::render('pages/sign-up.php', [
            'head' => CompenentRender::getHead(),
        ]);
        $response->getBody()->write($page);
        return $response;
    }

    public static function showSignIn(Request $request, Response $response, $args): Response
    {
        $page = View::render('pages/sign-in.php', [
            'head' => CompenentRender::getHead(),
        ]);
        $response->getBody()->write($page);
        return $response;
    }
}
