<div class="settings form">
<?php echo $this->Form->create('Setting');?>
    <fieldset>
        <legend><?php echo __('Add your Settings'); ?></legend>
    <?php
        echo $this->Form->input('game_sensitive');
        echo $this->Form->input('os_sensitive');
        echo $this->Form->input('x_resolution');
        echo $this->Form->input('y_resolution');
        echo $this->Form->input('rate');
        echo $this->Form->input('dpi');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
