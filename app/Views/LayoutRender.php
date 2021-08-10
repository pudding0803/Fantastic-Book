<?php
namespace App\Views;

use App\View;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LayoutRender
{
    public static function getNavbar(): string
    {
        return View::render('layouts/navbar.php', [
            'userId' => $_SESSION['user_id'],
        ]);
    }
}
