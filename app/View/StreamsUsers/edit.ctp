<div class="StreamsUsers form">
<?php echo $this->Form->create('StreamsUser', array(
        'action' => 'edit'
    )
);?>
    <fieldset>
        <legend><?php echo __('Edit the stream'); ?></legend>
    <?php
        echo $this->Form->input('streams_id', array(
            'options' => $streams 
        ));
        echo $this->Form->input('games_id', array(
            'options' => $games 
        ));
        echo $this->Form->input('identifier');
        echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Update'));?>
</div>
