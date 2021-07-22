<?php
namespace App\Controllers;

use App\View;
use App\Views\ListRender;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    public static function home(Request $request, Response $response, $args): Response
    {
        $page = View::render('app.php', [
            'title' => 'Nitrogenous Base',
            'list' => self::listTemplate()
        ]);
        $response->getBody()->write($page);
        return $response;
    }

    public static function listTemplate(): string
    {
        $nitroBase = ['Adenine', 'Thymine', 'Guanine', 'Cytosine', 'Uracil'];
        $list = new ListRender($nitroBase);
        $list->ordered(false);
        return $list->render();
    }
}
