<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WorksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Works');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="works-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Works'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'layout'=>"{pager}\n{items}\n{summary}",
        'summary' => "Сейчас на <b>{page}</b> странице <b>{begin}</b>\n - <b>{end}</b> записи из <b>{totalCount}</b> .",
        'showOnEmpty' => true,
        'emptyText' => 'Нет данных',
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'address',
                'header' => "Ссылка",
                'format' => "html"

            ],
//            'description',
            [
                'attribute' => 'description',
                'header' => 'Описание',
                'contentOptions' => [
                    'class' => 'td_title',
                    'style' => 'white-space: normal;'
                ],
                'enableSorting' => true,
                'encodeLabel' => true,
            ],
//            'img',
            [
                'attribute' => 'img',
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function($img){
                    return Html::img(Url::toRoute($img),[
                        'alt'=>'',
                        'style' => 'width:15px;'
                    ]);
                },
            ],
//            'type',
            // 'active',
//             'date',
            [
                'attribute' => 'date',
                'header' => 'Изменено',
                'format' =>  ['date', 'HH:mm:ss -- dd.MM.YYYY'],
                'enableSorting' => true,
                'encodeLabel' => true,
            ],

//             'client',
            [
                'attribute' => 'client',
                'header' => 'Клиент',
                'contentOptions' => [
                    'class' => 'td_client',
                    'style' => 'white-space: normal;'
                ],
            ],

            // 'details',
            // 'technology',
            // 'testimonial:ntext',

            [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия',
            'template' => '{view} {update} {delete}',
                'buttons' => [
                    'update' => function ($url,$model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-screenshot"></span>',
                            $url);
                    }
                ],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{link}',
                'buttons' => [
                    'link' => function ($data) {
                        return
                            Html::a(
                            '<span class="glyphicon glyphicon-arrow-right">Перейти</span>',
                                Url::toRoute('../../site/work', $data->id),
                            [
                            'target' => '_blank'
                            ]);
                    },
                ],

            ]
        ],
    ]); ?>
</div>
<!--Url::toRoute(['../../site/work', 'id' => $url->id])-->