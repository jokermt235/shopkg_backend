<?php
    $cakeDescription = 'Welcome to TAMTAM.KG admin page';
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
            Home
            </a>
            <div class="right menu">
                <a class="item">
                    <i class="large user icon"></i>
                    <?= $this->request->session()->read('Auth.User.username')?>
                </a>
                <a class="item" href="<?=$this->Url->build(['controller'=>'Users','action'=>'logout'])?>">
                    <i class="large sign out icon"></i>
                    Logout
                </a>
            </div>
    </div>
    <div class="ui divider">
    </div>
</div>

<div class="ui basic segment">
    <div class="ui stackable grid">
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
                    <div class="ui header">Producers</div>
                    <div class="menu">
                        <a class="item" href="<?= $this->Url->build(['controller'=>'AdmProducers','action'=>'index']) ?>">
                            List producers
                        </a>
                        <a class="item" href="<?= $this->Url->build(['controller'=>'AdmProducers','action'=>'add'])?>">New Producer
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
                        <a class="item" href="<?= $this->Url->build(['controller'=>'Visitors','action'=>'index']) ?>">
                            Visitors
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="ui header">Customers</div>
                    <div class="menu">
                        <a class="item" href="<?= $this->Url->build(['controller'=>'AdmCustomers','action'=>'index']) ?>">
                            Customers
                        </a>
                        <a href="<?= $this->Url->build(['controller'=>'AdmCustomers','action'=>'add'])?>" class="item">
                            New Customer
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="ui header">Sales</div>
                    <div class="menu">
                        <a class="item" href="<?= $this->Url->build(['controller'=>'AdmSales','action'=>'index']) ?>">
                            Sales
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
        <div class="ui header">(C) Powered By devel.tamtam.kg</div>
    </div>
</div>
</body>
</html>
