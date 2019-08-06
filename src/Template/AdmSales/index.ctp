<div class="ui header">Sales</div>
<table class="ui celled table">
    <thead>
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Sale price</th>
            <th>Profit</th>
            <th>Delivery price</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
        <tbody>
            <?php foreach($sales as $sale):?>
            <tr>
                <td><?= @$sale->id?></td>
                <td><a href="<?= $this->Url->build(['controller'=>'AdmProducts','action'=>'view',$sale->product->id])?>"><?= @$sale->product->name?></a></td>
                <td><?= @$sale->sale_price?></td>
                <td><?= @$sale->profit?></td>
                <td><?= @$sale->delivery_price?></td>
                <td><?= @$sale->created?></td>
                <td>
                    <a class="ui blue label" href="<?= $this->Url->build(['controller'=>'AdmSales','action'=>'edit',$sale->id])?>">Edit
                    </a>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to     delete  {0}?', $sale->product->name),'class'=>'ui red label']) ?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </thead>
</table>
<div class="ui container">
    <div class="ui pagination menu">
    <?php if(!empty($paging['Sales'])):?> 
    <?php for($i=1;$i<=$paging['Sales']['pageCount'];$i++):?>                                         
    <a class="item" href="<?= $this->Url->build(['controller'=>'AdmSales','action'=>'index',"?" => ["page" => $i]]) ?>"><?= $i?></a>                                                                               
        <?php endfor;?>                                                                                      
        <?php endif;?>                                                                                       
    </div>                                                                                                   
</div>