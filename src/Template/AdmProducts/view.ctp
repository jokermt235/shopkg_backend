<div class="basic segment">
    <div class="ui header">
        Product
    </div>
    <div class="ui divider">
    </div>
    <table class="ui celled table">
        <thead>
        </thead>
        <tbody>
            <?php if(!empty($admProduct)): ?>
            <tr>
                <td>Id</td>
                <td><?= $admProduct->id ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?= $admProduct->name?></td>
            </tr>
            <tr>
                <td>Title</td>
                <td><?= $admProduct->title?></td>
            </tr>
            <tr>
                <td>Product type</td>
                <td><?= $admProduct->product_type_id?></td>
            </tr>
            <tr>
                <td>Descr</td>
                <td><?= $admProduct->descr?></td>
            </tr>
            <tr>
                <td>Youtube video</td>
                <td><?= $admProduct->video?></td>
            </tr>
            <tr>
                <td>Properties</td>
                <td><?= $admProduct->properties?></td>
            </tr>
            <tr>
                <td>New</td>
                <td><?= $admProduct->new?></td>
            </tr>
            <tr>
                <td>Created</td>
                <td><?= $admProduct->created?></td>
            </tr>
            <tr>
                <td>Modified</td>
                <td><?= $admProduct->modified?></td>
            </tr>
            <tr>
                <td>Images</td>
                <?php $images = json_decode(base64_decode($admProduct->images))?>
                <?php 
                    if(empty($images)){
                        $images = [];
                        $images[0]='image.png';
                    }
                ?>
                <td>
                    <?php foreach($images as $image):?>
                    <div class="ui small image">
                        <img class="ui small image" src="<?= $this->Url->image('products/images/'.$image)?>">
                    </div>
                    <?php endforeach;?>
                </td>
            </tr>
            <?php endif;?>
        </tbody>
    </table>
</div>
