<div class="countries form">
<?php echo $this->Form->create('Country',
    array('type' => 'file')
); ?>
    <fieldset>
        <legend><?php echo __('Add a Country'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->file('flag');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
