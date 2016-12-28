<div class="basic segment">
    <div class="ui header">
        Product Type
    </div>
    <div class="ui divider">
    </div>
    <form class="ui form" method="POST" action="">
        <div class="field">
            <label>Name</label>
            <input type="hidden" name="id" value="<?= $admProductType->id?>">
            <input type="text" name="name" value="<?= $admProductType->name?>"placeholder="product type name">
        </div>
        <div class="field">
            <textarea name="description"><?= $admProductType->description?></textarea>
        </div>
        <div class="field">
            <button class="ui primary button" type="submit">Save</button>
        </div>
    </form>
</div>
