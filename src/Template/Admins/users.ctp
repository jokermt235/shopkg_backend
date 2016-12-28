<div class="ui header">Users</div>
<table class="ui celled table">
    <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Created</th>
            <th>Modified</th>
            <th>Actions</th>
        </tr>
        <tbody>
            <?php foreach($users as $user):?>
            <tr>
                <td><?= @$user->id?></td>
                <td><a href="<?= $this->Url->build(['controller'=>'Admins','action'=>'view',$user->id])?>"><?= @$user->username?></a></td>
                <td><?= @$user->email?></td>
                <td><?= @$user->created ?></td>
                <td><?= @$user->modified ?></td>
                <td>
                    <a class="ui blue label" href="<?= $this->Url->build(['controller'=>'Admins','action'=>'edit',$user->id])?>">Edit
                    </a>
                    <?= $this->Form->postLink(__('Delete'), ['controller'=>'Admins','action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to     delete  {0}?', $user->username),'class'=>'ui red label']) ?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </thead>
</table>
