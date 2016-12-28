<div class="ui header">Products</div>
<table class="ui celled table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Product type</th>
            <th>Created</th>
            <th>Modified</th>
            <th>Actions</th>
        </tr>
        <tbody>
            <?php foreach($products as $product):?>
            <tr>
                <td><?= @$product->id?></td>
                <td><a href="<?= $this->Url->build(['controller'=>'AdmProducts','action'=>'view',$product->id])?>"><?= @$product->name?></a></td>
                <td><?= @$product->product_type?></td>
                <td><?= @$product->created ?></td>
                <td><?= @$product->modified ?></td>
                <td>
                    <a class="ui blue label" href="<?= $this->Url->build(['controller'=>'AdmProducts','action'=>'edit',$product->id])?>">Edit
                    </a>
                    <?= $this->Form->postLink(__('Delete'), ['controller'=>'AdmProducts','action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to     delete  {0}?', $product->name),'class'=>'ui red label']) ?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </thead>
</table>
