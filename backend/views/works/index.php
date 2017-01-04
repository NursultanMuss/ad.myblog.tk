<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use backend\models\Works;

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
            [
                'attribute' => 'address',
                'header' => "Ссылка",
                'format' => "raw",
                'contentOptions' => [
                    'class' => 'td_title',
                    'style' => 'white-space: normal;'
                ],
                'value' => function($data){
                    return Html::a(
                        'Перейти на сам сайт',
                        $data->address,
                        [
                            'title' => $data->address,
                            'target' => '_blank'
                        ]
                    );
                }

            ],

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

            [
                'attribute' => 'img',
                'header' => 'Картинка',
                'format' => 'raw',
                'value' => function($img){
                    return Html::img($img->img,[
                        'alt'=>'',
                        'style' => 'width:120px;'
                    ]);
                },
            ],
            [
                'attribute' => 'date',
                'label' => 'Изменено',
                'format' =>  ['date', 'HH:mm:ss -- dd.MM.Y'],
                'contentOptions' => [
                    'class' => 'td_title',
                    'style' => 'white-space: normal;'
                ],
                'enableSorting' => true,
                'encodeLabel' => true,
            ],

            [
                'attribute' => 'client',
                'header' => 'Клиент',
                'contentOptions' => [
                    'class' => 'td_title',
                    'style' => 'white-space: normal;'
                ],
                'contentOptions' => [
                    'class' => 'td_client',
                    'style' => 'white-space: normal;'
                ],
            ],
            [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия',
            'template' => '{view} {update} {delete}',
            ],
            [
                'attribute' => 'id',
                'header' => 'Просмотреть',
                'contentOptions' => [
                    'class' => 'td_title',
                    'style' => 'white-space: normal;'
                ],
                'format' => 'raw',
                'value' => function ($data) {
                    return
                        Html::a(
                            '<span class="glyphicon glyphicon-arrow-right">Перейти</span>',
                            Url::toRoute('../../work/'.$data->id),
                            [
                                'target' => '_blank'
                            ]);
                }
            ]
        ],
    ]); ?>
</div>
<!--Url::toRoute(['../../site/work', 'id' => $url->id])-->