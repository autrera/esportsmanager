<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="users form">
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Form->create('User', array(
            'class' => 'form-horizontal',
            'inputDefaults' => customFormOptions::getOptionsDefault()
        ));?>
            <fieldset>
                <legend><?php echo __('Please enter your username and password'); ?></legend>
            <?php
                echo $this->Form->input('email');
                echo $this->Form->input('password');
                echo $this->Form->input('auto_login', 
                    customFormOptions::getOptionsCheckbox('', 
                        array(
                            'label' => array(
                                'text' => 'Remember me',
                                'class' => 'control-label'
                            )
                        )
                    )
                );
            ?>
            </fieldset>
            <div class = "form-actions">
                <input type = "submit" value = "Login" 
                    class = "btn btn-primary">
            </div>
            <?php echo $this->Form->end();?>
        </div>
    </div>
</div>