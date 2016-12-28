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
      SHOP.KG
    </h2>
    <form class="ui large form" method="POST">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="username"  placeholder="Имя пользователя">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Пароль">
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
    <div class="ui horizontal divider">
        OR
    </div>
    <div class="ui segment">
        <div class="ui icon compact menu">
            <a class="item">
                <i class="ui large blue facebook icon"></i>
            </a>
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
    </div>
  </div>
</div>
