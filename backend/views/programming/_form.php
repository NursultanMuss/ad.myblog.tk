<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Programming */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programming-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'is_release')->textInput() ?>

    <?= $form->field($model, 'resource')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'res_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'entry_image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::className(),[
//        'language' => 'ru',
        'dateFormat' => 'dd-MM-yyyy',
        'options' => ['class' => 'form-control'],
    ]);?>

<!--    --><?//= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'meta_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_key')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'hits')->textInput() ?>

<!--    --><?//= $form->field($model, 'hide')->textInput() ?>

<!--    --><?//= $form->field($model, 'no_form')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
