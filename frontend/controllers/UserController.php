<?php
namespace frontend\controllers;
use yii\rest\ActiveController;
use yii\web\Controller;
class UserController extends Controller{
    public $modelClass = 'frontend\models\User';

    public function actionIndex(){
    	echo 1;exit;
    }
}