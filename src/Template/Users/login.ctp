<style type="text/css">
    body > .grid {
        height: 100%;
    }
    .image {
        margin-top: -100px;
    }
    .column {
        max-width: 450px;
    }
</style>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <a href="http://tamtam.kg">TAMTAM.KG</a>
    </h2>
    <form id="post_form" class="ui large form" method="POST">
      <input type="hidden" id="token" name="token">
      <input type="hidden" id="email" name="email">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" id="username" name="username"  placeholder="Имя пользователя">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" id="password" name="password" placeholder="Пароль">
          </div>
        </div>
        <button class="ui fluid large blue submit button" type="submit">Войти</button>
        <div class="ui message">
            <div class="header">
                Неавторизованы?
                <a href="<?= $this->Url->build(['controller'=>'Users','action'=>'register'])?>">
                    Зарегестрироваться
                </a>
            </div>
        </div>
      </div>
      <div class="ui error message">
      </div>
    </form>
    <!--<div class="ui horizontal divider">
        OR
    </div>--!>
    <!--<div class="ui segment">
        <div class="ui icon compact menu">
            <fb:login-button scope="public_profile,email" onlogin="checkLoginState();" class="item" id="fb_button">
                <i class="ui large blue facebook icon"></i>
            </fb:login-button>
            <a class="item">
                <i class="ui large orange odnoklassniki icon"></i>
            </a>
            <a class="item">
                <i class="ui large purple instagram icon"></i>
            </a>
            <a class="item">
                <i class="ui large blue vk icon"></i>
            </a>
            <a class="item">
                <i class="ui  large red google plus square icon"></i>
            </a>
        </div>
    </div>-->
  </div>
</div>
<script>
  function success(response){
        var login_data = response;
        FB.api(
            "/"+response.authResponse.userID +"?fields=name",
            function (response) {
              if (response && !response.error) {
                
              }
            }
        );
  }
  function statusChangeCallback(response) {
    if (response.status === 'connected') {
        success(response);
    } else if (response.status === 'not_authorized') {
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
  
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '555132801189637',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
