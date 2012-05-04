<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="avatars form">
            <?php echo $this->Form->create('Avatar', array(
                'class' => 'form-horizontal',
                'type' => 'file',
                'action' => 'edit',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Edit the Avatar'); ?></legend>
            <?php
                echo $this->Form->input('games_id', array(
                    'options' => $games 
                ));
                echo $this->Form->input('upload', 
                    customFormOptions::getOptionsFile(
                        __('Leave it alone, unless you want to overwrite the current flag.')
                    )
                );
                echo $this->Form->input('id', array('type' => 'hidden'));
            ?>
            </fieldset>
            <?php echo $this->Form->end(
                customFormOptions::getOptionsBtnSubmit()
            );?>
        </div>
    </div>
</div>
