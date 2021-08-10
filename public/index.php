<?php
use App\Controllers\PageController;
use App\Controllers\UserController;
use App\Controllers\CommentController;
use App\Controllers\ReplyController;
use App\Handlers\PersonalEmojiHandler;
use App\Handlers\SessionHandler;
use App\Middlewares\UserSignIn;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Slim\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

$app->group('/', function (RouteCollectorProxy $home) {

    $home->get('', PageController::class . ':showHome');

    $home->get('profile/{userId}', PageController::class . ':showProfile');

    $home->get('doSignOut', UserController::class . ':signOut');

    $home->post('doAddComment', CommentController::class . ':addComment');

    $home->post('doAddReply', ReplyController::class . ':addReply');

    $home->post('doEmojiHandle', PersonalEmojiHandler::class . ':handle');

    $home->post('doSetEmoji', CommentController::class . ':setEmoji');

    $home->post('doSessionHandle', SessionHandler::class . ':getUserId');

})->add(UserSignIn::class . ':checkIfNotSignedIn');

$app->get('/sign-up', PageController::class . ':showSignUp')->add(UserSignIn::class . ':checkIfSignedIn');

$app->get('/sign-in', PageController::class . ':showSignIn')->add(UserSignIn::class . ':checkIfSignedIn');

$app->post('/doSignUp', UserController::class . ':signUp');

$app->post('/doSignIn', UserController::class . ':signIn');

$app->run();
