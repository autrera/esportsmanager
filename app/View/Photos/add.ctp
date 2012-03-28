<div class="photos form">
<?php echo $this->Form->create('Photo',
    array('type' => 'file')
); ?>
    <fieldset>
        <legend><?php echo __('Add some Photos'); ?></legend>
    <?php
        for ($i = 0; $i < 3; $i++){
            echo $this->Form->input('Photo.' . $i . '.name');
            echo $this->Form->file('Photo.' . $i . '.upload');
        }
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
