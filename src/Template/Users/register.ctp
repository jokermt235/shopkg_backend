<div class="ui raised very padded container segment">
    <div class="ui dividing header">
        Registration
    </div>
    <form class="ui big form" method="POST" 
    action="<?= $this->Url->build(['controller'=>'Users','action'=>'register'])?>">
        <div class="required field">
            <label>Username</label>
            <input type="text" placeholder="username" name="username">
        </div>
        <div class="required field">
            <label>Email</label>
            <input type="text" placeholder="e-mail" name="email">
        </div>
        <div class="required field">
            <label>Password</label>
            <input type="password" placeholder="password" name="password">
        </div>
        <div class="required field">
            <label>Retype password</label>
            <input type="password" placeholder="password" name="ret_password">
        </div>
        <button type="submit" class="ui blue submit button">
            Register
        </button>
    </form>
</div>
