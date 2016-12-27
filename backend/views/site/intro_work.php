<figure class="col-lg-4">
    <a href="<?= $work->link?>" >
        <img class="img-responsive" src="<?=$work->img?>" alt="<?=$work->address?>" >
        <span class="zoom"></span>
    </a>
    <figcaption>
        <a href="<?= $work->link?>">Project page!</a> <span class="glyphicon glyphicon-arrow-right"></span>
        <p><?=$work->description?></p>
    </figcaption>
</figure>
