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
                <legend><?php echo __('Register'); ?></legend>
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
                echo $this->Form->input('password',
                    customFormOptions::getOptionsDefault(
                        __('Make it hard to guess, it will save you a lot of troubles. Believe me.')
                    )
                );
                echo $this->Form->input('password_check', 
                    array_merge(
                        customFormOptions::getOptionsDefault(
                            __('Has to be the same as above. You can do it.')
                        ),
                        array('type'=>'password')
                    )
                );
            ?>
            </fieldset>
        <?php echo $this->Form->end(
            customFormOptions::getOptionsBtnSubmit('Register')
        );?>
        </div>
    </div>
</div>