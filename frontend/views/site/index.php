<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="row news">
        <?php foreach ($news->all() as $newsItem):?>

        <div class="col-md-3">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="" href="/news/read?url=<?=$newsItem->url?>">
                                <?= $newsItem->name?>
                            </a>
                        </div>

                        <div class="panel->footer">
                            <?= $newsItem->url?>
                        </div>
                </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
