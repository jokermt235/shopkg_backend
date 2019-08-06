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

$cakeDescription = 
    'Электро товары, товары для дома Бишкек';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $title?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('semantic.min.css') ?>
    <?= $this->Html->css('chat_box.css')?>
    <?= $this->Html->script('jquery-3.1.1.min.js');?>
    <?= $this->Html->script('semantic.min.js');?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script>
        $(document).ready(function(){
            $('.ui.dropdown').dropdown();
            $('#search_term').keydown(function(event){
                if(event.key == "Enter"){
                    $('#searchButton').click();
                }
            });
            $('#searchButton').click(function(){
                if($('#search_term').val() == "") return;
                var current_url = window.location.href;
                if(current_url.indexOf("?search=") < 0){
                    current_url +="?search=" + $('#search_term').val();
                }else{
                    var param_idx = current_url.indexOf("?search=") + 8;
                    var sub_str= current_url.substring(param_idx);
                    current_url = current_url.replace(sub_str, $('#search_term').val());
                    console.log(current_url);
                }
                window.location.href = current_url;
            });
        });
        
        var token_url = "<?= $this->Url->build(['controller'=>'Users','action'=>'token'])?>";
        if (typeof(Storage) !== "undefined") {
            var token = localStorage.getItem("token");
            if(!token){
                $.getJSON(token_url,function(data){
                    localStorage.setItem("token", data.token);
                });
            }
        } else {
            console.log("Browser not supporting localStorage");
        }
        
    </script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-9782256731552245",
        enable_page_level_ads: true
      });
    </script>
</head>
<body>
    <div class="row">
        <div class="ui stackable inverted top attached blue horizontal menu">
            <div class="header item">
                    <a href="<?=$this->Url->build(['controller'=>'Products','action'=>'index'])?>">
                        TAMTAM.KG
                    </a>
            </div>
            <?= $this->element('delivery')?>
            <div class="ui dropdown item">
                <i class="large book icon"></i>
                Контакты
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item">
                        <i class="large phone blue icon"></i>
                        +996 551 982 230
                    </a>
                    <a class="item">
                        <i class="large whatsapp green icon"></i>
                        +996 709 730 956 
                    </a>
                </div>
            </div>
            <div class="ui inverted blue right stackable menu">
                <?php if($this->request->session()->read('Auth.User')):?> 
                    <a href="<?= $this->Url->build(['controller'=>'Shopbags','action'=>'index'])?>" 
                        class="item">
                        <i class="large shopping basket gray icon"></i>
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
                        <i class="large sign in white icon"></i>
                        <?= __('Login')?>
                    </a>
                <?php endif?>
            </div>
        </div>
    </div>
    <div class="row">
        <?= $this->Flash->render() ?>
    </div>
    <div class="ui hidden divider"></div>
    <div class="ui container">
        <div class="ui fluid icon input">
            <a id="all_categories" class="ui blue labeled icon button">
                <i class="content icon"></i>
                Все категории
            </a>
            <input id="search_term" type="text" placeholder="<?= __('Search...')?>">
            <i class="search link icon" id="searchButton"></i>
        </div>
    </div>
    <div class="ui container basic segment">
        <?= $this->element('right_menu')?>
    </div>
    <div class="ui basic segment"> 
        <div class="row">        
            <?= $this->fetch('content') ?> 
        </div>
    </div>
    <div class="row">
        <?= $this->element('chat_box') ?>
    </div>
    <div class="ui divider">
    </div>
    <div class="ui basic secondary segment">
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
                                tamtam.kg@tamtam.kg
                            </div>
                         </div>
                         <div class="item">
                            <i class="ui large green whatsapp icon"></i>
                            <div class="middle aligned content">
                                +996 709 730 956
                            </div>
                         </div>
                        <div class="item">
                            <i class="ui large blue phone icon"></i>
                            <div class="middle aligned content">
                                +996 551 982 230
                            </div>
                         </div>
                        <div class="item">
                            <i class="ui large blue home icon"></i>
                            <div class="middle aligned content">
                                <a href="http://tamtam.kg"><?= __('Home page')?></a>
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
                            <a  href="https://www.facebook.com/tamtam.kg/" class="middle aligned content">
                                tamtamkg
                            </a>
                         </div>
                         <div class="item">
                            <i class="ui large yellow odnoklassniki square icon"></i>
                            <a href="https://ok.ru/group/53211046346971" class="middle aligned content">
                                tamtamkg
                            </a>
                         </div>
                        <div class="item">
                            <i class="ui large purple instagram icon"></i>
                            <a href="https://www.instagram.com/tamtam.tamtamkg/" class="middle aligned content">
                                tamtamkg
                            </a>
                         </div>
                        <div class="item">
                            <i class="ui large blue vk icon"></i>
                            <a class="middle aligned content">
                                tamtamkg
                            </a>
                         </div>
    
                    </div>    
                </div>
            </div>
        </div>
    </div>
    <div class="ui primary inverted vertical footer segment">
        <div class="ui horizontal inverted divider">
            TAMTAM.KG
        </div>
    </div>
</body>
</html>