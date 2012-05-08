<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="teams form">
            <?php echo $this->Form->create('Team', array(
                'type' => 'file',
                'action' => 'edit',
                'class' => 'form-horizontal',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Edit the Team'); ?></legend>
            <?php
                echo $this->Form->input('name',
                    customformoptions::getoptionsdefault(
                        __(
                            'Team\'s kick ass name. this will be shouted by your fans and groupies. make it whorty.'
                        )
                    )
                );
                echo $this->Form->input('games_id',
                    customformoptions::getoptionsdefault(
                        __(
                            'The game these guys will be doomed to play forever and never have fun at it again.'
                        ),
                        array(
                            'options' => $games
                        )
                    )
                );
                echo $this->Form->input('picture', 
                    customFormOptions::getOptionsFile(
                        __(
                            'Leave this alone, unless you want to overwrite the current picture, if any.'
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
