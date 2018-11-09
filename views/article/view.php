<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model dmitxe\yii2\wiki\models\WikiArticle */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wiki Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="wiki-article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($this->context->module->editorRole && Yii::$app->user->can($this->context->module->editorRole)) { ?>
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php } ?>

    <?php /*echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_id',
            'slug',
            'title',
            'content:ntext',
            'created_user_id',
            'created_by',
            'updated_user_id',
            'updated_by',
        ],
    ])*/ ?>

    <?php echo Parsedown::instance()->parse($model->content) ?>

</div>
