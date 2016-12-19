<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\WorksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="works-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'img') ?>

    <?= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'client') ?>

    <?php // echo $form->field($model, 'details') ?>

    <?php // echo $form->field($model, 'technology') ?>

    <?php // echo $form->field($model, 'testimonial') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
