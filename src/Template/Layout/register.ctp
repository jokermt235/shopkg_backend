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

$cakeDescription = 'SHOP KG';
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

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="row">
        <div class="row">
            <div class="ui stackable horizontal inverted menu">
                <div class="header item">
                        SHOP.KG
                </div>
                <div class="item">
                    <div class="ui icon input">
                        <input type="text" placeholder="Search...">
                        <i class="search link icon"></i>
                    </div>
                </div>
                <div class="ui right item">
                    <div class="ui inverted  stackable menu">
                        <a class="item">
                            <i class="large phone blue icon"></i>
                            +996 551 982 230
                        </a>
                        <a class="item">
                            <i class="large whatsapp green icon"></i>
                            +996 701 710 790
                        </a>
                        <a class="item" 
                            href="<?= $this->Url->build(['controller'=>'Users','action'=>'login']) ?>">
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row"> 
        <?= $this->Flash->render() ?>
    </div>
    <div class="ui segment">
        <div class="ui stackable grid">
            <div class="column">        
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
                <form class="ui form">
                    <div class="ui header">
                        Send us a query
                    </div>
                    <div class="ui divider">
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Enter name">
                    </div>
                    <div class="field">
                        <input type="text" placeholder="email">
                    </div>
                    <div class="field">
                        <textarea placeholder="Message"></textarea>
                    </div>
                    <div class="field">
                        <button class="ui blue button">Submit</button>
                    </div>
                </form>
            </div>
            <div class="column">
                <div class="ui header">
                    Contacts
                </div>
                <div class="ui divider">
                </div>
                <div class="ui divided items">
                     <div class="item">
                        <i class="ui large yellow mail icon"></i>
                        <div class="middle aligned content">
                            shopkg@gmail.com
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
                            <a href="http://shop.kg">Home page</a>
                        </div>
                     </div>

                </div>
            </div>
            <div class="column">
                <div class="ui header">
                    We are Social
                </div>
                <div class="ui divider">
                </div>
                <div class="ui items">
                     <div class="item">
                        <i class="ui large blue facebook icon"></i>
                        <div class="middle aligned content">
                            shopkg
                        </div>
                     </div>
                     <div class="item">
                        <i class="ui large yellow odnoklassniki square icon"></i>
                        <div class="middle aligned content">
                            shopkg
                        </div>
                     </div>
                    <div class="item">
                        <i class="ui large purple instagram icon"></i>
                        <div class="middle aligned content">
                            shopkg
                        </div>
                     </div>
                    <div class="item">
                        <i class="ui large blue vk icon"></i>
                        <div class="middle aligned content">
                            Shopkg
                        </div>
                     </div>

                </div>    
            </div>
        </div>
    </div>
    <div class="ui black inverted vertical footer segment">
        <div class="ui horizontal inverted divider">
            SHOP.KG
        </div>
    </div>
</body>
</html>
