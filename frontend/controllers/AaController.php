<?php 
namespace frontend\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use frontend\models\Country;

Class AaController extends Controller{

	public function actionIndex(){
		echo 1;
	}

	public function actionSay(){
		$query = Country::find();

		$pagination = new Pagination([
			'defaultPageSize'=>5,
			'totalCount'=>$query->count(),
			]);
   		// echo 1;exit;
   		$countries = $query->orderBy('name')
   			->offset($pagination->offset)
   			->limit($pagination->limit)
   			->all();
   			
   		return $this->render('say',[
   			'countries' =>$countries,
   			'pagination'=>$pagination
   			]);
	}
}
 ?>