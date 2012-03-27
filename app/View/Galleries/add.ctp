<div class="galleries form">
<?php echo $this->Form->create('Gallery');?>
    <fieldset>
        <legend><?php echo __('Add a Gallery'); ?></legend>
    <?php
        echo $this->Form->input('name');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
