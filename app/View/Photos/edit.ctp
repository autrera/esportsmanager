<div class="photos form">
<?php echo $this->Form->create('Photo',
    array('type' => 'file', 'action' => 'edit')
); ?>
    <fieldset>
        <legend><?php echo __('Edit the Photo'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->file('upload');
        echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Update'));?>
</div>
