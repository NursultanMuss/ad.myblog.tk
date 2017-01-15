<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProgPostsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programming-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'resource') ?>

    <?= $form->field($model, 'res_link') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'entry_image') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'date_of_publication') ?>

    <?php // echo $form->field($model, 'full_text') ?>

    <?php // echo $form->field($model, 'meta_desc') ?>

    <?php // echo $form->field($model, 'meta_key') ?>

    <?php // echo $form->field($model, 'hits') ?>

    <?php // echo $form->field($model, 'hide') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
