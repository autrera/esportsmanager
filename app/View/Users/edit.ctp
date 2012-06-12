<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="users form">
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Form->create('User', array(
            'class' => 'form-horizontal',
            'action' => 'edit',
            'inputDefaults' => customFormOptions::getOptionsDefault()
        ));?>
            <fieldset>
                <legend><?php echo __('Edit the user'); ?></legend>
            <?php
                echo $this->Form->input('nickname',
                    customFormOptions::getOptionsDefault(
                        __('Your cool nickname. Your online persona. How people will call you when they are flamming you.')
                    )
                );
                echo $this->Form->input('email',
                    customFormOptions::getOptionsDefault(
                        __('Valid email please. We will not spamm you, we are good guys :)')
                    )
                );
                echo $this->Form->input('old_password',
                    customFormOptions::getOptionsDefault(
                        __('Leave this blank, unless you want to change your current password.'),
                        array('type'=>'password')
                    )
                );
                echo $this->Form->input('new_password',
                    customFormOptions::getOptionsDefault(
                        __('Type your new password here, remember to type your current password in the field above.'),
                        array('type'=>'password')
                    )
                );
                echo $this->Form->input('new_password_check', 
                    customFormOptions::getOptionsDefault(
                        __('Has to be the same as above. You can do it.'),
                        array('type'=>'password')
                    )
                );

                // Si tiene permisos de edición tiene acceso a cosas 
                // mas avanzadas
                if (in_array('edit', $actions)){
                    echo $this->Form->input('roles_id',
                        customformoptions::getoptionsdefault(
                            __(
                                'The role this user will perform.'
                            ),
                            array(
                                'options' => $roles
                            )
                        )
                    );
                    echo $this->Form->input('teams_id',
                        customformoptions::getoptionsdefault(
                            __(
                                'The team this user will be produly representing.'
                            ),
                            array(
                                'empty' => 'No Team',
                                'options' => $teams
                            )
                        )
                    );
                }

                echo $this->Form->input('id', array('type' => 'hidden'));
            ?>
            </fieldset>
        <?php echo $this->Form->end(
            customFormOptions::getOptionsBtnSubmit('Register')
        );?>
        </div>
    </div>
</div>