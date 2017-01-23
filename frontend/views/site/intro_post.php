<div class="swiper-slide">
<article class="prog" style='height: 100%'>
    <div class='entry_image'>
	    <a href="<?= $post->link?>">
	        <?=$post->entry_image?>
	    </a>
    </div>
    <div class="prog_text">
        <a href="<?= $post->link?>">
            <h5>
            	<span style="min-height: 48px; font-family: 'Roboto Slab'; display: block;"><?=$post->title?></span>
            	<?php 
            	if($post->entry_image == '<span></span>'){
            		?>
            		<div class='title_description'><?=$post->entry_title_description?></div> 
        		<?php
        		}?>
            	
            </h5>
        </a>
    </div>
</article>
</div>
