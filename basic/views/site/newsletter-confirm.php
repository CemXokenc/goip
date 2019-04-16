<?php

namespace FSG;
use Yii;
use yii\db\Query;
use yii\helpers\Html;

for($i = 0; $i < count($model->phones); $i++){

    $rows = Yii::$app->db->createCommand("SELECT * FROM phonelist JOIN groupname ON groupid = group_id WHERE group_name = '".$model->phones[$i]."'")->queryAll();
    foreach($rows as $row){
        $argv = ['send.php', $row['phone'], $model->mail];
        require_once (Yii::$app->basePath.'\vendor\goip\send.php');
    }

}