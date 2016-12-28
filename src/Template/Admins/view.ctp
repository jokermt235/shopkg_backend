<div class="basic segment">
    <div class="ui header">
        User
    </div>
    <div class="ui divider">
    </div>
    <table class="ui celled table">
        <thead>
        </thead>
        <tbody>
            <?php if(!empty($user)): ?>
            <tr>
                <td>Id</td>
                <td><?= $user->id ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?= $user->username?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><?= $user->password?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $user->email?></td>
            </tr>
            <tr>
                <td>Role</td>
                <td><?= $user->role?></td>
            </tr>
            <tr>
                <td>Created</td>
                <td><?= $user->created?></td>
            </tr>
            <?php endif;?>
        </tbody>
    </table>
</div>
 
