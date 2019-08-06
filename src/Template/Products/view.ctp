<?php
    $images = json_decode(base64_decode($product->images));
    if(empty($images[0])){
        $images[0] = 'image.png';
    }
    
    if(empty($images[1])){
        $images[1] = 'image.png';
    }   

    if(empty($images[2])){
        $images[2] = 'image.png';
    }
?>
<div class="ui breadcrumb">
    <a class="section"><?= $product->type?></a>
    <i class="right angle icon divider"></i>
    <div class="active section"><?=$product->name?></div>
</div>
<div class="ui basic segment"> 
    <div class="ui stackable equal width grid">
        <div class="column">
            <div id="image_box" class="ui middle image">
                <img src="<?= $this->Url->image('products/images/'.$images[0])?>">
            </div>
            <div class="ui divider hidden">
            </div>
            <div class="ui center aligned equal width stackable grid">
                <div class="column">
                    <div class="ui segment">
                        <div id="image_1" class="ui tiny image">
                            <img src="<?= $this->Url->image('products/images/small_'.$images[0])?>">
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui segment">
                        <div id="image_2" class="ui tiny image">
                            <img src="<?= $this->Url->image('products/images/small_'.$images[1])?>">
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui segment">
                        <div id="image_3" class="ui tiny image">
                            <img src="<?= $this->Url->image('products/images/small_'.$images[2])?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="ui header">
                <?= $product->name ?>
            </div>
            <div class="ui hidden divider">
            </div>
            <?php 
                $style = "";
                if(!empty($product->discount)){ 
                    $style="style='text-decoration:line-through !important'"; $new_price = $product->price - $product->discount;
                }
            ?>
            <a <?=$style?>class="ui blue tag label"><?= __('Price')?> : <?= $product->price?> <?= __('$') ?></a>
            <div>
                <?php
                if(!empty($product->discount)){ 
                    echo "<a class='ui orange tag label'>Новая цена : ".$new_price.__('$')."</a>";
                    $product->price = $new_price;
                }
                ?>
            </div>
            <input type="hidden" id="product_price" value="<?= $product->price?>">
            <div class="ui hidden divider">
            </div>
            <div class="ui container segment">
                <?= $product->descr ?>
            </div>
            <div class="ui form">
                <div class="eight wide field">
                    <div class="ui left icon input">
                        <i class="calculator icon"></i>
                        <input id="count_input" type="number" min=1 value="1">
                        <div class="ui left pointing label">
                              <div class="ui header"><?= __('Total')?>: <b id="count"><?= $product->price ?></b><?=__('$')?></div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <button  id="viewShopBagBtn" class="ui primary right labeled icon button">
                        <i class="cart icon"></i>
                        <?= __('ADD TO CHART')?>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="ui divider">
    </div>
    <div class="ui bottom attached segment">
        <div class="ui header"><?= __('Properties')?></div>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th><?= __('Proreties')?></th>
                    <th><?= __('Values')?></th>
                </tr>
                <tbody>
                    <?php if(!empty($product->properties)):?>
                    <?php $properties = explode("\n", $product->properties);?>
                    <?php foreach($properties as $property):?>
                    <?php $line = explode(':',$property);?>
                    <tr>
                        <td><?= @$line[0]?></td>
                        <td><?= @$line[1]?></td>
                    </tr>
                    <?php endforeach;?>
                    <?php endif;?>
                </tbody>
            </thead>
        </table>
        <?php if(!empty($product->video)): ?>
        <div class="ui header"><?= __('Review')?></div>
        <div class="ui divider"></div>
        <iframe width="854" height="480" src="<?= $product->video?>" frameborder="0" allowfullscreen>
        </iframe>
        <?php endif;?>
    </div>
</div>
<script>
    $('#image_1').click(function(){
        $($('#image_box').children()[0]).attr('src',$($(this).children()[0]).attr('src').replace('small_',''));
    });
    $('#image_2').click(function(){
        $($('#image_box').children()[0]).attr('src',$($(this).children()[0]).attr('src').replace('small_',''));
    });
    $('#image_3').click(function(){
        $($('#image_box').children()[0]).attr('src',$($(this).children()[0]).attr('src').replace('small_',''));
    });

    $('#count_input').click(function(){
        var count = parseInt($('#product_price').val());
        var text_count = count * parseInt($(this).val());
        $('#count').text(text_count);
    });
    
    $('#count_input').keyup(function(){
        var count = parseInt($('#product_price').val());
        var text_count = count * parseInt($(this).val());
        $('#count').text(text_count);
    });

</script>
