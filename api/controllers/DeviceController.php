<?php

namespace api\controllers;

use common\models\Device;
use common\models\RewardCode;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\filters\ContentNegotiator;
use YII;



/**
 * DeviceController implements the CRUD actions for Device model.
 */
class DeviceController extends ActiveController
{


    public $modelClass = 'common\models\Device';
    public $capacity = 66;




    public function behaviors()
    {
        $behaviors = parent::behaviors();
        unset($behaviors['authenticator']);

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                // restrict access to
                'Access-Control-Request-Method' => ['*'],
                // Allow only POST and PUT methods
                'Access-Control-Request-Headers' => ['*'],
                // Allow only headers 'X-Wsse'
                'Access-Control-Allow-Credentials' => true,
                // Allow OPTIONS caching
                'Access-Control-Max-Age' => 3600,
                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
            ],
        ];

        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON
            ]
        ];
        return $behaviors;
    }







    public function actionSearch()
    {
        $name =  Yii::$app->request->get('name');
        $weight =  Yii::$app->request->get('weight');
        $state  = Yii::$app->request->get('state');

        if($state>70 || $weight>3000){

            return  ['status'=>500,'message'=>"检测到的数据异常，请重试！","state"=>$state,"weight"=>$weight];

        }

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

      return  ['status'=>500,'message'=>"failed"];

    }
}
