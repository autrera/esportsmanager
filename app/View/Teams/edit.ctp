<div class="teams form">
<?php echo $this->Form->create('Team',
    array('type' => 'file', 'action' => 'edit')
); ?>
    <fieldset>
        <legend><?php echo __('Edit the Team'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('games_id', array(
            'options' => $games
        ));
        echo $this->Form->file('upload');
        echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Update'));?>
</div>
