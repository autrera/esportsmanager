<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="avatars form">
            <?php echo $this->Form->create('Avatar', array(
                'class' => 'form-horizontal',
                'type' => 'file',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Add some Avatars'); ?></legend>
            <?php
                echo $this->Form->input('games_id',
                    customFormOptions::getOptionsDefault(
                        __(
                            'Choose the game owner of the Avatars.'
                        ),
                        array(
                            'options' => $games 
                        )
                ));
                for ($i = 0; $i < 3; $i++){
                    echo $this->Form->input('Avatar' . $i . 'upload', 
                        customFormOptions::getOptionsFile()
                    );
                }
            ?>
            </fieldset>
            <?php echo $this->Form->end(
                customFormOptions::getOptionsBtnSubmit()
            );?>
        </div>
    </div>
</div>
