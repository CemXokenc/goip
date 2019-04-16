<?php

namespace FSG;
use Yii;

$api_user = 'admin';
$api_password = 'admin_password';

$request = Yii::$app->request;
$post = $request->post();
$user = $post['user'];
$password = $post['password'];
$mail = $post['mail'];
$phone = $post['phone'];

if ($user == $api_user and $password == $api_password) {
    $argv = ['send.php', $phone, $mail];
    require_once (Yii::$app->basePath.'\vendor\goip\send.php');
} else {
    echo 'ERROR';
}