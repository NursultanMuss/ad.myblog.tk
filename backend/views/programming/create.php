<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Programming */

$this->title = Yii::t('app', 'Create Programming');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Programmings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programming-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
