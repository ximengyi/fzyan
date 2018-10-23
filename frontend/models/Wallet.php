<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "wallet".
 *
 * @property int $id id
 * @property int $user_id 用户id
 * @property string $username 用户名
 * @property string $usermoney 用户金额
 */
class Wallet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wallet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'usermoney'], 'integer'],
            [['username'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'username' => 'Username',
            'usermoney' => 'Usermoney',
        ];
    }
}
