<div class="ui header">Customers</div>
<table class="ui celled table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Status</th>
            <th>Created</th>
            <th>Options</th>
        </tr>
        <tbody>
            <?php foreach($customers as $customer):?>
            <tr>
                <td><?= @$customer->id?></td>
                <td><a href="<?= $this->Url->build(['controller'=>'AdmCustomers','action'=>'view',$customer->id])?>"><?= @$customer->name?></a></td>
                <td><?= @$customer->phone ?></td>
                <td><?= @$customer->address ?></td>
                <td><?= @$customer->status ?></td>
                <td><?= @$customer->created ?></td>
                <td>
                    <a class="ui blue label" href="<?= $this->Url->build(['controller'=>'AdmCustomers','action'=>'edit',$customer->id])?>">Edit
                    </a>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to     delete  {0}?', $customer->name),'class'=>'ui red label']) ?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </thead>
</table>
<div class="ui container">
    <div class="ui pagination menu">
    <?php if(!empty($paging['Customers'])):?> 
    <?php for($i=1;$i<=$paging['Customers']['pageCount'];$i++):?>                                         
    <a class="item" href="<?= $this->Url->build(['controller'=>'AdmCustomers','action'=>'index',"?" => ["page" => $i]]) ?>"><?= $i?></a>                                                                               
        <?php endfor;?>                                                                                      
        <?php endif;?>                                                                                       
    </div>                                                                                                   
</div>