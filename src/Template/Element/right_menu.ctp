<div class="ui large vertical menu">
    <div class="item">
        <a href="<?= $this->Url->build(['controller'=>'Products','action'=>'index'])?>">
            <?= __('All')?>
        </a>
    </div>    
    <?php if(!empty($product_types)):?>
    <?php foreach($product_types as $product_type):?>
    <div class="item">
        <a href="<?= $this->Url->build(['controller'=>'Products','action'=>'index',$product_type->id])?>">
            <?= $product_type->name?>
        </a>
        <div class="ui small blue label"><?= $product_type->count?></div>
    </div>
    <?php endforeach;?>
    <?php endif;?>
</div>
