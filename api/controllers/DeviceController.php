<?php

namespace api\controllers;

use common\models\Device;
use common\models\RewardCode;
use yii\rest\ActiveController;



/**
 * DeviceController implements the CRUD actions for Device model.
 */
class DeviceController extends ActiveController
{
    public $modelClass = 'common\models\Device';

    public function actionSearch()
    {
        $name =  $_GET['name'] ?? '';
        $weight =  $_GET['weight'] ?? '';
        $state  = $_GET['state'] ?? '';
        $device_one = Device::find()->where(['=','name',$name])->one();

        $device_one->state = $state;
        if(!empty($device_one)){
            $reward_code = new RewardCode();
            $reward_code->content = uniqid();
            $reward_code->money = $weight * $device_one->price;
            $reward_code->trash_id = $device_one->id;
            $reward_code->created_at = time();

            if($reward_code->create_code($reward_code,$device_one)){

                return ['status'=>200,'code'=>$reward_code->content,'money'=>$reward_code->money];

            }
        }

      return  ['status'=>500,'message'=>'failed'];

    }
}
