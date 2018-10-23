<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reward_code".
 *
 * @property int $id 序号id
 * @property string $content 激活码内容
 * @property string $money 奖励金额
 * @property string $trash_id 回收装置序号
 * @property string $user_id 用户id
 */
class RewardCode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reward_code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['money', 'trash_id', 'user_id'], 'integer'],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'money' => 'Money',
            'trash_id' => 'Trash ID',
            'user_id' => 'User ID',
        ];
    }
}
