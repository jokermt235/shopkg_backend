<div class="ui header">Producers</div>
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
            <?php foreach($producers as $producer):?>
            <tr>
                <td><?= @$producer->id?></td>
                <td><a href="<?= $this->Url->build(['controller'=>'AdmProducers','action'=>'view',$producer->id])?>"><?= @$producer->name?></a></td>
                <td><?= @$producer->created ?></td>
                <td><?= @$producer->modified ?></td>
                <td>
                    <a class="ui blue label" href="<?= $this->Url->build(['controller'=>'AdmProducers','action'=>'edit',$producer->id])?>">Edit
                    </a>
                    <?= $this->Form->postLink(__('Delete'), ['controller'=>'AdmProducers','action' => 'delete', $producer->id], ['confirm' => __('Are you sure you want to     delete  {0}?', $producer->name),'class'=>'ui red label']) ?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </thead>
</table>
<div class="ui container">
    <div class="ui pagination menu">
    <?php if(!empty($paging['Producers'])):?> 
    <?php for($i=1;$i<=$paging['Producers']['pageCount'];$i++):?>                                         
    <a class="item" href="<?= $this->Url->build(['controller'=>'AdmProducers','action'=>'index',"?" => ["page" => $i]]) ?>"><?= $i?></a>                                                                               
        <?php endfor;?>                                                                                      
        <?php endif;?>                                                                                       
    </div>                                                                                                   
</div>                   
 