<div class="news form">
<?php echo $this->Form->create('News', array('action' => 'edit')); ?>
    <fieldset>
        <legend><?php echo __('Edit your news'); ?></legend>
    <?php
        echo $this->Form->input('title');
        echo $this->Form->input('featured');
        echo $this->Form->input('content');
        echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end('Save Post'); ?>
</div>