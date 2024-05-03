<?php
session_start();
require_once(__DIR__ .'/variables.php');
require_once(__DIR__ .'/functions.php');


$loginPostData = $_POST;

if (isset($loginPostData['email']) && isset($loginPostData['password'])) {
    if (!filter_var($loginPostData['email'], FILTER_VALIDATE_EMAIL)) {
      $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Il faut entrer un email valide.';
    } else {
        foreach ($users as $user) {
            if (
                $user['email'] === $loginPostData['email'] &&
                $user['password'] === $loginPostData['password']
            ) {
                $_SESSION['LOGGED_USER'] = [
                    'email' => $user['email'],
                    'user_id' => $user['user_id'],
                ];
            }
        }
        if (!isset($_SESSION['LOGGED_USER'])) {
            $_SESSION['LOGIN_ERROR_MESSAGE'] = sprintf(
                'Les infos ne permettent pas de vous identifier : (%s/%s)',

                $loginPostData['email'],
                strip_tags($loginPostData['password'])
            );
        }
    }
}
redirectToUrl('index.php');

