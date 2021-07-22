<?php
$this->title = 'Feedback';
?>
<?php foreach ($feedbacks as $feedback){ ?>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="fusername">
            <p><?=$feedback->username?></p>
        </div>
        <br>
        <div class="ftext">
            <p><?=$feedback->text?></p>
        </div>
        <br>
        <div class="fdate">
            <p>Опубликовано: <?=Yii::$app->formatter->asDatetime($feedback->date, "php:d-m-Y");?></p>
        </div>
    </div>
<?php } ?>

