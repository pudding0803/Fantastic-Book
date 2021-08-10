<?php
namespace App\Middlewares;

use App\Models\Session;
use Slim\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;


class UserSignIn
{
    public function checkIfSignedIn(Request $request, RequestHandler $handler): mixed
    {
        Session::start();
        $response = new Response();

        if (isset($_SESSION['user_id'])) {
            return $response->withHeader('Location', '/');
        } else {
            return $handler->handle($request);
        }
    }

    public function checkIfNotSignedIn(Request $request, RequestHandler $handler): mixed
    {
        Session::start();
        $response = new Response();

        if (isset($_SESSION['user_id'])) {
            return $handler->handle($request);
        } else {
            return $response->withHeader('Location', '/sign-in');
        }
    }
}
