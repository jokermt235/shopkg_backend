<div class="ui divided items">
    <?php if(!empty($shopbags)):?>
    <?php foreach($shopbags as $shopbag):?>
    <?php $images = json_decode(base64_decode($shopbag->product->images))?>
    <?php 
        if(empty($images)){
            $images = [];
            $images[0]='image.png';
        }
    ?>
    <div class="item">
        <div class="ui tiny image">
            <img src="<?= $this->Url->image('products/images/'.$images[0])?>">
        </div>
        <div class="content">
            <div class="header"><?= $shopbag->product->name?></div>
            <div><?= $shopbag->product->price?> COМ</div>
            <div><?= $shopbag->created?></div>
            <div class="extra">
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shopbag->id], ['confirm' => __('Are you sure you want to     delete # {0}?', $shopbag->id),'class'=>'ui primary button']) ?>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <?php else :?>
    <div class="ui center aligned segment">
        <h2><?= __('The shopbag is empty')?></h2>
    </div>
    <?php endif;?>
</div>
