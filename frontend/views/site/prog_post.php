<?php
/**
 * Created by PhpStorm.
 * User: йойо
 * Date: 26.10.2016
 * Time: 9:45
 */
use yii\widgets\LinkPager;
use app\components\PopularPosts;
$this->title=$prog_post->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $prog_post->meta_desc
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $prog_post->meta_key
])
?>



    <header class="grid col-full">
        <hr>
        <p class="fleft">Статьи про программирование</p>
    </header>



    <section class="grid col-three-quarters mq2-col-two-thirds mq3-col-full">

        <article class="post post-single">
            <h2><a href="#" class="post-title"><?=$prog_post->title?></a></h2>
            <div class="meta">
                <p>Опубликовано <span class="time"><?=$prog_post->date?></span> мной с ресурса <a href="<?=$prog_post->res_link?>" class="fn"><?=$prog_post->resource?></a> &nbsp; <span class="glyphicon glyphicon-eye-open"></span><span><?=$prog_post->hits?></span>.</p>
            </div>
            <div class="entry-image">
                <?=$prog_post->entry_image?>
            </div>
            <div class="entry">
                <?=$prog_post->full_text?>
            </div>

        </article>


    </section>

    

<!--main-->
