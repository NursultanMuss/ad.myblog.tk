<?php
/**
 * Created by PhpStorm.
 * User: HomeO
 * Date: 30.10.2016
 * Time: 19:47
 */
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

    <header class="grid col-full">
        <hr>
        <p class="fleft">Статьи про программирование</p>
    </header>
<section class="grid col-three-quarters mq2-col-full">

    <div class="grid-wrap works">
        
        <?php foreach($prog_posts as $post) include 'intro_post.php'?>

    </div> <!-- grid inside 3/4-->

</section>

   
