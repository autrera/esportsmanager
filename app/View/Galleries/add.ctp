<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="galleries form">
            <?php echo $this->Form->create('Gallery', array(
                'class' => 'form-horizontal',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Add a Gallery'); ?></legend>
            <?php
                echo $this->Form->input('name',
                    customFormOptions::getOptionsDefault(
                        __(
                            'The name of the gallery. Make it worthy.'
                        )
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