<div class="StreamsUsers form">
<?php echo $this->Form->create('StreamsUser');?>
    <fieldset>
        <legend><?php echo __('Add a stream'); ?></legend>
    <?php
        echo $this->Form->input('streams_id', array(
            'options' => $streams 
        ));
        echo $this->Form->input('games_id', array(
            'options' => $games 
        ));
        echo $this->Form->input('identifier');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
