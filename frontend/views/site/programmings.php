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
<section class="grid col-three-quarters mq2-col-two-thirds mq3-col-full">

    <div class="grid-wrap works">
        
        <?php
        $KeyMax=count($prog_posts);
        for($i=0; $i<$KeyMax;$i=$i+3){
            ?>
            <div class="row">
        <?php
        foreach($prog_posts as $key=>$post){
            if($key>=$i && $key<$i+3){
                include 'intro_post.php';
            }


        }?>
            </div>
        <?php
        }
        ?>



    </div> <!-- grid inside 3/4-->

</section>



