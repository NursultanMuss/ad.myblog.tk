<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Programming */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programming-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'resource')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'res_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'entry_image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_publication')->widget(
            DatePicker::className(), [
                // inline too, not bad
                 'inline' => false,
                 // modify template for custom rendering
//                'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-m-d'
                ]
            ]);
    ?>

    <?= $form->field($model, 'full_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'meta_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_key')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
