<div class="games form">
<?php echo $this->Form->create('Game',
    array('type' => 'file', 'action' => 'edit')
); ?>
    <fieldset>
        <legend><?php echo __('Edit the Game'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->file('thumbnail');
        echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Update'));?>
</div>
