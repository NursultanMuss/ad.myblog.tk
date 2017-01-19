<?php
/**
 * Created by PhpStorm.
 * User: HomeO
 * Date: 30.10.2016
 * Time: 19:47
 */
use yii\widgets\LinkPager;


$this->title="Мой блог";
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Мой личный Блог'
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Нурсултан Мусабаев, личный блог'
])
?>



    <header class="grid col-full">
        <hr>
        <p class="fleft">Блог</p>
    </header>
    <section class="grid col-three-quarters mq2-col-two-thirds mq3-col-full">

            <?php
            foreach($blog_posts as $post) include 'intro_blog_post.php'?>


    </section>


