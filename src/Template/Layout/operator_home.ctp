<?php
    $cakeDescription = 'Welcome to TAMTAM.KG operator page';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('semantic.min.css') ?>
    <?= $this->Html->script('jquery-3.1.1.min.js');?>
    <?= $this->Html->script('semantic.min.js');?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script>
        $(document).ready(function(){
            $('.ui.dropdown').dropdown()
        });
    </script
</head>
<body>
<div class="ui basic segment">
    <div class="ui text menu">
            <a class="ui header item" href="<?= $this->Url->build(['controller'=>'Operators','action'=>'index'])?>">
            TAMTAM.KG
            </a>
            <div class="right menu">
                <a class="item">
                    <img  class="ui mini circular image" 
                        src="<?= $this->Url->image(sprintf('operators/%s', 
                        $this->request->session()->read('Auth.User.avatar')))?>">
                    <?= $this->request->session()->read('Auth.User.username')?>
                </a>
                <a class="item" href="<?= $this->Url->build(['controller'=>'Users','action'=>'logout'])?>">
                    <i class="large blue sign out icon"></i>
                    <?= __('Logout')?>
                </a>
            </div>
    </div>
    <div class="ui divider">
    </div>
</div>

<div class="ui basic segment">
    <?= $this->fetch('content') ?>
</div>
<div class="ui divider">
</div>
<div>
    <div class="ui basic center aligned segment">
        <div class="ui header">(C) Powered By tamtam.KG.</div>
    </div>
</div>
</body>
</html>
