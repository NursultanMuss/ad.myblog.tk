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
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete_all'], ['class' => 'btn btn-danger', 'aria-label' => 'Вы действительно хотите удалить эти записи?']) ?>
    </p>
    <?php \yii\widgets\Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout'=>"{pager}\n{items}\n{summary}",
        'summary' => "Сейчас на <b>{page}</b> странице <b>{begin}</b>\n - <b>{end}</b> записи из <b>{totalCount}</b> .",
        'showOnEmpty' => true,
        'emptyText' => 'Нет данных',
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
            ],
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'resource',
//            'res_link',
//            'date_of_publication',
            [
                'attribute' => 'date_of_publication',
                'format' =>  ['date', 'Y.M.d'],
                'contentOptions' => [
                    'class' => 'td_title',
                    'style' => 'white-space: normal;'
                ],
                'enableSorting' => true,
                'encodeLabel' => true,
            ],

            [
                'attribute' => 'title',
                'contentOptions' => [
                    'class' => 'td_title',
                    'style' => 'white-space: normal;'
                ],
                'enableSorting' => true,
                'encodeLabel' => true,
            ],
            [
                'attribute' => 'entry_title_description',
                'contentOptions' => [
                    'class' => 'td_title',
                    'style' => 'white-space: normal;'
                ],
                'enableSorting' => true,
                'encodeLabel' => true,
            ],
//            'entry_image:ntext',
            // 'category',
            // 'full_text:ntext',
            // 'meta_desc',
            // 'meta_key',
            // 'hits',
            // 'hide',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php \yii\widgets\Pjax::end(); ?>
</div>
