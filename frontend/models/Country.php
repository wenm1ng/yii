<?php 
	namespace frontend\models;

	use yii\db\ActiveRecord;

	Class Country extends ActiveRecord{
		public static function tableName()
		{
		    return "Country";
		}
	}
 ?>