<?= $this->element('header')?>
<?=$this->Html->css('tamtam.css');?>
<div class="ui secondary stackable horizontal menu">
    <div class="item">
        <div class="ui breadcrumb">
            <?php if(!empty($product_type)):?>
            <a class="section"><?= $product_type->name?></a>
            <?php else:?>
            <a class="section"><?= __('All')?></a>
            <?php endif;?>
        </div>
    </div>
</div>
<div class="ui divider">
</div>
<div class="ui stackable four column grid">
    <?php foreach($products as $product):?>
    <?php $images = json_decode(base64_decode($product->images))?>
    <?php 
        if(empty($images)){
            $images = [];
            $images[0]='image.png';
        }
    ?>
    <div class="column">
        <?php if($product->new):?>
            <a class="ui pointing below red  label">
                <?= __('New')?>
            </a>
        <?php endif;?>
        <?php 
                $style = "";
                if(!empty($product->discount)){ 
                    $style="style='text-decoration:line-through !important'"; $new_price = $product->price - $product->discount;
                }
            ?>
        <div class="ui center aligned vertical raised segment">
            <a <?=$style?> class="ui blue tag label rotate45"><?= __('Price')?> : <?= $product->price ?> <?= __('$') ?></a>
            <div>
                <?php
                if(!empty($product->discount)){ 
                    echo "<a class='ui orange tag label'>Цена со скидкой : ".$new_price." ".__('$')."</a>";
                    $product->price = $new_price;
                }
                ?>
            </div>
            <div class="ui hidden divider">
            </div>
            <div>
                <a href="<?= $this->Url->build(['controller'=>'Products','action'=>'view',$product->id]) ?>">
                    <img src="<?= $this->Url->image('products/images/small_'.$images[0])?>">
                </a>
            </div>
            <h2 class="ui header">
                <?= $product->name?>
            </h2>
            <p>
                <?= $product->title?>
            </p>
            <button class="ui blue primary basic button product" product_id="<?= $product->id?>">
                <i class="shop icon"></i>
                <?= __('Add to chart')?>
            </button>
        </div>
    </div>
    <?php endforeach;?>
</div>
<div class="ui divider">
</div>
<div class="ui container">
    <div class="ui pagination menu">
        <?php if(!empty($paging['Products'])):?>
        <?php for($i=1;$i<=$paging['Products']['pageCount'];$i++):?>
        <?php 
            $active = "";
            if($i == $paging['Products']['page']) $active = 'active';
        	if(empty($product_type)):?>
        	<a class="item <?= $active?>" href="<?= $this->Url->build(['controller'=>'Products','action'=>'index',"?" => ["page" => $i]]) ?>"><?= $i?></a>
        	<?php endif;?>
        	<?php if(!empty($product_type)):?>
        	<a class="item <?= $active?>" href="<?= $this->Url->build(['controller'=>'Products','action'=>'index',$product_type->id,"?" => ["page" => $i]])     ?>"><?= $i?></a>
        <?php endif;?>
        <?php endfor;?>
        <?php endif;?>
    </div>
</div>
<div class="ui divider">
</div>
<div class="ui stackable two column grid">
    <div class="column">
        <?= $this->element('about');?>
    </div>
    <div class="column">
        <?= $this->element('provider');?>
    </div>
</div>
<script>
    var shopbag = "<?= $this->Url->build(['controller'=>'Shopbags','action'=>'add'])?>";
    var redirect_url = "<?= $this->Url->build(['controller'=>'Users','action'=>'login'])?>";
    $('.product').click(function(){
        
        var product_id = $(this).attr('product_id');
        
        $.post( shopbag,{'product_id': product_id}).done(function(){
            var count = parseInt($('#shopbag').text());
            count+=1;
            $('#shopbag').text(count);
        }).fail(function(data) {
            if(data.status == "403"){
                document.location.replace(redirect_url);
            }
        });

        /*$.getJSON(shopbag_url, function( data ) {
        });*/
    });
    
</script>
