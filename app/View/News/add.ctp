<div class="news form">
<?php echo $this->Form->create('News');?>
    <fieldset>
        <legend><?php echo __('Add some News'); ?></legend>
    <?php
        echo $this->Form->input('title');
        echo $this->Form->input('content');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
