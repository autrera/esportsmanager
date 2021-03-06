<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="roles form">
            <?php echo $this->Form->create('Role', array(
                'class' => 'form-horizontal',
                'action' => 'edit',
                'inputDefaults' => customFormOptions::getOptionsDefault(),
            ));?>
            <fieldset>
                <legend><?php echo __('Edit the Role'); ?></legend>
            <?php
                echo $this->Form->input('name',
                    customFormOptions::getOptionsDefault(
                        __(
                            'Name the new role.'
                        )
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
