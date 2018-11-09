<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $models dmitxe\yii2\wiki\models\WikiArticle[] */

$this->title = Yii::t('app', 'Wiki Articles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wiki-article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if (($this->context->module->editorRole && Yii::$app->user->can($this->context->module->editorRole))
    || !$this->context->module->editorRole) { ?>
    <p>
        <?= Html::a(Yii::t('app', 'Create Wiki Article'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php } ?>

    <?php /*echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            'slug',
            'title',
            'content:ntext',
            //'created_user_id',
            //'created_by',
            //'updated_user_id',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);*/ ?>



    <ul class="nav">
        <?php
        $category_id = 0;
        foreach ($models as $model) {
            if ($model->category_id != $category_id) {
                $category_id = $model->category_id;
                echo '<li class="nav-header">'.$model->category->title.'</li>';
            }
            echo '<li>';
            echo Html::a($model->title, ['view', 'slug'=> $model->slug]);
            echo '</li>';
        }
        ?>
    </ul>
</div>