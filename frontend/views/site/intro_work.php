
<figure class="grid col-one-quarter mq2-col-one-half">
    <a href="<?= $work->link?>" >
        <img class="img-responsive" src="<?php echo $work->img ?>" alt="<?=$work->address?>" >
        <span class="zoom"></span>
    </a>
    <figcaption>
        <a href="<?= $work->link?>" class="arrow">Project page!</a>
        <p><?=$work->description?></p>
    </figcaption>
</figure>
