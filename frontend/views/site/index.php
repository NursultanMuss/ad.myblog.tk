<?php
use yii\widgets\LinkPager;


$this->title="Мой сайт";
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Мой личный сайт'
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Нурсултан Мусабаев, личный сайт'
])
?>

<div class="home-page main">
        <section class="grid-wrap" >
            <header class="grid col-full">
                <hr>
                <p class="fleft">Home</p>
                <a href="<?=Yii::$app->urlManager->createUrl(['site/about'])?>" class="arrow fright">больше информации</a>
            </header>

            <div class="grid col-one-half mq2-col-full">
                <h1>Web design <br>
                    Web Development <br>
                    Graphic Design</h1>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.
                </p>
                <p>Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum.
                </p>
                <?=include "likes.php"?>
            </div>


            <div class="slider grid col-one-half mq2-col-full">
                <div class="flexslider">
                    <div class="slides">
<div class="slide">
    <figure>
        <img class="img-responsive" src="/web/img/img2.jpg" alt="">
        <figcaption>
            <div>
                <h5>Caption 1</h5>
                <p>Lorem ipsum dolor set amet, lorem, <a href="#">link text</a></p>
            </div>
        </figcaption>
    </figure>
</div>

<div class="slide">
    <figure>
        <img src="../web/img/img.jpg" alt="">
        <figcaption>
            <div>
                <h5>Caption 2</h5>
                <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
            </div>
        </figcaption>
    </figure>
</div>
</div>
</div>
</div>

</section>

<section class="services grid-wrap">
    <header class="grid col-full">
        <hr>
        <p class="fleft">Статьи про программирование</p>
        <a href="<?= Yii::$app->urlManager->createUrl(["site/programming"])?>" class="arrow fright">больше статей</a>
    </header>
        <?php

        foreach ($posts as $post){include  "intro_post.php";}
        ?>



</section>
    <div id="programming_pages">
<!--        <span> Страница --><?//= $active_page?><!-- из--><?//=$count_pages?><!--</span>-->
        <?= LinkPager::widget([
            'pagination' => $pagination,
            'firstPageLabel' => 'В начало',
            'lastPageLabel' => 'В конец',
            'prevPageLabel' => '&laquo;'
        ]) ?>

        <div class="clear"></div>
    </div>

<section class="works grid-wrap">
    <header class="grid col-full">
        <hr>
        <p class="fleft">Мои работы</p>
        <a href="<?=Yii::$app->urlManager->createUrl(["site/works"])?>" class="arrow fright">больше работ</a>
    </header>
<div class="works">
    <?php foreach($works as $work) {include "intro_work.php";}?>
</div>
</section>
</div> <!--main-->