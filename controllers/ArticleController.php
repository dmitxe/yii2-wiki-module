<?php

namespace dmitxe\yii2\wiki\controllers;

use Yii;
use dmitxe\yii2\wiki\models\WikiArticle;
use dmitxe\yii2\wiki\models\WikiArticleSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for WikiArticle model.
 */
class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'admin', 'create', 'view', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['admin', 'create', 'update', 'delete'],
                        'roles' => $this->module->editorRole ? [$this->module->editorRole] : ['?', '@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view'],
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all WikiArticle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $models = WikiArticle::find()->orderBy(['category_id' => SORT_ASC, 'title' => SORT_ASC])->all();

        return $this->render('index', [
            'models' => $models,
        ]);
    }

    /**
     * Lists all WikiArticle models.
     * @return mixed
     */
    public function actionAdmin()
    {
        $this->layout = $this->module->editorLayout;
        $searchModel = new WikiArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WikiArticle model.
     * @param string $slug
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($slug)
    {
        $model = WikiArticle::findOne(['slug' => $slug]);
        if ($model === null) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new WikiArticle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = $this->module->editorLayout;
        $model = new WikiArticle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'slug' => $model->slug]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing WikiArticle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = $this->module->editorLayout;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'slug' => $model->slug]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WikiArticle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WikiArticle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WikiArticle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WikiArticle::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
