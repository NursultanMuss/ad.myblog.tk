<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Блог');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Написать в блог'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'layout'=>"{pager}\n{items}\n{summary}",
        'summary' => "Сейчас на <b>{page}</b> странице <b>{begin}</b>\n - <b>{end}</b> записи из <b>{totalCount}</b> .",
        'showOnEmpty' => true,
        'emptyText' => 'Нет данных',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'title',
                'header' => 'Статья',
                'contentOptions' => [
                    'class' => 'td_title',
                    'style' => 'white-space: normal;'
                ],
                'enableSorting' => true,
                'encodeLabel' => true,
            ],
            [
                'attribute' => 'category',
                'header' => 'Категория',
                'contentOptions' => [
                    'class' => 'td_category',
                    'style' => 'white-space: normal;'
                ],
                'enableSorting' => true,
                'encodeLabel' => true,
            ],
            [
                'attribute' => 'img',
                'header' => 'Картинка',
                'format' => 'raw',
                'value' => function($img){
                    return Html::img(Url::toRoute($img),[
                        'alt'=>'',
                        'style' => 'width:15px;'
                    ]);
                },
            ],
            [
                'attribute' => 'date',
                'label' => 'Дата',
                'format' =>  ['date', 'HH:mm:ss -- dd.MM.Y'],
                'contentOptions' => [
                    'class' => 'td_category',
                    'style' => 'white-space: normal;'
                ],
                'enableSorting' => true,
                'encodeLabel' => true,
            ],
            [
                'attribute' => 'hits',
                'header' => 'Количество просмотров',
                'contentOptions' => [
                    'class' => 'td_hits',
                    'style' => 'white-space: normal;'
                ],
                'enableSorting' => true,
                'encodeLabel' => true,
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
