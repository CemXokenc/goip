<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phonelist".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int $groupid
 */
class Phonelist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phonelist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'groupid'], 'required'],
            [['groupid'], 'integer'],
            [['name', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'groupid' => 'Groupid',
        ];
    }
}
