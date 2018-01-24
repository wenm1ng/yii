<?php 
	namespace frontend\models;

	use yii\db\ActiveRecord;

	Class Article extends ActiveRecord{
		public static function tableName()
		{
		    return "blog_article";
		}
	}
 ?>