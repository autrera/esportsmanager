<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="modulesactionsusers form">
            <?php echo $this->Form->create('ModulesActionsUser', array(
                'class' => 'form-horizontal',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Add some Permissions'); ?></legend>
            <?php
                echo $this->Form->input('modules_id',
                    customFormOptions::getOptionsDefault(
                        __(
                            'The module that will be affected. Think.'
                        ),
                        array(
                            'options' => $modules 
                        )
                    )
                );
                echo $this->Form->input('actions_id',
                    customFormOptions::getOptionsDefault(
                        __(
                        	'The stuff you want your peeps to be able to do.'
                        ),
                        array(
                            'options' => $actions 
                        )
                    )
                );
                echo $this->Form->input('users_id',
                    customFormOptions::getOptionsDefault(
                        __(
                        	'The user that will be blessed with trust.'
                        ),
                        array(
                            'options' => $users 
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