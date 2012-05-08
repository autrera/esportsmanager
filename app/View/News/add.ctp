<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="news form">
            <?php echo $this->Form->create('News', array(
                'class' => 'form-horizontal',
                'inputDefaults' => customFormOptions::getOptionsDefault(),
            ));?>
            <fieldset>
                <legend><?php echo __('Add some News'); ?></legend>
            <?php
                echo $this->Form->input('title',
                    customFormOptions::getOptionsDefault(
                        __(
                            'Crazy kick-ass title here, please.'
                        )
                    )
                );
                echo $this->Form->input('games_id', 
                    customFormOptions::getOptionsDefault(
                        __(
                            'Select the game that better relates to this new.'
                        ),
                        array(
                            'options' => $games 
                        )
                    )
                );
                echo $this->Form->input('featured', 
                    customFormOptions::getOptionsCheckBox()
                );
                echo $this->Form->input('content');
            ?>
            </fieldset>
            <?php echo $this->Form->end(
                customFormOptions::getOptionsBtnSubmit()
            );?>
        </div>
    </div>
</div>
