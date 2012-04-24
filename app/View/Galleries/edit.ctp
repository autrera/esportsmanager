<div class="galleries form">
<?php echo $this->Form->create('Gallery', array('action' => 'edit')); ?>
    <fieldset>
        <legend><?php echo __('Edit your gallery'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end('Save Post'); ?>
</div>