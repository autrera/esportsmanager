<div class="setups form">
<?php echo $this->Form->create('Setup');?>
    <fieldset>
        <legend><?php echo __('Add your Setup'); ?></legend>
    <?php
        echo $this->Form->input('mouse');
        echo $this->Form->input('keyboard');
        echo $this->Form->input('mousepad');
        echo $this->Form->input('headphones');
        echo $this->Form->input('monitor');
        echo $this->Form->input('case');
        echo $this->Form->input('motherboard');
        echo $this->Form->input('memory');
        echo $this->Form->input('cpu');
        echo $this->Form->input('hdd');
        echo $this->Form->input('gpu');
        echo $this->Form->input('sound');
        echo $this->Form->input('os');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
