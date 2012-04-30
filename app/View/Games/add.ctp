<div class="games form">
<?php echo $this->Form->create('Game',
    array('type' => 'file')
); ?>
    <fieldset>
        <legend><?php echo __('Add a Game'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->file('upload');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
