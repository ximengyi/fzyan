<?php

namespace api\controllers;

use common\models\Device;
use yii\rest\ActiveController;



/**
 * DeviceController implements the CRUD actions for Device model.
 */
class DeviceController extends ActiveController
{
    public $modelClass = 'common\models\Device';

    public function actionSearch()
    {
        $test = $_GET['test'];

        $name =  $_GET['name'];
        return [$test,$name];

        return Device::find()->where(['=','name',$name])->one();
    }
}
