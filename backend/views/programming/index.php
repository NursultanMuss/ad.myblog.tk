<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProgPostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Programmings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programming-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Programming'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'is_release',
//            'resource',
//            'res_link',
            'title',
//            'entry_image:ntext',
            'category',
            // 'full_text:ntext',
            'date',
            // 'meta_desc',
            // 'meta_key',
            'hits',
            // 'hide',
            // 'no_form',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
