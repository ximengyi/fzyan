<?php

namespace api\controllers;

use common\models\Device;
use common\models\RewardCode;
use yii\rest\ActiveController;
use YII;



/**
 * DeviceController implements the CRUD actions for Device model.
 */
class DeviceController extends ActiveController
{
    public $modelClass = 'common\models\Device';
    public $capacity = 90;

    public function actionSearch()
    {
        $name =  Yii::$app->request->get('name');
        $weight =  Yii::$app->request->get('weight');
        $state  = Yii::$app->request->get('state');

        $device_one = Device::find()->where(['=','name',$name])->one();

        $device_one->state =(string)round((((90 - $state)/90)*100));
        if(!empty($device_one)){
            $reward_code = new RewardCode();
            $reward_code->content = uniqid();
            $reward_code->money = round((($weight/500) * $device_one->price));
            $reward_code->trash_id = $device_one->id;
            $reward_code->created_at = time();
          //  $device_one->validate();
            // var_dump($device_one->getErrors());die;
            if($reward_code->create_code($reward_code,$device_one)){

                return ['status'=>200,'code'=>$reward_code->content,'money'=>$reward_code->money];

            }
        }

      return  ['status'=>500,'message'=>'failed'];

    }
}
