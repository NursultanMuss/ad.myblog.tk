<?php
/**
 * Created by PhpStorm.
 * User: HomeO
 * Date: 04.11.2016
 * Time: 1:49
 */
use yii\widgets\LinkPager;
$this->title= "Категория ".$category;
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Записи блога из категории '.$category
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Нурсултан Мусабаев, личный сайт, '.$category. ', блог'
])
?>

<header class="grid col-full">
    <hr>
    <p class="fleft">Записи блога из категории <?= $category?></p>
</header>
<section class="grid col-three-quarters mq2-col-full">

    <div class="grid-wrap works">

        <?php foreach($cat_post as $post) include 'intro_blog_post.php'?>

    </div> <!-- grid inside 3/4-->

</section>
