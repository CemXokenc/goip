<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "groupname".
 *
 * @property int $group_id
 * @property string $group_name
 */
class Groupname extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groupname';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_name'], 'required'],
            [['group_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'group_name' => 'Group Name',
        ];
    }
}
