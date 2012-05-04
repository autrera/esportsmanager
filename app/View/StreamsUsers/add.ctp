<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="StreamsUsers form">
            <?php echo $this->Form->create('StreamsUser', array(
                'class' => 'form-horizontal',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Add a Stream'); ?></legend>
            <?php
                echo $this->Form->input('streams_id', 
                    customFormOptions::getOptionsDefault(
                        __(
                            'Select your provider. This is important. So choose well.'
                        ),
                        array(
                            'options' => $streams 
                        )
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
            ?>
            </fieldset>
            <?php echo $this->Form->end(
                customFormOptions::getOptionsBtnSubmit()
            );?>
        </div>
    </div>
</div>
