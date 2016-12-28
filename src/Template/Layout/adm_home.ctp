<?php
    $cakeDescription = 'SHOP KG admin page';
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
            <a class="ui header item" href="<?= $this->Url->build(['controller'=>'Admins','action'=>'index'])?>">
            Do1000.KG
            </a>
            <div class="right menu">
                <a class="item">
                    <i class="large user icon"></i>
                    <?= $this->request->session()->read('Auth.User.username')?>
                </a>
            </div>
    </div>
    <div class="ui divider">
    </div>
</div>

<div class="ui basic segment">
    <div class="ui grid">
        <div class="three wide column">
            <div class="ui vertical menu">
                <div class="item">
                    <div class="ui header">Product types</div>
                    <div class="menu">
                        <a class="item" href="<?= $this->Url->build(['controller'=>'AdmProductTypes','action'=>'index']) ?>">
                            List product types
                        </a>
                        <a class="item" href="<?= $this->Url->build(['controller'=>'AdmProductTypes','action'=>'add'])?>">New product type
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="ui header">Products</div>
                    <div class="menu">
                        <a class="item" href="<?= $this->Url->build(['controller'=>'AdmProducts','action'=>'index']) ?>">
                            List products
                        </a>
                        <a class="item" href="<?= $this->Url->build(['controller'=>'AdmProducts','action'=>'add'])?>">New Product
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="ui header">Users</div>
                    <div class="menu">
                        <a class="item" href="<?= $this->Url->build(['controller'=>'Admins','action'=>'users']) ?>">
                            All users
                        </a>
                        <a href="<?= $this->Url->build(['controller'=>'Admins','action'=>'add'])?>" class="item">
                            New user
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="twelve wide column">
            <?= $this->fetch('content') ?> 
        </div>
    </div>
</div>
<div class="ui divider">
</div>
<div>
    <div class="ui basic center aligned segment">
        <div class="ui header">(C) Powered By DO1000.KG.</div>
    </div>
</div>
</body>
</html>
