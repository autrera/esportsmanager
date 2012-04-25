<div class="streams form">
<?php echo $this->Form->create('Stream',
    array('type' => 'file', 'action' => 'edit')
); ?>
    <fieldset>
        <legend><?php echo __('Edit the Stream'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('prefix_url');
        echo $this->Form->file('upload');
        echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Update'));?>
</div>
