<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="profiles form">
            <?php echo $this->Form->create('Profile', array(
                'type' => 'file',
                'class' => 'form-horizontal',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Add your Profile'); ?></legend>
            <?php
                echo $this->Form->input('first_name');
                echo $this->Form->input('last_name');
                echo $this->Form->input('birthdate');
                echo $this->Form->input('description');
                echo $this->Form->input('image', 
                    customFormOptions::getOptionsFile(
                        __(
                            'Show us how you look like, we won\'t make fun of you... well, maybe.'
                        )
                    )
                );
                echo $this->Form->input('gender', array(
                    'options' => array(
                        'M' => 'M',
                        'F' => 'F',
                    )
                ));
                echo $this->Form->input('countries_id', array(
                    'options' => $countries 
                ));

            ?>
            </fieldset>
            <?php echo $this->Form->end(
                customFormOptions::getOptionsBtnSubmit()
            );?>
        </div>
    </div>
</div>
