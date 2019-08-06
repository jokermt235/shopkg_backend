<div class="ui basic segment">
    <div class="ui header">Edit Product</div>
    <div class="ui divider"></div>
    <form class="ui form" method="POST" action="" id="uploadForm" enctype="multipart/form-data">
        <input type="hidden" name="upload_images" id="upload_images">
        <input type="hidden" name="id" value="<?= @$admProduct->id?>">
        <div class="field">
            <div class="label">Name</div>
            <input type="text" name="name" value="<?= @$admProduct->name?>">
        </div>
        <div class="field">
            <div class="label">Product type</div>    
            <select name="product_type_id">
            <?php foreach($product_types as $product_type):?>
            <?php $selected = ''?>
            <?php 
                if($product_type->id == $admProduct->product_type_id){
                    $selected = 'selected';
                }else{
                    $selected = '';
                }
            ?>
                <option value=<?= $product_type->id?> <?=$selected?>><?= $product_type->name?></option>
            <?php endforeach;?>
            </select>
        </div>
        <div class="field">
            <div class="label">Producers</div>    
            <select name="producer_id">
            <?php foreach($producers as $producer):?>
            <?php $selected = ''?>
            <?php 
                if($producer->id == $admProduct->producer_id){
                    $selected = 'selected';
                }else{
                    $selected = '';
                }
            ?>
                <option value=<?= $producer->id ?><?=$selected?>><?= $producer->name?></option>
            <?php endforeach;?>
            </select>
        </div>
        <div class="field">
            <div class="label">Title</div>
            <input name="title" type="text" value="<?= @$admProduct->title?>">
        </div> 
        <div class="field">
            <div class="label">Price</div>
            <input type="text" name="price" value="<?= @$admProduct->price?>">
        </div>
        <div class="field">
            <div class="label">Discount</div>
            <input type="text" name="discount" value="<?= @$admProduct->discount?>">
        </div>
        <div class="field">
            <div class="label">New</label>
            <div>
                <?php $admProduct->new == 1?$checked='checked':$checked=''?>
                <?= $this->Form->checkbox('new',['checked'=>$checked]);?>
            </div>
        </div>
        <div class="field">
            <div class="label">Description</div>
            <textarea name="descr" ><?= @$admProduct->descr?></textarea>
        </div>
        <div class="field">
            <div class="label">Properties</div>
            <textarea name="properties" ><?= @$admProduct->properties?></textarea>
        </div>
        <div class="field">
            <div class="label">Youtube url</div>
            <input type="text" name="video" value="<?= @$admProduct->video?>">
        </div>
        <div class="field">
            <div class="label">Images</div>
            <input type="file" name="images" id="file">
            <div class="segment" id="thumbs">
                <?php $images = json_decode(base64_decode($admProduct->images))?>
                <?php foreach($images as $image):?>
                <div class="ui basic segment">
                    <a class="ui left corner label delete" onclick="deleteImage(this)" 
                    image=<?=$image?>>
                    <i class="trash red icon">
                    </i></a>
 
                    <div class="ui small image">
                        <img class="ui small image" src="<?= $this->Url->image('products/images/'.$image)?>">
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <div class="field">
            <button type="submit" class="ui primary button">Save Product</button>
        </div>
    </form>
</div>
<script>
    var uploadUrl = "<?= $this->Url->build(['controller'=>'AdmProducts','action'=>'upload']) ?>";
    var imageCancelUrl = "<?= $this->Url->build(['controller'=>'AdmProducts','action'=>'delete_image']) ?>";
    var imageDir = "<?= $this->Url->image('products/images/')?>";
    $('#file').change(function(){
        var formData = new FormData($('#uploadForm')[0]);
		$.ajax({
            url: uploadUrl,
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                var html = 
                '<div class="ui basic segment">'+
                    '<a class="ui left corner label delete" onclick="deleteImage(this)" image='+data+'><i class="trash red icon"></i></a>'+
                    '<div class="ui small image">'+
                        '<img class="ui small image" src='+ imageDir + data +'>'+
                    '</div>'+
                '</div>';
                $('#thumbs').append(html);
            },
            cache: false,
            contentType: false,
            processData: false
       });

    });

    $('#uploadForm').submit(function() {
        if($('.delete')){
            var images = [];
            $('.delete').each(function(i, obj){
                images.push($(obj).attr('image'));
            });

            $('#upload_images').val(JSON.stringify(images));
        }
        return true;
    });

    function deleteImage(obj){
        $.ajax({
            url : imageCancelUrl,
            type : 'POST',
            data : {'image': $(obj).attr('image')},
            success : function(data){
                $(obj).parent().remove();
            }

        });
    }
</script>
