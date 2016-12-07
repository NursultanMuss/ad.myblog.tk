<?php
/**
 * Created by PhpStorm.
 * User: HomeO
 * Date: 03.11.2016
 * Time: 20:32
 */
use yii\widgets\LinkPager;
    $this->title=$category;
    $this->registerMetaTag([
        'name' => 'description',
        'content' => 'Статьи про программирование из категории '.$category
    ]);
    $this->registerMetaTag([
        'name' => 'keywords',
        'content' => 'Нурсултан Мусабаев, личный сайт, '.$category. ', программирование'
    ])
?>

    <header class="grid col-full">
        <hr>
        <p class="fleft">Статьи категории <?= $category?></p>
    </header>
    <section class="grid col-three-quarters mq2-col-full">

        <div class="grid-wrap works">

            <?php foreach($cat_post as $post) include 'intro_post.php'?>

        </div> <!-- grid inside 3/4-->

    </section>

