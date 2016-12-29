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
        'filterModel' => $searchModel,
        'layout'=>"{pager}\n{items}\n{summary}",
        'summary' => "Сейчас на <b>{page}</b> странице <b>{begin}</b>\n - <b>{end}</b> записи из <b>{totalCount}</b> .",
        'showOnEmpty' => true,
        'emptyText' => 'Нет данных',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'is_release',
//            'title',
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
//            'category',
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
            // 'intro_text:ntext',
            // 'full_text:ntext',
            // 'date',
            [
                'attribute' => 'date',
                'header' => 'Дата',
                'format' =>  ['date', 'HH:mm:ss -- dd.MM.YYYY'],
                'enableSorting' => true,
                'encodeLabel' => true,
            ],
            // 'meta_desc',
            // 'meta_key',
//             'hits',
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
            // 'hide',
            // 'no_form',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
