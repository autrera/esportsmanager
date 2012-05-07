<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="photos form">
            <?php echo $this->Form->create('Photo', array(
                'type' => 'file',
                'class' => 'form-horizontal',
                'action' => 'edit',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Edit the Photo'); ?></legend>
            <?php
                echo $this->Form->input('name');
                echo $this->Form->input('photo', 
                    customFormOptions::getOptionsFile(
                        __('Leave this alone if you don\'t want to overwrite the photo.')
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