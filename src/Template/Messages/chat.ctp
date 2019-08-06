<?php if(!empty($operator)):?>
<div class="ui text menu">
    <div class="item">
        <img class="ui mini circular image" 
    src="<?= $this->Url->image(sprintf('operators/%s',@$operator->avatar))?>">       
    </div>
    <div class="ui item">
        <?= @$operator->name?>
        (online)
    </div> 
</div>
<div class="ui divider">
</div>
<div class="ui segment messages" id="chat_info">
    <div class="ui blue floating message">
        <p><?= $operator->status_message?></p>
    </div>
    <?php if(!empty($messages)):?>
    <?php foreach($messages as $message):?>
    <?php if($message->author === 'user'):?>
        <div class="ui floating green message">
            <div class="ui blue bottom right attached label"><?= $message->created?></div>
            <p><?= $message->message?></p>
        </div>
    <?php endif?>
    <?php if($message->author === 'operator'):?>
        <div class="ui floating blue message">
            <div class="ui blue bottom right attached label"><?= $message->created?></div>
            <p><?= $message->message?></p>
        </div>
    <?php endif?>

    <?php endforeach?>
    <?php endif?>
</div>
<input type="hidden" name="operator_id" id="operator_id"  value=<?= $operator->id?>>
<?php endif?>
