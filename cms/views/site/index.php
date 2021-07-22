<?php

/* @var $this yii\web\View */

$this->title = 'Game';
?>
<div class="row">
    <div class="col-xs-0 col-sm-3 col-md-3 col-lg-3 leaderboards">
        <p>Зал славы</p>
        <div class = "result">
            <?php foreach ($results as $result){ ?>
                <li><b><?=$result->username?>:</b><?=$result->calculation?></li>
            <?php } ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 xui">
        <div class="webgl-content">
            <div id="gameContainer" style="width: 100%; height: 352px"></div>
            <div class="footer">
                <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
            </div>
        </div>
    </div>
    <div class="col-xs-0 col-sm-3 col-md-3 col-lg-3 comments">
        <p>Новости проекта</p>
        <?php foreach ($news as $new){ ?>
        <div class = "information">
            <li><b><?=$new->header?></b><br><?=$new->text?><br><p><?=Yii::$app->formatter->asDatetime($new->date, "php:d-m-Y H:i:s");?></p></li>
        </div>
        <?php } ?>
    </div>
</div>
