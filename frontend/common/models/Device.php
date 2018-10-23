<?php

namespace app\common\models;

use Yii;

/**
 * This is the model class for table "device".
 *
 * @property int $id 序号
 * @property string $name 唯一标识
 * @property string $address 投放地址
 * @property int $state 满溢状态
 * @property int $price 回收价格
 */
class Device extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'device';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'required'],
            [['price'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 255],
            [['state'], 'string', 'max' => 4],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'state' => 'State',
            'price' => 'Price',
        ];
    }
}
