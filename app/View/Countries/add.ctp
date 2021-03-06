<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="countries form">
            <?php echo $this->Form->create('Country', array(
                'class' => 'form-horizontal',
                'type' => 'file',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Add a Country'); ?></legend>
            <?php
                echo $this->Form->input('name',
                    customFormOptions::getOptionsDefault(
                        __(
                            'The name of the country. You never would have guessed it. You need me.'
                        )
                    )
                );
                echo $this->Form->input('icon', 
                    customFormOptions::getOptionsFile(
                        __('The country flag. Optional.')
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
