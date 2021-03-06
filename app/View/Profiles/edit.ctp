<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="profiles form">
            <?php echo $this->Form->create('Profile', array(
                'type' => 'file',
                'action' => 'edit',
                'class' => 'form-horizontal',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Edit your Profile'); ?></legend>
            <?php
                echo $this->Form->input('first_name');
                echo $this->Form->input('last_name');
                echo $this->Form->input('birthdate', array(
                    'minYear' => date('Y') - 100,
                    'maxYear' => date('Y'),
                ));
                echo $this->Form->input('description',
                    customFormOptions::getOptionsDefault(
                        __(
                            'Tell us your long story short'
                        ),
                        array(
                            'type' => 'textarea',
                            'label' => array(
                                'text' => 'Biography',
                                'class' => 'control-label',
                            ),
                        )
                    )
                );
                echo $this->Form->input('image', 
                    customFormOptions::getOptionsFile(
                        __(
                            'Leave this alone, unless you want to overwrite the current profile picture, if any.'
                        )
                    )
                );
                echo $this->Form->input('facebook_id',
                    customFormOptions::getOptionsDefault(
                        __(
                            'Your account name only. No \'http://www.facebook.com\' required.'
                        ),
                        array(
                            'type' => 'text'
                        )
                    )
                );
                echo $this->Form->input('twitter_id',
                    customFormOptions::getOptionsDefault(
                        __(
                            'Your account name only. No \'http://www.twitter.com\' required.'
                        ),
                        array(
                            'type' => 'text'
                        )
                    )
                );
                echo $this->Form->input('gplus_id',
                    customFormOptions::getOptionsDefault(
                        __(
                            'Your account name only. No \'http://plus.google.com\' required.'
                        ),
                        array(
                            'type' => 'text',
                            'label' => array(
                                'text' => 'Google +',
                                'class' => 'control-label',
                            ),
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
                echo $this->Form->input('id', array('type' => 'hidden'));
            ?>
            </fieldset>
            <?php echo $this->Form->end(
                customFormOptions::getOptionsBtnSubmit()
            );?>
        </div>
    </div>
</div>
