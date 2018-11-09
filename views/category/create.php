<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model dmitxe\yii2\wiki\models\WikiCategory */

$this->title = Yii::t('app', 'Create Wiki Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wiki Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wiki-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
