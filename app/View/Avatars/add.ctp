<div class="avatars form">
<?php echo $this->Form->create('Avatar',
    array('type' => 'file')
); ?>
    <fieldset>
        <legend><?php echo __('Add an Avatar'); ?></legend>
    <?php
        echo $this->Form->input('games_id', array(
            'options' => $games 
        ));
        for ($i = 0; $i < 3; $i++){
            echo $this->Form->file('Avatar.' . $i . '.upload');
        }
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
