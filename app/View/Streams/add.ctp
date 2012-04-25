<div class="streams form">
<?php echo $this->Form->create('Stream',
    array('type' => 'file')
); ?>
    <fieldset>
        <legend><?php echo __('Add a Stream'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('prefix_url');
        echo $this->Form->file('upload');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
