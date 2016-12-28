<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="ui hidden divider">
</div>
<div class="ui raised very padded text container">
    <div class="ui message error" onclick="this.classList.add('hidden');">
        <i class="close icon"></i>
        <div class="header">
            Error
        </div>
        <?= $message ?>
    </div>
</div>
