<div class="videos form">
<?php echo $this->Form->create('Video', array('action' => 'edit')); ?>
    <fieldset>
        <legend><?php echo __('Edit your video'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('url');
        echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Update')); ?>
</div>