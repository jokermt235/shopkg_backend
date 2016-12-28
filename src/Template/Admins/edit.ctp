<div class="ui basic segment">
    <div class="ui header">Edit User</div>
    <div class="ui divider"></div>
    <form class="ui form" method="POST" action="">
        <input type="hidden" name="id" value="<?= @$user->id?>">
        <div class="field">
            <div class="label">Username</div>
            <input type="text" name="username" value="<?= @$user->username?>">
        </div>
        <div class="field">
            <div class="label">Password</div>
            <input type="text" name="password">
        </div>
        <div class="field">
            <div class="label">Email</div>
            <input type="text" name="email" value="<?= @$user->email?>">
        </div>
        <div class="field">
            <div class="label">Role</div>
            <input type="text" name="role" value="<?= @$user->role?>">
        </div>
        <div class="field">
            <button class="ui primary button">Save User</button>
        </div>
    </form>
</div>
