<?php
/**
 * Created by PhpStorm.
 * User: HomeO
 * Date: 30.10.2016
 * Time: 18:39
 */
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
<div class="work-page main grid-wrap">

    <header class="grid col-full">
        <hr>
        <p class="fleft">Проекты</p>
    </header>


    <aside class="grid col-one-quarter mq2-col-one-third mq3-col-full">

        <p class="mbottom"><?=$work->description?>
        </p>
        <h6>Клиент</h6>
        <p class="halfmbottom"><?=$work->client?></p>

        <h6>Details</h6>
        <p class="halfmbottom"><?=$work->details?></p>
        <h6>Technology</h6>
        <p class="halfmbottom"><?=$work->technology?></p>

        <h6>Links</h6>
        <p class="halfmbottom"><a href="<?=$work->address?>">Live website</a> - <?=$work->address?></p>

        <h6>Testimonial</h6>

        <blockquote><?=$work->testimonial?></blockquote>

    </aside>

    <section class="grid col-three-quarters mq2-col-two-thirds mq3-col-full">
        <figure class="">
            <a href="<?=$work->address?>" >
                <img src="<?=$work->img?>" alt="<?=$work->img?>" >
            </a>
        </figure>
    </section>



</div> <!--main-->
