<?php

namespace app\models;

use yii\base\Model;

class NewsletterForm extends Model
{
    public $phones;
    public $mail;

    public function rules()
    {
        return [
            [['phones', 'mail'], 'required'],
        ];
    }
}