<div class="teams form">
<?php echo $this->Form->create('Team',
    array('type' => 'file')
); ?>
    <fieldset>
        <legend><?php echo __('Add a Team'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('games_id', array(
            'options' => $games
        ));
        echo $this->Form->file('photo');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
