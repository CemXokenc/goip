<?php

namespace app\models;

use yii\base\Model;

class SingleForm extends Model
{
    public $phone;
    public $mail;

    public function rules()
    {
        return [
            [['phone', 'mail'], 'required'],
        ];
    }
}