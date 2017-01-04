<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BlogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'title')?>


<!--    --><?//= $form->field($model, 'is_release') ?>

<!--    --><?//= $form->field($model, 'title') ?>

<!--    --><?//= $form->field($model, 'category') ?>

<!--    --><?//= $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'intro_text') ?>

    <?php // echo $form->field($model, 'full_text') ?>

<!--    --><?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'meta_desc') ?>

    <?php // echo $form->field($model, 'meta_key') ?>

    <?php // echo $form->field($model, 'hits') ?>

    <?php // echo $form->field($model, 'hide') ?>

    <?php // echo $form->field($model, 'no_form') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Найти'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Сбросить'), ['class' => 'btn btn-default']) ?>
        <?= Html::button(Html::a('<span class="glyphicon glyphicon-arrow-right">Вернуться</span>',
            Url::toRoute(''), ['style' => 'color:#000'] ), ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
