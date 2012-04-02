<div class="videos form">
<?php echo $this->Form->create('Video');?>
    <fieldset>
        <legend><?php echo __('Add a Video'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('url');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
