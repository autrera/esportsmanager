<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="StreamsUsers form">
            <?php echo $this->Form->create('StreamsUser', array(
                'class' => 'form-horizontal',
                'action' => 'edit',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Edit the stream'); ?></legend>
            <?php
                echo $this->Form->input('streams_id', 
                    
                        array(
                            'options' => $streams 
                        )
                    
                );
                echo $this->Form->input('games_id',
                    customFormOptions::getOptionsDefault(
                        __(
                            'Select the game you will be streamming mostly.'
                        ),
                        array(
                            'options' => $games 
                        )
                    )
                );
                echo $this->Form->input('identifier',
                    customFormOptions::getOptionsDefault(
                        __('Your stream id, you should have one. Just paste it here and we\'ll take care of the rest. Aren\'t we something?')
                    )
                );
                echo $this->Form->input('id', array('type' => 'hidden'));
            ?>
            </fieldset>
            <?php echo $this->Form->end(
                customFormOptions::getOptionsBtnSubmit('Update')
            );?>
        </div>
    </div>
</div>
