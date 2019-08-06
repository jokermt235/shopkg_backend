<div class="ui grid">
    <div class="three wide column">
        <div class="ui medium header"><?=__('Chat')?></div>
        <div class="ui divider">
        </div>
        <?php if(!empty($messages)):?>
        <?php foreach($messages as $message):?>
        <div class="ui icon message">
            <i class="user icon"></i>
            <div class="content">
                <a class="header" onclick="setUser(this)" 
                    id="<?= $message->token?>" href="javascript:void(0)">
                    User_<?= substr($message->token, 0, 10)?>
                </a>
                <p>
                    <?php if($message->author=="operator"){echo "Я:";} else echo "";?>
                    <?= substr($message->message,0,15)?>
                </p>
            </div>
        </div>
        <?php endforeach?>
        <?php endif?>
    </div>
    <div class="twelve wide column">
        <div class="ui container" id="history">
        </div>
        <div class="ui divider">
        </div>
        <div class="ui form">
            <div class="ui fields">
                <div class="twelve wide field">
                    <textarea rows="5" id="chat_input"></textarea>
                </div>
                <div class="four wide field">
                    <button id="send_button" class="ui primary button">send</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var historyUrl = "<?= $this->Url->build(['controller'=>'operators','action'=>'history'])?>";
    var postUrl = "<?= $this->Url->build(['controller'=>'operators','action'=>'add'])?>";
    var curUser = "";
    function setUser(link){
        curUser = $(link).attr('id'); 
    }
    
    function getHistory(){
        var url = historyUrl + "/"+ curUser;
        $.getJSON(url,function(data){
            if(data.messages){
                $('#history').html('');
                var messages = data.messages;
                for(var i=0;i < messages.length;i++){
                    var author = "";
                    var color = '<div class="ui icon blue message">';
                    if(messages[i].author == "user"){
                        author = '<i class="user icon"></i>';
                        color = '<div class="ui icon green message">';
                    }
                    var message = color +
                        author+
                        '<div class="content">'+
                            '<div class="header">'+
                            '</div>'+
                            '<p>'+ messages[i].message +'</p>'+
                        '</div>'+
                    '</div>';
                    $('#history').append(message);
                }
            }
        });
    }
    chatInterval = setInterval(
        function(){
            getHistory();
    }, 7000);

    $('#chat_input').keypress(function(event){
        if(event.key == "Enter"){
            $('#send_button').click();
        }
    });

    $("#send_button").click(function(){
        $.post(postUrl, { message : $("#chat_input").val(), token : curUser},function(data){
            var message = '<div class="ui icon blue message">'+
            '<div class="content">'+
                    '<p>'+ $('#chat_input').val() +'</p>'+
                '</div>'+
            '</div>';
            $('#chat_input').val('');
            $("#history").append(message);
        });

        return false;
    });
</script>
