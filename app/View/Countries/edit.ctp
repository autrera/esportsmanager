<div class="countries form">
<?php echo $this->Form->create('Country',
    array('type' => 'file', 'action' => 'edit')
); ?>
    <fieldset>
        <legend><?php echo __('Edit the Country'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->file('upload');
        echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Upload'));?>
</div>
