<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Programming */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Programming',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Programmings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="programming-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
