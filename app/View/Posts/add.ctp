<div class="posts form">
<?php echo $this->Form->create('Post');?>
    <fieldset>
        <legend><?php echo __('Add a Post'); ?></legend>
    <?php
        echo $this->Form->input('title');
        echo $this->Form->input('content');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
