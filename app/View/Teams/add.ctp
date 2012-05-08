<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="teams form">
            <?php echo $this->Form->create('Team', array(
                'type' => 'file',
                'class' => 'form-horizontal',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Add a Team'); ?></legend>
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
                            'The team\'s main picture. Optional.'
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
