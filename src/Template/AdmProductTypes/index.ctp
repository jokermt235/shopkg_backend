<div class="ui header">Product types</div>
<table class="ui celled table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Created</th>
            <th>Modified</th>
            <th>Actions</th>
        </tr>
        <tbody>
            <?php foreach($product_types as $product_type):?>
            <tr>
                <td><?= @$product_type->id?></td>
                <td><a href="<?= $this->Url->build(['controller'=>'AdmProductTypes','action'=>'view',$product_type->id])?>"><?= @$product_type->name?></a></td>
                <td><?= @$product_type->created ?></td>
                <td><?= @$product_type->modified ?></td>
                <td>
                    <a class="ui blue label" href="<?= $this->Url->build(['controller'=>'AdmProductTypes','action'=>'edit',$product_type->id])?>">Edit
                    </a>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product_type->id], ['confirm' => __('Are you sure you want to     delete  {0}?', $product_type->name),'class'=>'ui red label']) ?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </thead>
</table>
