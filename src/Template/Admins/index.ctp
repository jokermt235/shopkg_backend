<div class="ui statistics">
    <div class="blue statistic">
        <div class="value">
            <?= empty(@$total_products)?0:$total_products?>
        </div>
        <div class="label">
            <?=__('Total products')?>
        </div>
    </div>
    <div class="green statistic">
        <div class="value">
            <?= empty(@$visitors)?0:$visitors?>
        </div>
        <div class="label">
            <?=__('Visitors for last month')?>
        </div>
    </div>
    <div class="red statistic">
        <div class="value">
            <?= empty(@$gain)?0:$gain?>
        </div>
        <div class="label">
            <?=__('Incoming total gain for month')?>
        </div>
    </div>
    <div class="orange statistic">
        <div class="value">
            <?= empty(@$total_users)?0:$total_users?>
        </div>
        <div class="label">
            <?=__('Total registered users')?>
        </div>
    </div>
</div>