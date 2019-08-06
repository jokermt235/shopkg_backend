<div class="basic segment">
    <div class="ui header">
        Producer
    </div>
    <div class="ui divider">
    </div>
    <table class="ui celled table">
        <thead>
        </thead>
        <tbody>
            <?php if(!empty($admProducer)): ?>
            <tr>
                <td>Id</td>
                <td><?= $admProducer->id ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?= $admProducer->name?></td>
            </tr>
            <tr>
                <td>Created</td>
                <td><?= $admProduct->created?></td>
            </tr>
            <tr>
                <td>Modified</td>
                <td><?= $admProduct->modified?></td>
            </tr>
            <?php endif;?>
        </tbody>
    </table>
</div>
