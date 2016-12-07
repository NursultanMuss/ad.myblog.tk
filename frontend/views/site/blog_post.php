<?php
/**
 * Created by PhpStorm.
 * User: HomeO
 * Date: 31.10.2016
 * Time: 22:41
 */

use yii\widgets\LinkPager;
$this->title=$blog_post->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $blog_post->meta_desc
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $blog_post->meta_key
])
?>



    <header class="grid col-full">
        <hr>
        <p class="fleft">Статьи про программирование</p>
    </header>
    <div class="entry-image">
<!--        --><?//=$blog_post->image?>
    </div>


    <section class="grid col-three-quarters mq2-col-two-thirds mq3-col-full">

        <article class="post post-single">
            <h2><a href="#" class="post-title"><?=$blog_post->title?></a></h2>
            <div class="meta">
                <p>Запостено <span class="time"><?=$blog_post->date?></span> &nbsp &nbsp<a href="#"class="cat"><?=$blog_post->category?></a> &nbsp;&nbsp; <span class="glyphicon glyphicon-eye-open"></span>&nbsp;<span><?=$blog_post->hits?></span>.</p>
            </div>
            <div class="entry">
                <?=$blog_post->full_text?>
            </div>

        </article>


    </section>





