<?php

namespace frontend\controllers;

use Yii;
use frontend\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionSignup ()
	{
	    // 实例化一个表单模型，这个表单模型我们还没有创建，等一下后面再创建
	    $model = new \frontend\models\SignupForm();

	    // 下面这一段if是我们刚刚分析的第二个小问题的实现，下面让我具体的给你描述一下这几个方法的含义吧
	    // $model->load() 方法，实质是把post过来的数据赋值给model的属性
	    // $model->signup() 方法, 是我们要实现的具体的添加用户操作
	    if ($model->load(Yii::$app->request->post()) && $model->signup()) {
	        // 添加完用户之后，我们跳回到index操作即列表页
	        return $this->redirect(['index']);
	    }

	    // 下面这一段是我们刚刚分析的第一个小问题的实现
	    // 渲染添加新用户的表单
	    return $this->render('signup', [
	        'model' => $model,
	    ]);
	}

    /**
     * Lists all Country models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new CountrySearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index');
    }

    /**
     * Displays a single Country model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Country model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Country();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->code]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Country model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->code]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Country model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Country model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Country the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Country::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}