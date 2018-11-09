<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model dmitxe\yii2\wiki\models\WikiArticle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wiki-article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(\dmitxe\yii2\wiki\models\WikiCategory::getFullList()) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	<?php echo $form->field($model, 'content')->widget(\yii2mod\markdown\MarkdownEditor::class, [
		'editorOptions' => [
			'showIcons' => ["code", "table"],
		],
	]); ?>
	
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
