<div class="ui basic segment">
    <div class="ui header">Edit Producer</div>
    <div class="ui divider"></div>
    <form class="ui form" method="POST" action="" id="uploadForm" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= @$admProducer->id?>">
        <div class="field">
            <div class="label">Name</div>
            <input type="text" name="name" value="<?= @$admProducer->name?>">
        </div>
        <div class="field">
            <button type="submit" class="ui primary button">Save Producer</button>
        </div>
    </form>
</div>