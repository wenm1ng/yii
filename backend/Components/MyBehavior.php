<?php
namespace backend\components;

use Yii;

class MyBehavior extends \yii\base\ActionFilter
{
    public function beforeAction ($action)
    {
        var_dump(111);
        $currentRequestRoute = $action->getUniqueId();
        if (!Yii::$app->user->can('/' . $currentRequestRoute)) {
            throw new \yii\web\ForbiddenHttpException("没权限访问.");
        }
        
        return true;
    }

    public function isGuest ()
	{
	    return Yii::$app->user->isGuest;
	}
}