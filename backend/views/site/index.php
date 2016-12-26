<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <article class="col-lg-4">
                <h2>На данный момент</h2>
                <span class="glyphicon glyphicon-pushpin"></span>
                <i> <?= $progPostN?> записи по программированию</i></br>
                <span class="glyphicon glyphicon-pushpin"></span>
                <i> <?= $blogPostN?> записи по программированию</i>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </article>
            <article class="col-lg-8">
                <h2>Активность</h2>
                <div class="row">
                    <h4>Недавно опубликованы</h4>
                    <div class="col-lg-6">
                        <h5>о программирования</h5>
                        <table>
                            <tbody>
                            <?php
                            foreach($query_p_l as $value_p){include "prog_info.php";}
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <h5>статьи блога</h5>
                        <table>
                            <tbody>
                            <?php
                            foreach($query_b_l as $value_b){include "blog_info.php";}
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <h4>Последние работы</h4>
                        <section class="grid col-three-quarters mq2-col-full">
                            <div class="grid-wrap works">
                        <?php foreach($query_w_l as $work) {include "intro_work.php";}?>
                            </div>
                        </section>
                </div>
            </article>


        </div>

    </div>
</div>
