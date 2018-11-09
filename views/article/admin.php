<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel dmitxe\yii2\wiki\models\WikiArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Wiki Articles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wiki-article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Wiki Article'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            'slug',
            'title',
            //'content:ntext',
            'created_user_id',
            'created_by',
            'updated_user_id',
            'updated_by',

            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return \yii\helpers\Url::toRoute(['view', 'slug' => $model->slug]);
                    } else {
                        return \yii\helpers\Url::toRoute([$action, 'id' => $model->id]);
                    }
                }
                ],
        ],
    ]); ?>
</div>
