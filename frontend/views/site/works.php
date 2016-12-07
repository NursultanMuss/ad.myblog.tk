<?php
/**
 * Created by PhpStorm.
 * User: йойо
 * Date: 26.10.2016
 * Time: 9:45
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

<div class="works-page main grid-wrap">

    <header class="grid col-full">
        <hr>
        <p class="fleft">Works</p>
    </header>


    <aside class="grid col-one-quarter mq2-col-full">
        <menu>
            <a  id="work_all" class="arrow buttonactive">All</a><br>
            <a  id="work_1" class="arrow">Web design</a><br>
            <a  id="work_2" class="arrow">Web development</a><br>
            <a  id="work_3" class="arrow">Graphic design</a>
        </menu>
    </aside>

    <section class="grid col-three-quarters mq2-col-full">

        <div class="grid-wrap works">

            <?php foreach($works as $work) {include "intro_work.php";}?>
        </div> <!-- grid inside 3/4-->

    </section>



</div> <!--main-->


