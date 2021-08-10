<?php
namespace App\Handlers;

use App\Models\Session;
use Slim\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SessionHandler
{
    public static function getUserId(Request $request, Response $response): Response
    {
        Session::start();
        echo json_encode($_SESSION['user_id']);
        return $response->withHeader('Content-Type', 'application/json');
    }
}
