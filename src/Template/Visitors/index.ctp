<div class="ui header">Visitors</div>
<table class="ui celled table">
    <thead>
        <tr>
            <th>#</th>
            <th>Ip</th>
            <th>User Agent</th>
            <th>Created</th>
            <th>Last Visited</th>
            <th>Actions</th>
        </tr>
        <tbody>
            <?php foreach($visitors as $visitor):?>
            <tr>
                <td><?= @$visitor->id?></td>
                <td><a href="<?= $this->Url->build(['controller'=>'Visitors','action'=>'view',$visitor->id])?>"><?= @$visitor->ip?></a></td>
                <td><?= @$visitor->user_agent?></td>
                <td><?= @$visitor->created ?></td>
                <td><?= @$visitor->last_visited ?></td>
                <td>
                    <a class="ui blue label" href="<?= $this->Url->build(['controller'=>'Visitors','action'=>'edit',$vistor->id])?>">Edit
                    </a>
                    <?= $this->Form->postLink(__('Delete'), ['controller'=>'Visitors','action' => 'delete', $visitor->id], ['confirm' => __('Are you sure you want to     delete  {0}?', $visitor->ip),'class'=>'ui red label']) ?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </thead>
</table>
<div class="ui container">
    <div class="ui pagination menu">
    <?php if(!empty($paging['Visitors'])):?> 
    <?php for($i=1;$i<=$paging['Visitors']['pageCount'];$i++):?>                                         
    <a class="item" href="<?= $this->Url->build(['controller'=>'Visitors','action'=>'index',"?" => ["page" => $i]]) ?>"><?= $i?></a>                                                                               
        <?php endfor;?>                                                                                      
        <?php endif;?>                                                                                       
    </div>                                                                                                   
</div>