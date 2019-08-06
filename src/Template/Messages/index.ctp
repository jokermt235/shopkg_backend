<?php if(!empty($messages)):?>
<?php foreach($messages as $message):?>
<div class="ui icon message">
    <i class="user icon"></i>
    <div class="content">
        <div class="header">
            User_<?= $message->token?>
        </div>
        <p>
            <?php if($message->author=="operator"){echo "Я:";} else echo "";?>
            <?= substr($message->message,0,15)?>
        </p>
    </div>
</div>
<?php endforeach?>
<?php endif?>
<div>