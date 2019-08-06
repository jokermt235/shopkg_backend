<div class="chat_box" id="chat_box">
    <div class="ui segment blue inverted chat transition hidden">
        <div class="ui left red corner label">
            <i class="large remove circle outline icon"></i>
        </div>
        <div class="row" id="_chat">
        </div>
        <div class="ui divider">
        </div>
        <div class="ui form">
            <div class="fields">
                <div class="sixteen wide field">
                    <div class="ui action input">
                    <textarea rows="1" id="msg_input" name="message" 
                        placeholder="Нажмите Enter для отправки"></textarea>
                        <button id="send_msg_button" class="ui small icon button">
                            <i class="orange mail icon"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui inverted blue compact menu">
        <a class="item custom">
            <i class="mail white icon">
            </i>
            Напишите нам мы всегда онлайн
        </a>
    </div>
</div>
<script>
//chat begin

var get_chat_url = "<?= $this->Url->build(['controller'=>'messages','action'=>'chat'])?>";
var post_message_url = "<?= $this->Url->build(['controller'=>'messages','action'=>'add']) ?>";

var chatInterval = "";

function getHistory(){
    $.get(get_chat_url,
        {
            token : localStorage.getItem("token")
        },
        function(data){
            $('#_chat').html(data);      
            $('#chat_info').scrollTop($(".floating.message").last().offset().top);
        });
}

$('.custom').click(function(){
    $('.chat').transition('fly up');
    getHistory();
    chatInterval = setInterval(
    function(){
        getHistory(); 
    }, 7000);
});

$('.large.remove').click(function(){    
    $('.chat').transition('fly up');
});

$('#send_msg_button').click(function(){
    var e = $.Event("keypress");
    e.key = "Enter"; 
    $("#msg_input").trigger(e);
});

$('#msg_input').keypress(function(event){
    if(event.key == "Enter"){
        var msg = $(this).val();
        var self = this;
        if(msg){
            $.ajax({
                type: "POST",
                url: post_message_url,
                data: {
                    message:msg,
                    operator_id: $('#operator_id').val(),
                    token : localStorage.getItem("token")
                },
                success: function(data){
                    var message = 
                    '<div class="ui floating green message">'+
                        '<div class="ui bottom right attached label">'+data.message +'</div>'+
                        '<p>' + data.message + '</p>'+
                    '</div>';
                    if(data.message){
                        $('.messages').append(message);
                    }
                    $(self).val('');
                    $('#chat_info').scrollTop($(".floating.message").last().offset().top);
                },
                dataType: "json"
            });
        }
        return false;
    }
});

//chat end
</script>
