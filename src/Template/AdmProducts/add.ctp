<div class="ui basic segment">
    <div class="ui header">New Product</div>
    <div class="ui divider"></div>
    <form class="ui form" method="POST" action="" id="uploadForm" enctype="multipart/form-data">
        <input type="hidden" name="upload_images" id="upload_images">
        <div class="field">
            <div class="label">Name</div>
            <input type="text" name="name">
        </div>
        <div class="field">
            <div class="label">Product type</div>
            <?= $this->Form->select('product_type_id',$product_types);?>
        </div>
        <div class="field">
            <div class="label">Producer</div>
            <?= $this->Form->select('producer_id',$producers);?>
        </div>
        <div class="field">
            <div class="label">Title</div>
            <input name="title" type="text">
        </div> 
        <div class="field">
            <div class="label">Price</div>
            <input type="text" name="price" >
        </div>
        <div class="field">
            <div class="label">Discount</div>
            <input type="text" name="discount" >
        </div>
        <div class="field">
            <div class="label">New</label>
            <div>
                <?= $this->Form->checkbox('new');?>
            </div>
        </div>
        <div class="field">
            <div class="label">Description</div>
            <textarea name="descr" ></textarea>
        </div>
        <div class="field">
            <div class="label">Properties</div>
            <textarea name="properties" ></textarea>
        </div>
        <div class="field">
            <div class="label">Youtube url</div>
            <input type="text" name="video">
        </div>
        <div class="field">
            <div class="label">Images</div>
            <input type="file" name="images" id="file">
            <div class="segment" id="thumbs">
            </div>
        </div>
        <div class="field">
            <button type="submit" class="ui primary button">Add Product</button>
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
