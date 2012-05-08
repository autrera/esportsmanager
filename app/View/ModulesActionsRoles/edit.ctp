<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="modulesactionsroles form">
            <?php echo $this->Form->create('ModulesActionsRole', array(
                'class' => 'form-horizontal',
                'action' => 'edit',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Change some Permissions'); ?></legend>
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
                echo $this->Form->input('roles_id',
                    customFormOptions::getOptionsDefault(
                        __(
                        	'The role that will be blessed with trust.'
                        ),
                        array(
                            'options' => $roles 
                        )
                    )
                );
                echo $this->Form->input('id', array('type' => 'hidden'));
            ?>
            </fieldset>
            <?php echo $this->Form->end(
                customFormOptions::getOptionsBtnSubmit('Update')
            );?>
        </div>
    </div>
</div>