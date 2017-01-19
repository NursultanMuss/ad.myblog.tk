<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Blogs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Создать запись'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete_all'], ['id' => 'check_all', 'class' => 'btn btn-danger', 'aria-label' => 'Вы действительно хотите удалить эти записи?']) ?>
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
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\CheckboxColumn',
                'checkboxOptions' => function($model, $key, $index, $widget) {
                    return ['value' => $model['id']];
                },
            ],
//            'id',
            [
                'attribute' => 'date',
                'filter' => false,
                'format' =>  ['date', 'HH:mm:ss -- dd.MM.Y'],
                'contentOptions' => [
                    'style' => 'white-space: normal;'
                ],
                'enableSorting' => true,
                'encodeLabel' => true,
            ],

            [
                'attribute' => 'category',
                'contentOptions' => [
                    'style' => 'white-space: normal;'
                ],
                'enableSorting' => true,
                'encodeLabel' => true,
            ],

            [
                'attribute' => 'img',
                'header' => 'Главное фото',
                'filter' => false,
                'format' => 'raw',
                'value' => function($img){
                    return Html::img($img->img,[
                        'alt'=>'',
                        'style' => 'width:120px;'
                    ]);
                },
            ],
           
            [
                'attribute' => 'title',
                'contentOptions' => [
                    'style' => 'white-space: normal;'
                ],
                'enableSorting' => true,
                'encodeLabel' => true,
            ],

//            'intro_text:ntext',
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
<script>

        var keys = $("#check_all").yiiGridView('getSelectedRows');
        $.post({
            url: delete_all, // your controller action
            dataType: 'json',
            data: {keylist: keys},
            success: function (data) {
                alert('I did it! Processed checked rows.')
            },
        });

</script>
