<article class="post">
    <h2><a href="<?=$post->link?>" class="post-title"><?=$post->title?></a></h2>
    <div class="meta">
        <p>Запостено <span class="time"><?=$post->date?></span> &nbsp &nbsp<a href="#"class="cat"><?=$post->category?></a>.</p>
    </div>
    <div class="entry">
        <?=$post->full_text?>
    </div>
    <footer>
        <a href="<?=$post->link?>" class="more-link">Читать дальше…</a>
    </footer>
</article>	