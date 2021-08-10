<?php
namespace App\Controllers;

use App\Models\Database;
use App\Models\Session;
use Slim\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use PDO;

class UserController
{
    public static function signUP(Request $request, Response $response): Response
    {
        $req = $request->getParsedBody();
        if (!isset($req['name']) || !isset($req['account']) || !isset($req['password']) || !isset($req['password2'])) {
            echo '有欄位尚未填寫';
            return $response->withHeader('Location', '/sign-up');
        }

        if ($req['password'] !== $req['password2']) {
            echo '兩次輸入的密碼不相同';
            $response->withRedirect('/sign-up');
            return $response->withHeader('Location', '/sign-up');
        }

        $name = $req['name'];
        $account = $req['account'];
        $password = password_hash($req['password'], PASSWORD_DEFAULT);
        $password2 = password_hash($req['password2'], PASSWORD_DEFAULT);

        $sql = 'SELECT `name` FROM `user` WHERE `name` = :name';
        $stmt = Database::getConnect()->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount()) {
            echo('使用者名稱已被使用');
            return $response->withHeader('Location', '/sign-up');
        }

        $sql = 'SELECT `account` FROM `user` WHERE `account` = :account';
        $stmt = Database::getConnect()->prepare($sql);
        $stmt->bindValue(':account', $account, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount()) {
            echo('使用者帳號已被使用');
            return $response->withHeader('Location', '/sign-up');
        }

        $sql = 'INSERT INTO `user`(`name`, `account`, `password`) VALUES (:name, :account, :password)';
        $sth = Database::getConnect()->prepare($sql);
        $sth->bindValue(':name', $name, PDO::PARAM_STR);
        $sth->bindValue(':account', $account, PDO::PARAM_STR);
        $sth->bindValue(':password', $password, PDO::PARAM_STR);
        $sth->execute();

        Session::start();
        $_SESSION['user_id'] = Database::getConnect()->lastInsertId();
        return $response->withHeader('Location', '/');
    }

    public static function signIn(Request $request, Response $response): Response
    {
        if (!isset($_POST['account']) || !isset($_POST['password'])) {
            echo '有欄位尚未填寫！';
            return $response->withHeader('Location', '/sign-in');
        }

        $account = $_POST['account'];
        $password = $_POST['password'];

        $sql = 'SELECT `id`, `account`, `password` FROM `user`';
        $stmt = Database::getConnect()->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($users as $user) {
            if ($user['account'] === $account && password_verify($password, $user['password'])) {
                Session::start();
                $_SESSION['user_id'] = $user['id'];
                return $response->withHeader('Location', '/');
            }
        }
        echo '帳號或密碼錯誤！';
        return $response->withHeader('Location', '/sign-in');
    }

    public static function signOut(Request $request, Response $response): Response
    {
        Session::destroy();
        return $response->withHeader('Location', '/sign-in');
    }

    public static function getDataByUserId($userId): array
    {
        $sql = 'SELECT * FROM `user` WHERE `id` = :user_id LIMIT 1';
        $stmt = Database::getConnect()->prepare($sql);
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?? array();
    }
}
