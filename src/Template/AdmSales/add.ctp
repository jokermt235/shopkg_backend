<div class="basic segment">
    <div class="ui header">
        <?= __("New sale")?>
    </div>
    <div class="ui divider">
    </div>
    <form class="ui form" method="POST" action="">
        <div class="field">
            <label>Product</label>
            <input type="hidden" name="product_id" value="<?= @$product->id?>">
            <input type="text" value="<?= @$product->name?>">
        </div>
        <div class="field">
            <label><?=__('Sale price')?></label>
            <input type="text" name="sale_price" value="<?= @$product->price?>">
        </div>
        <div class="field">
            <label><?=__('Profit')?></label>
            <input type="text" name="profit">
        </div>
        <div class="field">
            <label><?=__('Delivery price')?></label>
            <input type="text" name="delivery_price">
        </div>
        <div class="field">
            <button class="ui primary button" type="submit">Save</button>
        </div>
    </form>
</div>