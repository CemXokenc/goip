<?php

namespace FSG;
use Yii;

$argv = ['send.php', $model->phone, $model->mail];
require_once (Yii::$app->basePath.'\vendor\goip\send.php');