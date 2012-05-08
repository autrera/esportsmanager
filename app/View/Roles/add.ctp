<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="roles form">
            <?php echo $this->Form->create('Role', array(
                'class' => 'form-horizontal',
                'inputDefaults' => customFormOptions::getOptionsDefault(),
            ));?>
            <fieldset>
                <legend><?php echo __('Add a Role'); ?></legend>
            <?php
                echo $this->Form->input('name',
                    customFormOptions::getOptionsDefault(
                        __(
                            'Name the new role.'
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
