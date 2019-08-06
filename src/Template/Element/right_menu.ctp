<?php
    $groups = array_chunk($product_types, 4);
    $index = 0;
?>
<div class="ui fluid popup bottom left transition">
    <div class="ui four column relaxed stackable grid" id="product_types_menu">
        <?php if(!empty($product_types)):?>
        <?php foreach($groups as $group):?>
        <?php $index++;?>
        <div class="column">
            <div class="ui relaxed divided list">
            <?php if($index == 1):?>
            <a class="item"  href="<?= $this->Url->build(['controller'=>'Products','action'=>'index'])?>">
                <?= __('All');?>
            </a>
            <?php endif;?>
            <?php foreach($group as $product_type):?>
                <a class="item"  href="<?= $this->Url->build(['controller'=>'Products','action'=>'index',$product_type['id']])?>">
                    <div class="content">
                        <?= $product_type['name']?>
                        <div class="right floated content">
                            <div class="ui circular blue label">
                                <?= $product_type['count']?>
                                шт.
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach;?>
            </div>
        </div>
        <?php endforeach;?>
        <?php endif;?>
    </div>
</div>
<script>
    $('#all_categories')
      .popup({
        popup : $('.fluid.popup'),
        on    : 'click'
      });
</script>