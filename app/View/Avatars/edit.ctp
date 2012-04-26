<div class="avatars form">
<?php echo $this->Form->create('Avatar',
    array('type' => 'file', 'action' => 'edit')
); ?>
    <fieldset>
        <legend><?php echo __('Edit the Avatar'); ?></legend>
    <?php
        echo $this->Form->input('games_id', array(
            'options' => $games 
        ));
        echo $this->Form->file('upload');
        echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
