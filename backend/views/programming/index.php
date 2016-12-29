<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProgPostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Programming Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programming-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Programming'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'layout'=>"{pager}\n{items}\n{summary}",
                'summary' => "Сейчас на <b>{page}</b> странице <b>{begin}</b>\n - <b>{end}</b> записи из <b>{totalCount}</b> .",
                'showOnEmpty' => true,
                'emptyText' => 'Нет данных',
                'tableOptions' => [
                    'class' => 'table table-hover'
                ],
                'columns' => [
//                    'date',
//                    'title',

                    [
                        'attribute' => 'date',
                        'header' => 'Дата',
                        'format' =>  ['date', 'HH:mm:ss -- dd.MM.YYYY'],
                        'enableSorting' => true,
                        'encodeLabel' => true,
                    ],
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
                        'class' => 'yii\grid\ActionColumn',
                        'header'=>'Действия',
                        'template' => '{view} {update} {delete}{link}',
                    ],

                ],
            ]); ?>
</div>
