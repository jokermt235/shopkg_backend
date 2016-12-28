<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'do1000KG';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
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
            $('.ui.dropdown').dropdown();
            $('#searchButton').click(function(){
                var current_url = window.location.href;
                current_url +="?search=" + $('#search_term').val();
                window.location.href = current_url;
            });
        });
    </script
</head>
<body>
    <div class="row">
        <div class="ui stackable inverted horizontal menu">
            <div class="header item">
                    <a href="<?=$this->Url->build(['controller'=>'Products','action'=>'index'])?>">
                        DO1000.KG
                    </a>
            </div>
            <div class="item">
                <div class="ui icon input">
                    <input id="search_term" type="text" placeholder="<?= __('Search...')?>">
                    <i class="search link icon" id="searchButton"></i>
                </div>
            </div>
            <div class="ui inverted right stackable menu">
                <a class="item">
                    <i class="large phone blue icon"></i>
                    +996 551 982 230
                </a>
                <a class="item">
                    <i class="large whatsapp green icon"></i>
                    +996 701 710 790
                </a>
                <?php if($this->request->session()->read('Auth.User')):?> 
                    <a href="<?= $this->Url->build(['controller'=>'Shopbags','action'=>'index'])?>" 
                        class="item">
                        <i class="large shopping basket blue icon"></i>
                        <div id="shopbag" class="ui red label">
                            <?= empty($shopbag_count)?0:$shopbag_count?>
                        </div>
                    </a>
                    <div class="ui dropdown item">
                        <i class="large user icon"></i>
                        <?= $this->request->session()->read('Auth.User.username')?>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item" 
                            href="<?= $this->Url->build(['controller'=>'Users','action'=>'logout'])?>">
                                <i class="large sign out green icon"></i>
                                <?= __('Logout')?>
                            </a>
                        </div>
                    </div>
                <?php else:?>      
                    <a class="item" 
                        href="<?= $this->Url->build(['controller'=>'Users','action'=>'login']) ?>">
                        <i class="large sign in green icon"></i>
                        <?= __('Login')?>
                    </a>
                <?php endif?>
                    
            </div>
        </div>
    </div>
    <div class="row">
        <?= $this->Flash->render() ?>
    </div>
    <div class="ui basic segment">    
        <div class="ui stackable grid">
            <div class="four wide column">
                <?= $this->element('right_menu') ?> 
            </div>
            <div class="twelve wide column">        
                <?= $this->fetch('content') ?> 
            </div>
        </div>
    </div>
    <div class="ui divider">
    </div>
    <div class="ui divider">
    </div>
    <div class="ui stackable equal width padded  grid">
        <div class="row">
            <div class="column">
                <div class="ui header">
                    <?=__('Extra contacts')?>
                </div>
                <div class="ui divider">
                </div>
                <div class="ui divided items">
                     <div class="item">
                        <i class="ui large yellow mail icon"></i>
                        <div class="middle aligned content">
                            do1000kg@gmail.com
                        </div>
                     </div>
                     <div class="item">
                        <i class="ui large green whatsapp icon"></i>
                        <div class="middle aligned content">
                            +996551982230
                        </div>
                     </div>
                    <div class="item">
                        <i class="ui large blue phone icon"></i>
                        <div class="middle aligned content">
                            +996551982230
                        </div>
                     </div>
                    <div class="item">
                        <i class="ui large blue home icon"></i>
                        <div class="middle aligned content">
                            <a href="http://do1000.kg"><?= __('Home page')?></a>
                        </div>
                     </div>

                </div>
            </div>
            <div class="column">
                <div class="ui header">
                    <?= __('We are Social') ?>
                </div>
                <div class="ui divider">
                </div>
                <div class="ui items">
                     <div class="item">
                        <i class="ui large blue facebook icon"></i>
                        <a class="middle aligned content">
                            do1000kg
                        </a>
                     </div>
                     <div class="item">
                        <i class="ui large yellow odnoklassniki square icon"></i>
                        <a class="middle aligned content">
                            do1000kg
                        </a>
                     </div>
                    <div class="item">
                        <i class="ui large purple instagram icon"></i>
                        <a class="middle aligned content">
                            do1000kg
                        </a>
                     </div>
                    <div class="item">
                        <i class="ui large blue vk icon"></i>
                        <a class="middle aligned content">
                            do1000kg
                        </a>
                     </div>

                </div>    
            </div>
        </div>
    </div>
    <div class="ui primary inverted vertical footer segment">
        <div class="ui horizontal inverted divider">
            do1000.KG
        </div>
    </div>
</body>
</html>
