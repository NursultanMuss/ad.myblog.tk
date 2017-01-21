<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\Works */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="works-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']],['enableAjaxValidation' => true]); ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php
    if( file_exists(Yii::getAlias('@frontend'.'/web'. $model->img)))
    {
        echo Html::img($model->img, ['class'=>'img-responsive']);
        echo $form->field($model,'del_img')->checkBox(['class'=>'span-1']);
    }
    ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropDownList([ '1' => '1', '0' => '0']) ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'details')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'technology')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'testimonial')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Обновить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
