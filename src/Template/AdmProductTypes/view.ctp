<div class="basic segment">
    <div class="ui header">
        Product Type
    </div>
    <div class="ui divider">
    </div>
    <table class="ui celled table">
        <thead>
        </thead>
        <tbody>
            <?php if(!empty($admProductType)): ?>
            <tr>
                <td>Id</td>
                <td><?= $admProductType->id ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?= $admProductType->name?></td>
            </tr>
            <tr>
                <td>Created</td>
                <td><?= $admProductType->created?></td>
            </tr>
            <tr>
                <td>Modified</td>
                <td><?= $admProductType->modified?></td>
            </tr>
            <?php endif;?>
        </tbody>
    </table>
</div>
